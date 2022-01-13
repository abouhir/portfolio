@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 ">
        <div class="fs-1 text-center">
            Create Profile
        </div>
    </div>
    <!--<div class="row mb-3 ">
        <div class="col-md-12">
            <div class="fs-5">
                {{$user_name}}
            </div>
        </div>
    </div>-->
    <div class="row mb-3">
        <label for="formFile" class="form-label col-md-2">User name</label>
        <div class="col-md-10">
            <input class="form-control form-control" value="{{$user_name}}" id="formFileLg" readonly>
        </div>
        
    </div>
    <form action="{{route("profile.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")
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
            <textarea class="form-control " name="description" placeholder="Description" required></textarea>  
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
            <input type="tel" class="form-control " name="telephone" placeholder="Telephone" required/> 
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
            <textarea class="form-control " name="adresse" placeholder="Adresse" required></textarea> 
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
            <input type="text" class="form-control " name="facebook" placeholder="Facebook Url"/> 
        </div>
    </div>
   
    <div class="row mb-3">
        <label for="github" class="form-label col-md-2">gitHub Url </label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="github" placeholder="Github Url"/> 
        </div>
    </div>
    <div class="row mb-3">
        <label for="linkedin" class="form-label col-md-2" >Linkedin Url </label>
        <div class="col-md-10">
            <input type="text" class="form-control " name="linkedin" placeholder="Linkedin Url"/> 
        </div>
    </div>
    <div class="row mt-5">
        <div class=" d-flex justify-content-center">
            <button  type="submit" class="col-md-4 btn btn-success " >Create Profile</button>
        </div>
    </div>
</form>
</div>
@endsection