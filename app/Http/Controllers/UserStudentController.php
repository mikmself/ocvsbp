<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Throwable;

class UserStudentController extends Controller
{
    public function index()
    {
        $students = Student::get();
        return view('dashboard.master.student.index',compact('students'));
    }
    public function create()
    {
        return view('dashboard.master.student.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'session_id' => 'required|numeric',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'nis' => 'required|numeric',
            'nisn' => 'required|numeric'
        ]);
        if($validator->fails()){
            return back()->withInput();
        }else{
            $userId = Str::uuid();
            $name = $request->input('name');
            toastr()->error('Oops! Something went wrong!');
            try {
                $isCreatedUserData = User::create([
                    'id' => $userId,
                    'name' => $name,
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'is_voted' => 'false'
                ]);
                $isCreatedStudentData = Student::create([
                    'id' => Str::uuid(),
                    'user_id' => $userId,
                    'session_id' => $request->input('session_id'),
                    'name' => $name,
                    'nis' => $request->input('session_id'),
                    'nisn' => $request->input('nisn')
                ]);
                if($isCreatedUserData && $isCreatedStudentData){
                    return back();
                }else{
                    return back();
                }
            } catch (Throwable $th) {
                return back();
            }

        }
    }
    public function show(Student $student)
    {
        //
    }
    public function edit(Student $student)
    {
        //
    }
    public function update(Request $request, Student $student)
    {
        //
    }
    public function destroy(Student $student)
    {
        //
    }
}
