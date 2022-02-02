@extends('layouts.left-menu',
[
    "page_name" =>"Formations" , 
    "route_create" => route("formation.create"),
    "route_show" => route("formation.index"),
    "route_update" => route("formation.index"),
    "action" => "show"
])



@section('content')

@if (count($formations)>0)
    
<div class="bg-show-formations ">
@foreach ($formations as $formation)
<div class="offset-2 col-8 mt-4 ">
  <div class="row">
  <div class="col-12">
    <span class="titre-show-formation">{{$formation->titre}}</span>
    <span class="ms-2">
      <a href="{{route("formation.edit",$formation->id)}}" class="btn btn-outline-warning">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="23" height="23" x="0" y="0" viewBox="0 0 477.867 477.867" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
<g xmlns="http://www.w3.org/2000/svg">
<g>
 <path d="M409.6,0c-9.426,0-17.067,7.641-17.067,17.067v62.344C304.667-5.656,164.478-3.386,79.411,84.479    c-40.09,41.409-62.455,96.818-62.344,154.454c0,9.426,7.641,17.067,17.067,17.067S51.2,248.359,51.2,238.933    c0.021-103.682,84.088-187.717,187.771-187.696c52.657,0.01,102.888,22.135,138.442,60.976l-75.605,25.207    c-8.954,2.979-13.799,12.652-10.82,21.606s12.652,13.799,21.606,10.82l102.4-34.133c6.99-2.328,11.697-8.88,11.674-16.247v-102.4    C426.667,7.641,419.026,0,409.6,0z" fill="#FFD700" data-original="#000000" class="btn-update-delete"></path>
</g>
</g>
<g xmlns="http://www.w3.org/2000/svg">
<g>
 <path d="M443.733,221.867c-9.426,0-17.067,7.641-17.067,17.067c-0.021,103.682-84.088,187.717-187.771,187.696    c-52.657-0.01-102.888-22.135-138.442-60.976l75.605-25.207c8.954-2.979,13.799-12.652,10.82-21.606    c-2.979-8.954-12.652-13.799-21.606-10.82l-102.4,34.133c-6.99,2.328-11.697,8.88-11.674,16.247v102.4    c0,9.426,7.641,17.067,17.067,17.067s17.067-7.641,17.067-17.067v-62.345c87.866,85.067,228.056,82.798,313.122-5.068    c40.09-41.409,62.455-96.818,62.344-154.454C460.8,229.508,453.159,221.867,443.733,221.867z" fill="#FFD700" data-original="#000000" class="btn-update-delete"></path>
</g>
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
</g></svg>
       </a>
    </span>
    <span class="ps-2">
      <form action="{{route("formation.delete",$formation->id)}}" method="post" style="display : inline">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-outline-danger "><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="23" height="23" x="0" y="0" viewBox="0 0 427 427.00131" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" fill="#ff0000" data-original="#000000" class="btn-update-delete"></path><path xmlns="http://www.w3.org/2000/svg" d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" fill="#ff0000" data-original="#000000" class="btn-update-delete"></path><path xmlns="http://www.w3.org/2000/svg" d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0" fill="#ff0000" data-original="#000000" class="btn-update-delete"></path><path xmlns="http://www.w3.org/2000/svg" d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" fill="#ff0000" data-original="#000000" class="btn-update-delete"></path></g></svg></button>
    </form>
    </span>

  
  </div>
</div>
<div class="row">
  <div class="col-12">
   <span class="date-lieu-formation"> {{$formation->annee}}   {{$formation->lieu}}</span>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <span class="description-show-formation">{{$formation->description}}</span>
  </div>
</div>
</div>
@endforeach
@else
  <h1>Makayn walo</h1>

@endif

</div>













 
@endsection



