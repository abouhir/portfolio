@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 mb-5 ">
        <div class="fs-1 text-center">
            Update Competence
        </div>
    </div>
   
    
    <form action="{{route("competence.update",$competence->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row mb-3 ">
            <label for="logo" class="form-label d-flex justify-content-center col-md-12"> <img width="200" height="200"  src="{{asset("storage/competences_logo/".$competence->logo)}}" alt="Profile Image" /> </label>
           
                <input class="form-control form-control" name="logo" id="logo" type="file" hidden>
            
            <div class=" offset-md-2 col-md-10 text-danger">
                @foreach ($errors->get('logo') as $error)
                    {{"*".$error."*"}}
                @endforeach
            </div>
        </div>
        <div class="row mb-3">
            <label for="nom" class="form-label col-md-2">Nom <span class="text-danger">*</span> </label>
            <div class="col-md-10">
                <input class="form-control form-control" name="nom" value="{{$competence->nom}}" id="nom" type="text" placeholder="Nom" required>
            </div>
            <div class=" offset-md-2 col-md-10 text-danger">
                @foreach ($errors->get('nom') as $error)
                    {{"*".$error."*"}}
                @endforeach
            </div>
        </div>
       
    <div class="row mb-3"> 
        <label for="description" class="form-label col-md-2">Description <span class="text-danger">*</span></label>
        <div class="col-md-10">
            <textarea class="form-control" rows="4" name="description" placeholder="Description" required>{{$competence->description}}</textarea>  
        </div> 
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('description') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>
    
    <div class="row mt-5">
        <div class=" d-flex justify-content-center">
            <button  type="submit" class="col-md-4 btn btn-success " >Update Competence</button>
        </div>
    </div>
</form>
</div>
@endsection