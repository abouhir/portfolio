<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $user = User::find(Auth::id());
        $formations = $user->formations;
        return view("formations.index",compact("formations"));
    }

  
    public function create()
    {
        return view("formations.create");
    }

    
    public function store(Request $request)
    {
        $input = $this->validate($request , [
            "titre" => "required" , 
            "description" => "required" , 
            "annee" => "required" , 
            "lieu" => "required" , 
        
        ]); 
        $input['user_id'] = Auth::id();

        $formation = Formation::create($input);

        return redirect()->back();

    }

 
    public function show(Formation $formation)
    {
        //
    }

    
    public function edit($id)
    {
        $formation = Formation::find($id);
        return view("formations.edit",compact("formation"));
    }

    public function update(Request $request, $id)
    {
        $formation = Formation::find($id);
        $input = $this->validate($request , [
            "titre" => "required" , 
            "description" => "required" , 
            "annee" => "required" , 
            "lieu" => "required" , 
        
        ]); 
        $formation->titre = $input['titre'];
        $formation->description = $input['description'];
        $formation->annee = $input['annee'];
        $formation->lieu = $input['lieu'];
        $formation->save();
        return redirect()->back();
    }

    
    public function destroy($id)
    {
        $formation = Formation::find($id);
        $formation->delete();
        return redirect()->back();
    }
}
