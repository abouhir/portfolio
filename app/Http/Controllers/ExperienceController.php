<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
   
    public function index()
    {
        $user = User::find(Auth::id());
        $experiences = $user->experiences ; 
        return view("experiences.index",compact("experiences"));
    }

   
    public function create()
    {
        return view("experiences.create");
    }
    public function store(Request $request)
    {
    $input = $this->validate($request , [
            "titre" => "required" ,
            "description" => "required" , 
            "date" => "required" ,
            "lieu" => "required"
        ]);
        $input['user_id'] = Auth::id();
    $experience = Experience::create($input);
       
      return redirect()->back();
    }

    public function show(Experience $experience)
    {
        //
    }

    public function edit($id)
    {
        $experience = Experience::find($id);
        return view("experiences.edit")->with("experience" , $experience);
    }

    
    public function update(Request $request, $id)
    {
        $experience = Experience::find($id);
        $input = $this->validate($request , [
            "titre" => "required" ,
            "description" => "required" , 
            "date" => "required" ,
            "lieu" => "required"
        ]);

        $experience->titre = $input['titre'];
        $experience->description = $input['description'];
        $experience->date=$input['date'];
        $experience->lieu = $input['lieu'];

        $experience->save();

        return redirect()->back();



    }

    
    public function destroy($id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        return redirect()->back();
    }
}
