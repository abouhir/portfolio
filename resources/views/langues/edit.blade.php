@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 ">
        <div class="fs-1 text-center">
           Update
        </div>
    </div>
  
    <form action="{{route("langue.update" , $langue->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row mb-3">
            <label for="langue" class="form-label col-md-2">Langue <span class="text-danger">*</span></label>
            <div class="col-md-10">
                <select name="nom" class="form-select" id="langue" >
                    <option value="Arab" {{$langue->nom=="Arab" ? "selected" : "" }}>Arab</option>
                    <option value="Anglais" {{$langue->nom=="Anglais" ? "selected" : "" }}>Anglais</option>
                    <option value="Français" {{$langue->nom=="Français" ? "selected" : "" }}>Français</option>
                    <option value="Allemand" {{$langue->nom=="Allemand" ? "selected" : "" }}>Allemand</option>
                </select>
            </div>
            <div class=" offset-md-2 col-md-10 text-danger">
                @foreach ($errors->get('langue') as $error)
                    {{"*".$error."*"}}
                @endforeach
            </div>
        </div>
        <div class="row mb-3">
            <label for="niveau" class="form-label col-md-2">Niveau </label>
            <div class="col-md-10">
                <select name="niveau" class="form-select" id="niveau">
                    <option value="Langue maternelle" {{ $langue->niveau =="Langue maternelle" ? "selected" : "" }}>Langue Maternelle</option>
                    <option value="Courant" {{ $langue->niveau =="Courant" ? "selected" : "" }}>Courant</option>
                    <option value="Intermédiare" {{ $langue->niveau =="Intermédiare" ? "selected" : ""}}>Intermédiare</option>
                    <option value="Débutant" {{ $langue->niveau =="Débutant" ? "selected" : "" }}>Débutant</option>
                </select>
            </div>
            <div class=" offset-md-2 col-md-10 text-danger">
                @foreach ($errors->get('niveau') as $error)
                    {{"*".$error."*"}}
                @endforeach
            </div>
        </div>
    <div class="row mt-5">
        <div class=" d-flex justify-content-center">
            <button  type="submit" class="col-md-4 btn btn-success " >Create Langue</button>
        </div>
    </div>
</form>
</div>
@endsection