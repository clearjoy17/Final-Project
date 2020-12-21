<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Learner;

class LearnerController extends Controller
{
    public function index(){
        $learners = Learner::get();
        return view('learners.index', compact('learners'));
    }
    public function create(){
        return view('learners.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'user_id'=> 'required|numeric|unique:learners,user_id|unique:instructors,user_id',
            'level'=> 'required',
            'status'=> 'required'
        ]);

        Learner::create($request->all());

        return redirect('/learners')->with ('info', 'A new learner has been added.');

    }

    public function edit(Learner $learner){
        return view('learners.edit', ['learner'=>$learner]);
    }

    public function update(Request $request, Learner $learner) {
        $this->validate($request,[
            'level'     => 'required',
            'status'    => 'required'
        ]);
        $learner->update($request->all());

        return redirect('/learners')->with('info', "The data has been updated.");
    }
    public function delete(Request $request){
        $learnerId = $request['learner_id'];
        $learner = learner::find($learnerId);
        $name = $learner->user->fname . " " .  $learner->user->lname;
        $learner->delete();
        return redirect('/learners')->with('info', "The record of $name has been deleted successfully.");
    }
}
