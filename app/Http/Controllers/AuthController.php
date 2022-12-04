<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            if($isExist){
                $credentials = $request->only('email', 'password');
                $check = Auth::attempt($credentials);
                if ($check) {
                    $request->session()->regenerate();
                    toastr()->success('you have successfully logged in');
                    return redirect()->intended(RouteServiceProvider::HOME);
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

    public function generatePassword($totalPasswordEncryption){
        define('NON_ENCRYPTED_PASSWORD_LENGTH',10);
        $users = User::whereRaw('LENGTH(password) = ' . NON_ENCRYPTED_PASSWORD_LENGTH)->get();
        $index = 0;
        foreach ($users as $user) {

            if($index == $totalPasswordEncryption){
                toastr()->success($totalPasswordEncryption . ' account passwords have been successfully encrypted');
                return back();
            }
            $index++;
        }
    }
}
