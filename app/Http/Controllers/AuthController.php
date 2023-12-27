<?php

namespace App\Http\Controllers;

use App\Mail\UserAccountMail;
use App\Models\Employee;
use App\Models\Session;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        return view('dashboard.auth.login');
    }
    public function postLogin(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->messages() as $errors => $messages) {
                foreach($messages as $message){
                    toastr()->warning($message);
                }
            }
            return back()->withInput();
        }else{
            $requestEmail = $request->input('email');
            $user = User::where('email',$requestEmail)->first();
            $isExist = isset($user);
            $isUser = $user->level == "user";
            $isVoted = $user->is_voted == "true";
            if($isExist){
                if($isUser){
                    $student = Student::where('user_id',$user->id)->first();
                    $employee = Employee::where('user_id',$user->id)->first();
                    $isStudent = isset($student);
                    $isEmployee = isset($employee);
                    if($isStudent || $isEmployee){
                        if($isStudent){
                            $sessionStudent = Session::whereId($student->session_id)->first();
                            if($sessionStudent->status == "off"){
                                toastr()->warning('your session is not yet active, be patient please!');
                                return back();
                            }
                        }
                        if($isEmployee){
                            $sessionEmployee = Session::whereId($employee->session_id)->first();
                            if($sessionEmployee->status == "off"){
                                toastr()->warning('your session is not yet active, be patient please!');
                                return back();
                            }
                        }
                        if($isVoted){
                            toastr()->warning('You have exercised your right to vote, cannot vote more than once!');
                            return back();
                        }
                    }
                }
                $credentials = $request->only('email', 'password');
                $check = Auth::attempt($credentials);
                if ($check) {
                    $request->session()->regenerate();
                    toastr()->success('you have successfully logged in');
                    if($isUser){
                        return redirect()->intended(route('welcome'));
                    }else{
                        return redirect()->intended(RouteServiceProvider::HOME);
                    }
                }else{
                    toastr()->error('the password you entered is incorrect');
                    return back();
                }
            }else{
                toastr()->error('the email you entered is not available in our database');
                return back();
            }
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toastr()->success('you have successfully logged out');
        return redirect(route('login'));
    }

    public function generatePasswords(Request $request){
        $totalPasswordEncryption = $request->input('total');
        define('NON_ENCRYPTED_PASSWORD_LENGTH',10);
        $users = User::whereRaw('LENGTH(password) = ' . NON_ENCRYPTED_PASSWORD_LENGTH)->get();
        $index = 0;
        foreach ($users as $user) {
            $details = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password
            ];
            Mail::to($details['email'])->send(new UserAccountMail($details));
            User::where('email',$details['email'])->update([
                'password' => Hash::make($details['password'])
            ]);
            if($index == $totalPasswordEncryption){
                toastr()->success($totalPasswordEncryption . ' account passwords have been successfully encrypted');
                return back();
            }
            $index++;
        }
    }
    public function generatePassword($id){
        $user = User::whereId($id)->first();
        $details = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password
        ];
        Mail::to($details['email'])->send(new UserAccountMail($details));
        User::where('email',$details['email'])->update([
            'password' => Hash::make($details['password'])
        ]);
        toastr()->success($user->name . ' account password have been successfully encrypted');
        return back();
    }
    public function generateEmployePassword(){
        $employees = Employee::all();
        foreach ($employees as $employee) {
            $user = User::whereId($employee->user_id)->first();
            User::create([
                'id' => Str::uuid(),
                'name' => $employee->name,
                'email' => $employee->user->email,
                'password' => Hash::make($employee->nip),
                'is_voted' => false,
                'level' => "user",
                'remember_token' => Str::random(36)
            ]);
        }
        toastr()->success('employee account passwords have been successfully encrypted');
        return back();
    }
}
