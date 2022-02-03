@extends('layouts.left-menu',
[
    "page_name" =>"Langues" , 
    "route_create" => route("langue.create"),
    "route_show" => route("langue.index"),
    "route_update" => route("langue.index"),
    "action" => "create"
])

@section('content')
<div class="bg-langue" style="padding-top: 100px ;" >
   
  
    <form action="{{route("langue.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <div class="row mb-3 mt-5">
            <div class="offset-4">
            <label for="langue" class="form-label col-2 lbl-clr">Langue <span class="text-danger">*</span></label>
            <div class="col-4">
                <select name="nom" class="form-select input-form" id="langue" required>
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
          </div>
        <div class="row mb-3 mt-3">
            <div class="offset-4">
            <label for="niveau" class="form-label col-2 lbl-clr">Niveau <span class="text-danger">*</span></label>
            <div class="col-4">
                <select name="niveau" class="form-select input-form" id="niveau" required>
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
        </div>
    <div class="row mt-5">
        <div class=" d-flex justify-content-center">
            <button  type="submit" class="col-2 btn btn-clr " >Create</button>
        </div>
    </div>
</form>
</div>
@endsection