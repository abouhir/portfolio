@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 mb-5 ">
        <div class="fs-1 text-center">
            Create Experience
        </div>
    </div>
   
    
    <form action="{{route("experience.update",$experience->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row mb-3">
            <label for="titre" class="form-label col-md-2">Titre <span class="text-danger">*</span> </label>
            <div class="col-md-10">
                <input class="form-control form-control" name="titre" value="{{$experience->titre}}"  id="titre" type="text" placeholder="Nom" required>
            </div>
            <div class=" offset-md-2 col-md-10 text-danger">
                @foreach ($errors->get('titre') as $error)
                    {{"*".$error."*"}}
                @endforeach
            </div>
        </div>
       
    <div class="row mb-3"> 
        <label for="description" class="form-label col-md-2">Description <span class="text-danger">*</span></label>
        <div class="col-md-10">
            <textarea class="form-control" rows="4" name="description" placeholder="Description" required>{{$experience->description}}</textarea>  
        </div> 
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('description') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>
    <div class="row mb-3">
        <label for="logo" class="form-label col-md-2">Annee Universitaire <span class="text-danger">*</span> </label>
        <div class="col-md-10">
            <input class="form-control form-control" name="date" value="{{$experience->date}}" placeholder="{{now()->year . "-" . now()->year-1 }}" id="logo" type="text" />
        </div>
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('date') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>

    <div class="row mb-3"> 
        <label for="lieu" class="form-label col-md-2">Lieu </label>
        <div class="col-md-10">
            <input class="form-control" name="lieu" value="{{$experience->lieu}}" placeholder="Casablanca..." required/> 
        </div> 
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('lieu') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>
    <div class="row mt-5">
        <div class=" d-flex justify-content-center">
            <button  type="submit" class="col-md-4 btn btn-success " >Create Experience</button>
        </div>
    </div>
</form>
</div>
@endsection