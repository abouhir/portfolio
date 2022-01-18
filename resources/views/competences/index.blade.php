@extends('layouts.app')



@section('content')
    
<div class="container">
    <div class="col-md-12">
<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">Logo</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($competences as $item)
            
       
      <tr>
        <td scope="row"><img width="200" height="200"  src="{{asset("storage/competences_logo/".$item->logo)}}" alt="Profile Image" /></td>
        <td>{{$item->nom}}</td>
        <td class="text-start text-wrap col-4"  >{{$item->description}}</td>
        <td>
            <a href="{{route("competence.edit",$item->id)}}" class="btn btn-warning">Update</a>
            <form action="{{route("competence.delete",$item->id)}}" method="post">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger mt-2">delete</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection


