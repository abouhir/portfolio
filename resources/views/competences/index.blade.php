@extends('layouts.left-menu',
[
  "page_name" =>"Competences" , 
  "route_create" => route("competence.create"),
  "route_show" => route("competence.index"),
  "route_update" => route("competence.edit",2),
  "action" => "show"
]
)

@section('content')
    @if (count($competences)>0)
  
    <div class="bg-show-competence">
      
    </div>
   
    @endif
@endsection

