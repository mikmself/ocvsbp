<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Throwable;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::get();
        return response()->view('dashboard.master.candidate.index',compact('candidates'));
    }
    public function create()
    {
        return response()->view('dashboard.master.candidate.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'vision' => 'required',
            'mission' => 'required',
            'motto' => 'required',
            'photo' => 'required|image|mimes:png,jpg,jpeg'
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
                $imageName = time().'.'.$request->photo->extension();
                $request->photo->move(public_path('candidate'), $imageName);
                $isCreated = Candidate::create([
                    'id' => Str::uuid(),
                    'name' => $request->input('name'),
                    'vision' => $request->input('vision'),
                    'mission' => $request->input('mission'),
                    'motto' => $request->input('motto'),
                    'photo' => '/candidate/' . $imageName
                ]);
                if($isCreated){
                    toastr()->success('candidate data successfully created');
                    return back();
                }else{
                    toastr()->error('candidate data failed to create');
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
        $candidate = Candidate::whereId($id)->first();
        $isExist = isset($candidate);
        if($isExist){
            return response()->view('dashboard.master.candidate.edit',compact('candidate'));
        }else{
            toastr()->error('candidate data not found');
            return back();
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'vision' => 'required',
            'mission' => 'required',
            'motto' => 'required'
        ]);
        if($validator->fails()){
            foreach ($validator->errors()->messages() as $errors => $messages) {
                foreach($messages as $message){
                    toastr()->warning($message);
                }
            }
            return back()->withInput();
        }else{
            $candidate = Candidate::whereId($id)->first();
            $isExist = isset($candidate);
            if($isExist){
                $isUpdated = $candidate->update([
                    'name' => $request->input('name'),
                    'vision' => $request->input('vision'),
                    'mission' => $request->input('mission'),
                    'motto' => $request->input('motto')
                ]);
                if($request->hasFile('photo')){
                    $imageName = time().'.'.$request->photo->extension();
                    $request->photo->move(public_path('candidate'), $imageName);
                    File::delete(public_path($candidate->photo));
                    $candidate->update([
                        'photo' => '/candidate/' . $imageName
                    ]);
                }
                if($isUpdated){
                    toastr()->success('candidate data successfully updated');
                    return back();
                }else{
                    toastr()->error('candidate data failed to update');
                    return back()->withInput();
                }
            }else{
                toastr()->error('candidate data not found');
                return redirect(route('indexmastercandidate'));
            }
        }
    }
    public function destroy($id)
    {
        $candidate = Candidate::whereId($id)->first();
        $isExist = isset($candidate);
        if($isExist){
            $isDeleted = $candidate->delete();
            if($isDeleted){
                toastr()->success('candidate data successfully deleted');
                return back();
            }else{
                toastr()->error('candidate data failed to delete');
                return back()->withInput();
            }
        }else{
            toastr()->error('candidate data not found');
            return redirect(route('indexmastercandidate'));
        }
    }
}
