@extends('layouts.left-menu',
[
    "page_name" =>"Formations" , 
    "route_create" => route("formation.create"),
    "route_show" => route("formation.index"),
    "route_update" => route("formation.index"),
    "action" => "update"
])

@section('content')
<div class="bg-create-formation">
    <form action="{{route("formation.update",$formation->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row mt-5 mb-3">
            <div class="offset-4 col-8">
                <div class="row">
            <label for="titre" class="form-label lbl-clr col-2">Titre <span class="text-danger">*</span> </label>
            </div>
            <div class="row">
            <div class="col-8">
                <input class="form-control input-form" name="titre" value="{{$formation->titre}}" id="titre" type="text" placeholder="Titre" required>
            </div>
        </div>
        </div>
            <div class=" offset-md-2 col-md-10 text-danger">
                @foreach ($errors->get('titre') as $error)
                    {{"*".$error."*"}}
                @endforeach
            </div>
        </div>
       
    <div class="row mb-3">
        <div class="offset-4 col-8">
            <div class="row">
        <label for="description" class="form-label lbl-clr col-2">Description <span class="text-danger">*</span></label>
        </div>
        <div class="row">
        <div class="col-8">
            <textarea class="form-control input-form scrollbar" rows="4" name="description" placeholder="Description" required>{{$formation->description}}</textarea>  
        </div> 
    </div> 
</div>
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('description') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>
    <div class="row mb-3">
        <div class="offset-4 col-8">
            <div class="row">
        <label for="logo" class="form-label col-12 lbl-clr">Annee Universitaire <span class="text-danger">*</span> </label>
        </div>
        <div class="row">
        <div class="col-8">
            <input class="form-control input-form" name="annee" value="{{$formation->annee}}" placeholder="{{now()->year . "-" . now()->year-1 }}" id="logo" type="text" />
        </div>
    </div>
    </div>
        <div class=" offset--2 col-md-10 text-danger">
            @foreach ($errors->get('annee') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>

    <div class="row mb-3"> 
        <div class="offset-4 col-8">
        <label for="lieu" class="form-label lbl-clr col-12">Lieu </label>
        <div class="col-8">
            <input class="form-control input-form" name="lieu" value="{{$formation->lieu}}" placeholder="Casablanca..." required/> 
        </div> 
    </div>
        <div class=" offset-md-2 col-md-10 text-danger">
            @foreach ($errors->get('lieu') as $error)
                {{"*".$error."*"}}
            @endforeach
        </div>
    </div>
    <div class="row mt-5">
        <div class="offset-5 col-8">
        <div class="">
            <button  type="submit" class="col-4 btn btn-clr " >Modifier</button>
        </div>
    </div>
    </div>
</form>
</div>
@endsection