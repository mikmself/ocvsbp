<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Employee;
use App\Models\Student;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $alreadyChosen = User::where('is_voted','true')->count();
        $haventChosen = User::where('is_voted','false')->count();

        $studentsAttend = Student::whereHas('user',function(Builder $query){
            $query->where('is_voted','true');
        })->count();
        $employeesAttend = Employee::whereHas('user',function(Builder $query){
            $query->where('is_voted','true');
        })->count();

        $studentsAbstention = Student::whereHas('user',function(Builder $query){
            $query->where('is_voted','false');
        })->count();
        $employeesAbstention = Employee::whereHas('user',function(Builder $query){
            $query->where('is_voted','false');
        })->count();

        $totalCounts = [];
        $candidates = Candidate::get();
        foreach ($candidates as $candidate) {
            array_push($totalCounts,Vote::where('candidate_id',$candidate->id)->count());
        }

        return view('dashboard.index',compact(
            'alreadyChosen',
            'haventChosen',
            'studentsAttend',
            'employeesAttend',
            'studentsAbstention',
            'employeesAbstention',
            'candidates',
            'totalCounts'
        ));
    }
    public function welcome(){
        return view('userPage.welcome');
    }
    public function thanks(){
        return view('userPage.thanks');
    }
    public function electionIndex(){
        $candidates = Candidate::get();
        return view('userPage.index',compact('candidates'));
    }
    public function election(Request $request){
        $candidateId = $request->input('candidate_id');
        $userId = $request->input('user_id');
        $user = User::whereId($userId)->first();
        if(isset($user)){
            $isCreatedVote = Vote::create([
                'id' => Str::uuid(),
                'user_id' => $userId,
                'candidate_id' => $candidateId
            ]);
            if($isCreatedVote){
                $user->update([
                    'is_voted' => 'true'
                ]);
                toastr()->success('you have successfully selected the candidate');
                return redirect(route('thanks'));
            }
        }else{
            toastr()->warning('the user data you entered is invalid!');
            return back();
        }
    }
}
