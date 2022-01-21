<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LangueController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        $user = User::find(Auth::id());
        $langues = $user->langues;
        return view("langues.index",compact("langues"));
    }

    
    public function create()
    {
        return view("langues.create");
        
    }

    
    public function store(Request $request)
    {
        $input= $this->validate($request , [
            "nom" => "required" , 
            "niveau" => "required"
        ]);

    

        $langue = Langue::create($input);
        $langue->users()->attach(Auth::id());

        return redirect()->back();
    }

   
    public function show(Langue $langue)
    {
        //
    }

    
    public function edit($id)
    {
        $langue = Langue::find($id);
        return view("langues.edit",compact("langue"));
    }

 
    public function update(Request $request, $id)
    {
        $langue = Langue::find($id);
        $input= $this->validate($request , [
            "nom" => "required" , 
            "niveau" => "required"
        ]);
        $langue->nom = $input['nom'];
        $langue->niveau = $input['niveau'];

        $langue->save();

        return redirect()->back();

        
    }

   
    public function destroy($id)
    {
        $langue = Langue::find($id);
        $langue->delete();

        return redirect()->back();
    }
}
