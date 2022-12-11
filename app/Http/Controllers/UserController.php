<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('level','!=','user')->get();
        return response()->view('dashboard.master.user.index',compact('users'));
    }
    public function create()
    {
        return response()->view('dashboard.master.user.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'level' => 'required',
            'password' => 'required',
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->messages() as $errors => $messages) {
                foreach($messages as $message){
                    toastr()->warning($message);
                }
            }
            return back()->withInput();
        }else{
            try {
                $isCreated = User::create([
                    'id' => Str::uuid(),
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'level' => $request->input('level'),
                    'is_voted' => 'false',
                ]);
                if($isCreated){
                    toastr()->success('user data successfully created');
                    return back();
                }else{
                    toastr()->error('user data failed to create');
                    return back()->withInput();;
                }
            } catch (Throwable $throw) {
                toastr()->error('something wrong!');
                return back()->withInput();;
            }

        }
    }
    public function edit($id)
    {
        $user = User::whereId($id)->first();
        $isExist = isset($user);
        if($isExist){
            return response()->view('dashboard.master.user.edit',compact('user'));
        }else{
            toastr()->error('user data not found');
            return back();
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email',
            'level' => 'required',
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->messages() as $errors => $messages) {
                foreach($messages as $message){
                    toastr()->warning($message);
                }
            }
            return back()->withInput();
        }else{
            $user = User::whereId($id)->first();
            $isExist = isset($user);
            if($isExist){
                $isUpdated = $user->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('newpassword')),
                    'level' => $request->input('level'),
                ]);
                if($isUpdated){
                    toastr()->success('user data successfully updated');
                    return back();
                }else{
                    toastr()->error('user data failed to update');
                    return back()->withInput();
                }
            }else{
                toastr()->error('user data not found');
                return redirect(route('indexmasteruser'));
            }
        }
    }
    public function destroy($id)
    {
        $user = User::whereId($id)->first();
        $isExist = isset($user);
        if($isExist){
            $isDeleted = $user->delete();
            if($isDeleted){
                toastr()->success('user data successfully deleted');
                return back();
            }else{
                toastr()->error('user data failed to delete');
                return back()->withInput();
            }
        }else{
            toastr()->error('user data not found');
            return redirect(route('indexmasteruser'));
        }
    }
}
