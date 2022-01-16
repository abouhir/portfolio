@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 mb-3">
        <div class="fs-1 text-center">
            Edit Profile 
        </div>
    </div>
  
    <form action="{{route("profile.update")}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
          
    <div class="row mb-3">
        <label for="name" class="form-label col-md-2">User name</label>
        <div class="col-md-10">
            <input class="form-control form-control" value="{{$profile->user->name}}" name="name" id="name" required >
        </div>   
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('name') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>
    <div class="row mb-3">
        <label for="email" class="form-label col-md-2">Email</label>
        <div class="col-md-10">
            <input type="email" class="form-control form-control" value="{{$profile->user->email}}" name="email" id="email" required>
        </div>
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('email') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>
    <div class="row mb-3">
        <label for="password" class="form-label col-md-2">Password</label>
        <div class="col-md-10">
            <input type="password" class="form-control form-control" value="{{($profile->user->password)}}" name="password" id="password" required>
        </div>
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('password') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>
   
    <div class="row">
    <div class="col-md-12 mb-3">
        <div class="d-flex justify-content-center">
             <img width="100" height="100" class="rounded-pill " src="{{asset("storage/profiles_images/".$profile->image)}}" alt="Profile Image" />
        </div>
    </div>
    </div>
        <div class="row mb-3">
           
            <label for="formFile" class="form-label col-md-2">Image <span class="text-danger">*</span></label>
            <div class="col-md-10">
                <input class="form-control form-control" name="image" id="formFileLg" type="file" required>
            </div>
            <div class=" offset-md-2 col-md-10 text-danger">
                @foreach ($errors->get('image') as $error)
                    {{"*".$error."*"}}
                @endforeach
            </div>
        </div>
        <div class="row">
        <div class="col-md-12 mb-3 ">
            <div class="d-flex justify-content-center">
            <img width="100%" height="200"  src="{{asset("storage/profiles_images_covertures/".$profile->coverture_image)}}" alt="Profile Image" />
        </div>
    </div>
        </div>
        <div class="row mb-3">
            <label for="formFile" class="form-label col-md-2">Image Coverture</label>
            <div class="col-md-10">
                <input class="form-control form-control" name="coverture_image" id="formFile" type="file">
            </div>
            <div class=" offset-md-2 col-md-10 text-danger">
                @foreach ($errors->get('coverture_image') as $error)
                    {{"*".$error."*"}}
                @endforeach
            </div>
        </div>
    <div class="row mb-3"> 
        <label for="description" class="form-label col-md-2">Description <span class="text-danger">*</span></label>
        <div class="col-md-10">
            <textarea class="form-control " name="description"  placeholder="Description" required>{{$profile->description}}</textarea>  
        </div> 
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('description') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>
    <div class="row mb-3">
        <label for="telephone" class="form-label col-md-2">Telephone <span class="text-danger">*</span></label>
        <div class="col-md-10">
            <input type="tel" class="form-control " name="telephone" value="{{$profile->telephone}}" placeholder="Telephone" required/> 
        </div>
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('telephone') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>
    <div class="row mb-3">
        <label for="adresse" class="form-label col-md-2">Adresse <span class="text-danger">*</span></label>
        <div class="col-md-10">
            <textarea class="form-control " name="adresse"  placeholder="Adresse" required>{{$profile->adresse}}</textarea> 
        </div>
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('adresse') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>
    <div class="row mb-3">
        <label for="facebook" class="form-label col-md-2" >Facebook Url </label>
        <div class="col-md-10">
            <input type="text" class="form-control " name="facebook" value="{{$profile->facebook}}" placeholder="Facebook Url"/> 
        </div>
    </div>
   
    <div class="row mb-3">
        <label for="github" class="form-label col-md-2">gitHub Url </label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="github" value="{{$profile->github}}" placeholder="Github Url"/> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="linkedin" class="form-label col-md-2" >Linkedin Url </label>
        <div class="col-md-10">
            <input type="text" class="form-control " name="linkedin" value="{{$profile->lindin}}" placeholder="Linkedin Url"/> 
        </div>
    </div>
    <div class="row mt-5">
        <div class=" d-flex justify-content-center">
            <button  type="submit" class="col-md-4 btn btn-success " >Create Profile</button>
        </div>
    </div>
</form>
</div>
<script>
    var inputPassword = document.getElementById('password');
    var password = inputPassword.value;
    inputPassword.addEventListener('focus',(e)=>{
        e.target.value="";
    });
    inputPassword.addEventListener('focusout',(e)=>{
        e.target.value=password;
    });
</script>
@endsection