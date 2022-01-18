<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompetenceController extends Controller
{

    public function index(){
       $user =User::find(Auth::id());
       $competences = $user->competences;
        return view("competences.index" , compact("competences",$competences));
    }
   
    public function create()
    {
        return view("competences.create");
    }

   
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $validator = $this->validate($request , [
            "nom"=>"required" , 
            "description" => "required" , 
            "logo" => "image|mimes : png,jpg,jpeg,gif"
        ]);
        $input = $request->all();
        if($request->hasFile("logo")){
            $destination_image ="public/competences_logo" ;
            $image = $request->file("logo");
            $imageName = "logo_".$user_id.$image->getClientOriginalName(); 
            $request->file("logo")->storeAs($destination_image,$imageName);
            $input['logo'] = $imageName;
        }

        $competence = Competence::create([
            "nom" => $input['nom'] , 
            "description" => $input['description'] , 
            "logo" => $input['logo']
            ]
        );
        $competence->users()->attach($user_id);

        return redirect()->back()->with("message" , "Competence cree");

    }

   

    public function edit($id)
    {
        $competence = Competence::find($id);
        return view("competences.edit",compact("competence"));
    }

  
    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        $competence = Competence::find($id);
        $validator = $this->validate($request , [
            "nom"=>"required" , 
            "description" => "required" , 
            "logo" => "image|mimes : png,jpg,jpeg,gif"
        ]);
        $input = $request->all();
        if($request->hasFile("logo")){
            $destination_image ="public/competences_logo" ;
            $image = $request->file("logo");
            $imageName = "logo_".$user_id.$image->getClientOriginalName(); 
            $request->file("logo")->storeAs($destination_image,$imageName);
            Storage::delete($destination_image."/".$competence->logo);
            $input['logo'] = $imageName;
            $competence->logo =  $input['logo'];
        }
        $competence->nom = $input['nom'];
        $competence->description = $input['description'];
        $competence->save();

        return redirect()->back();
    }

    
    public function destroy($id)
    {
        $competence = Competence::find($id);
        $competence->delete();
        return redirect()->route("competence.index");
    }
}
