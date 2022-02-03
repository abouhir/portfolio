@extends('layouts.left-menu',
[
    "page_name" =>"Langues" , 
    "route_create" => route("langue.create"),
    "route_show" => route("langue.index"),
    "route_update" => route("langue.index"),
    "action" => "update"
])

@section('content')
<div class="bg-langue" style="padding-top: 100px ;" >
   
  
    <form action="{{route("langue.update",$langue->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row mb-3 mt-5">
            <div class="offset-4">
            <label for="langue" class="form-label col-2 lbl-clr">Langue <span class="text-danger">*</span></label>
            <div class="col-4">
                <select name="nom" class="form-select input-form" id="langue" >
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
          </div>
        <div class="row mb-3 mt-3">
            <div class="offset-4">
            <label for="niveau" class="form-label col-2 lbl-clr">Niveau <span class="text-danger">*</span></label>
            <div class="col-4">
                <select name="niveau" class="form-select input-form" id="niveau">
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
        </div>
    <div class="row mt-5">
        <div class=" d-flex justify-content-center">
            <button  type="submit" class="col-2 btn btn-clr " >Modifier</button>
        </div>
    </div>
</form>
</div>
@endsection
