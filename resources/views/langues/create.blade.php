@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 ">
        <div class="fs-1 text-center">
            Create Langue
        </div>
    </div>
  
    <form action="{{route("langue.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <div class="row mb-3">
            <label for="langue" class="form-label col-md-2">Langue <span class="text-danger">*</span></label>
            <div class="col-md-10">
                <select name="nom" class="form-select" id="langue" >
                    <option value="" selected disabled>Choisir une Langue...</option>
                    <option value="Arab">Arab</option>
                    <option value="Anglais">Anglais</option>
                    <option value="Français">Français</option>
                    <option value="Allemand">Allemand</option>
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
                    <option value="" selected disabled>Choisir un Niveau... </option>
                    <option value="Langue maternelle">Langue Maternelle</option>
                    <option value="Courant">Courant</option>
                    <option value="Intermédiare">Intermédiare</option>
                    <option value="Débutant">Débutant</option>
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