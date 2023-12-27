<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesExport;
use App\Imports\UsersEmployeeImport;
use App\Models\Employee;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;
use Yajra\DataTables\DataTables;

class UserEmployeeController extends Controller
{
    public function index(Request$request)
    {
        // $employees = Employee::get();
        // return response()->view('dashboard.master.employee.index',compact('employees'));
        if ($request->ajax()) {
            $data = Employee::with('user','session')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    return '
                        <td>
                            <a href="/admin/dashboard/employee/edit/'.$row->id.'" class="btn btn-warning">Edit</a>
                            <a href="/admin/dashboard/employee/destroy/'.$row->id.'" class="btn btn-danger">Delete</a>
                        </td>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.master.employee.index');
    }
    public function create()
    {
        $sessions = Session::get();
        return response()->view('dashboard.master.employee.create',compact('sessions'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'session_id' => 'required|numeric',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'nip' => 'required',
            'division' => 'required'
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->messages() as $errors => $messages) {
                foreach($messages as $message){
                    toastr()->warning($message);
                }
            }
            return back()->withInput();
        }else{
            $userId = Str::uuid();
            $name = $request->input('name');
            try {
                $isCreatedUserData = User::create([
                    'id' => $userId,
                    'name' => $name,
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('nip')),
                    'is_voted' => 'false'
                ]);
                $isCreatedEmployeeData = Employee::create([
                    'id' => Str::uuid(),
                    'user_id' => $userId,
                    'session_id' => $request->input('session_id'),
                    'name' => $name,
                    'nip' => $request->input('nip'),
                    'division' => $request->input('division')
                ]);
                if($isCreatedUserData && $isCreatedEmployeeData){
                    toastr()->success('employee data successfully created');
                    return back();
                }else{
                    toastr()->error('employee data failed to create');
                    return back()->withInput();;
                }
            } catch (Throwable $throw) {
                toastr()->error($throw);
                return back()->withInput();;
            }

        }
    }
    public function edit($id)
    {
        $employee = Employee::whereId($id)->first();
        $sessions = Session::get();
        $isExist = isset($employee);
        if($isExist){
            return response()->view('dashboard.master.employee.edit',compact('employee','sessions'));
        }else{
            toastr()->error('employee data not found');
            return back();
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'session_id' => 'required|numeric',
            'name' => 'required|string',
            'email' => 'required|email',
            'nip' => 'required',
            'division' => 'required'
        ]);
        if ($request->input('newpassword') == null){
            $request->request->remove('newpassword');
        }
        if($validator->fails()){
            foreach ($validator->errors()->messages() as $errors => $messages) {
                foreach($messages as $message){
                    toastr()->warning($message);
                }
            }
            return back()->withInput();
        }else{
            $employee = Employee::whereId($id)->first();
            $user = User::whereId($employee->user->id)->first();
            $isExistEmployee = isset($employee);
            $isExistUser = isset($user);
            if($isExistEmployee && $isExistUser){
                $isUpdatedEmployee = $employee->update([
                    'session_id' => $request->input('session_id'),
                    'name' => $request->input('name'),
                    'nip' => $request->input('nip'),
                    'division' => $request->input('division')
                ]);
                $isUpdatedUser = $user->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('newpassword'))
                ]);
                if($isUpdatedEmployee && $isUpdatedUser){
                    toastr()->success('employee data successfully updated');
                    return back();
                }else{
                    toastr()->error('employee data failed to update');
                    return back()->withInput();
                }
            }else{
                toastr()->error('employee data not found');
                return redirect(route('indexmasteremployee'));
            }
        }
    }
    public function destroy($id)
    {
        $employee = Employee::whereId($id)->first();
        $isExist = isset($employee);
        if($isExist){
            $isDeleted = $employee->delete();
            User::where('id',$employee->user_id)->delete();
            if($isDeleted){
                toastr()->success('employee data successfully deleted');
                return back();
            }else{
                toastr()->error('employee data failed to delete');
                return back()->withInput();
            }
        }else{
            toastr()->error('employee data not found');
            return redirect(route('indexmasteremployee'));
        }
    }
    public function export()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }
    public function import(Request $request){
        if($request->hasFile('file')){
            $isImported = Excel::import(new UsersEmployeeImport, $request->file('file'));
            if($isImported){
                toastr()->success('employee data successfully imported');
                return back();
            }else{
                toastr()->error('employee data failed to import');
            }
        }else{
            toastr()->error('data not valid!');
        }
    }
    public function download(){
        $path = public_path('/excel/exampleEmployee.xlsx');
        $fileName = 'exampleEmployee.xlsx';
        toastr()->success('example file successfully downloaded');
        return response()->download($path, $fileName);
    }
}
