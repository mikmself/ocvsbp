<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::get();
        return response()->view('dashboard.master.session.index',compact('sessions'));
    }
    public function create()
    {
        return response()->view('dashboard.master.session.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
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
                $isCreated = Session::create([
                    'name' => $request->input('name'),
                    'status' => 'off'
                ]);
                if($isCreated){
                    toastr()->success('session data successfully created');
                    return back();
                }else{
                    toastr()->error('session data failed to create');
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
        $session = Session::whereId($id)->first();
        $isExist = isset($session);
        if($isExist){
            return response()->view('dashboard.master.session.edit',compact('session'));
        }else{
            toastr()->error('session data not found');
            return back();
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->messages() as $errors => $messages) {
                foreach($messages as $message){
                    toastr()->warning($message);
                }
            }
            return back()->withInput();
        }else{
            $session = Session::whereId($id)->first();
            $isExist = isset($session);
            if($isExist){
                $isUpdated = $session->update([
                    'name' => $request->input('name')
                ]);
                if($isUpdated){
                    toastr()->success('session data successfully updated');
                    return back();
                }else{
                    toastr()->error('session data failed to update');
                    return back()->withInput();
                }
            }else{
                toastr()->error('session data not found');
                return redirect(route('indexmastersession'));
            }
        }
    }
    public function destroy($id)
    {
        $session = Session::whereId($id)->first();
        $isExist = isset($session);
        if($isExist){
            $isDeleted = $session->delete();
            if($isDeleted){
                toastr()->success('session data successfully deleted');
                return back();
            }else{
                toastr()->error('session data failed to delete');
                return back()->withInput();
            }
        }else{
            toastr()->error('session data not found');
            return redirect(route('indexmastersession'));
        }
    }
    public function turnOn($id)
    {
        $session = Session::whereId($id)->first();
        $isExist = isset($session);
        if($isExist){
            $isTurnedOn = $session->update([
                'status' => 'on'
            ]);
            if($isTurnedOn){
                toastr()->success('session successfully turned on');
                return back();
            }else{
                toastr()->error('session failed turned on');
                return back()->withInput();
            }
        }else{
            toastr()->error('session data not found');
            return redirect(route('indexmastersession'));
        }
    }
    public function turnOff($id)
    {
        $session = Session::whereId($id)->first();
        $isExist = isset($session);
        if($isExist){
            $isTurnedOff = $session->update([
                'status' => 'off'
            ]);
            if($isTurnedOff){
                toastr()->success('session successfully turned off');
                return back();
            }else{
                toastr()->error('session failed turned off');
                return back()->withInput();
            }
        }else{
            toastr()->error('session data not found');
            return redirect(route('indexmastersession'));
        }
    }
}
