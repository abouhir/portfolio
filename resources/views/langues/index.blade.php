@extends('layouts.app')



@section('content')
    
<div class="container">
    <div class="col-md-12">
<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">Langue </th>
        <th scope="col">Niveau</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($langues as $item)
            
       
      <tr>
        <td scope="row">{{$item->nom}}</td>
        
        <td class="text-start text-wrap col-4"  >{{$item->niveau}}</td>
        <td>
            <a href="{{route("langue.edit",$item->id)}}" class="btn btn-warning">Update</a>
            <form action="{{route("langue.delete",$item->id)}}" method="post">
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



