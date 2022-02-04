<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Profiler\Profile as ProfilerProfile;
use Symfony\Component\HttpKernel\Profiler\Profiler;

use function PHPUnit\Framework\isNull;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
   
    public function create()
    {
        $user_id = Auth::id();
        $profile = Profile::all()->where('user_id' , $user_id)->first();
        if(empty($profile)){
            return view("profiles.create")->with("user_name",Auth::user()->name);
        }else{
            return redirect()->route("profile.show");
        }
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $profile = Profile::all()->where('user_id' , $user_id)->first();
        if(empty($profile)){
        $input = $request->all();
        $validator = $this->validate($request , [
            "image" => "required|image|mimes:jpeg,png,jpg" , 
            "coverture_image" =>"image|mimes:jpeg,png,jpg" , 
            "description"=>"required",
            "adresse"=>"required" , 
            "telephone"=>"required" ,  
        ]);
        if($request->hasFile("image")){
        $destination_image ="public/profiles_images" ;
        $image = $request->file("image");
        $imageName = "image_".$user_id.$image->getClientOriginalName(); 
        $request->file("image")->storeAs($destination_image,$imageName);
        $input['image'] = $imageName;
       }
       if($request->hasFile("coverture_image")){
        $destination_image_coverture ="public/profiles_images_covertures" ;
        $image_coverture = $request->file("coverture_image");
        $imageName_coverture = "coverture_".$user_id.$image_coverture->getClientOriginalName(); 
        $request->file("coverture_image")->storeAs($destination_image_coverture,$imageName_coverture);
        $input['coverture_image'] = $imageName_coverture;
       }
       $input['user_id'] = $user_id;

        $profile=Profile::create($input);
        return redirect()->route("home")->with("message","Profile cree avec success");
    }else{
        return redirect()->route("home")->with("message","Profile déja cree ");
    }

        
    }

  
    public function show()
    { 
        $user = Auth::user();
        if(empty($user->profile)){ 
        return view("profiles.create");
    }
    return view("profiles.show")->with("profile",$user->profile);
    }

  
    public function edit()
    { 
        $user= Auth::user();
        if(empty($user->profile)){
            return redirect()->route("profile.create")->with("user_name",$user->name);
        }
       
        return view("profiles.edit")->with(["profile"=>$user->profile , "user_name"=>$user->name]);
        
    }

 
    public function update(Request $request)
    {
        $user_id = Auth::id();
        $profile = Profile::all()->where("user_id" , $user_id)->first();
        if(empty($profile)){
            return view("profiles.create")->with("user_name",Auth::user()->name);
        }
        
            $input = $request->all();
            $validator = $this->validate($request , [
                "name" => "required" , 
                "email"=> "required" , 
                "password" => "required" ,
                "image" => "image|mimes:jpeg,png,jpg" , 
                "coverture_image" =>"image|mimes:jpeg,png,jpg" , 
                "description"=>"required",
                "adresse"=>"required" , 
                "telephone"=>"required" ,  
            ]);

            if(Hash::check($input['password'], $profile->user->password)){   
                if($request->hasFile("image")){
                    $destination_image ="public/profiles_images" ;
                    $image = $request->file("image");
                    $imageName = "image_".$user_id.$image->getClientOriginalName(); 
                    $request->file("image")->storeAs($destination_image,$imageName);
                    Storage::delete("public/profiles_images/".$profile->image);
                    $request->file("image")->storeAs($destination_image,$imageName);
                    $input['image'] = $imageName;
                    $profile->image= $input['image'];
                
                }
                if($request->hasFile("coverture_image")){
                    $destination_image_coverture ="public/profiles_images_covertures" ;
                    $image_coverture = $request->file("coverture_image");
                    $imageName_coverture = "coverture_".$user_id.$image_coverture->getClientOriginalName(); 
                    Storage::delete("public/profiles_images_coverture/".$profile->coverture_image);
                    $request->file("coverture_image")->storeAs($destination_image_coverture,$imageName_coverture);
                    $input['coverture_image'] = $imageName_coverture;
                    $profile->coverture_image= $input['coverture_image'];
           }
         
           $profile->user->name =  $input['name']; 
           $profile->user->email =  $input['email'];   
           if(!empty($input['new_password']))
                $profile->user->password =  Hash::make($input['new_password']);  
           $profile->description = $input['description'];
           $profile->adresse = $input['adresse'];
           $profile->telephone = $input['telephone'];
           $profile->facebook = $input['facebook'];
           $profile->linkedin= $input['linkedin'];
           $profile->github = $input['github'];
           $profile->save();
           $profile->user->save();

           return redirect()->back()->with(["message"=>"Profile Modifier !!"]);
        } 
    
        return redirect()->back()->withErrors(["message"=>"Mot de passe incorrect !!"]);
          
}

   
 
}
