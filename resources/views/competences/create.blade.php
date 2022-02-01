@extends('layouts.left-menu',
[
    "page_name" =>"Competence" , 
    "route_create" => route("competence.create"),
    "route_show" => route("competence.index"),
    "route_update" => route("competence.edit",2),
    "action" => "create"
])

@section('content')

   <div class="bg-create-competence">
    
    <form action="{{route("competence.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")
       
        <div class="row mt-3 mb-3">
            <div class="offset-3 col-6">
                <img width="300px" height="200px" class="logo-competence"  src="{{asset("logo/img.jpg")}}" alt="">
                <label for="logo" >
                    <a class="ms-5 col-12 btn btn-clr">Ajouter un logo</a>
                </label>
                <input  name="logo" id="logo" type="file" hidden />
            </div>
            <div class=" offset-md-2 col-md-10 text-danger">
                @foreach ($errors->get('logo') as $error)
                    {{"*".$error."*"}}
                @endforeach
            </div>
        </div>

        <div class="row mt-3">
            <div class="offset-2 col-2">
                <label for="nom" class="form-label lbl-clr">Titre <span class="text-danger">*</span> </label>
            </div>
            <div class="col-5">
                <input class="form-control input-form" name="nom" id="nom" type="text" placeholder="Titre" required>
            </div> 
             <div class=" offset-md-2 col-md-10 text-danger">
                @foreach ($errors->get('nom') as $error)
                    {{"*".$error."*"}}
                @endforeach
            </div>
        </div>

        <div class="row mt-3">
            <div class="offset-2 col-2">
                <label for="description" class="form-label lbl-clr">Description <span class="text-danger">*</span> </label>
            </div>
            <div class="col-5">
                <textarea class="form-control input-form" rows="4" name="description" placeholder="Description" required></textarea>  
            </div>
          
        </div>


      
       
   
  
    <div class="row mt-5">
        <div class=" d-flex justify-content-center">
            <button  type="submit" class="col-3 btn btn-clr " >Create Competence</button>
        </div>
    </div>

</form>
</div>
@endsection