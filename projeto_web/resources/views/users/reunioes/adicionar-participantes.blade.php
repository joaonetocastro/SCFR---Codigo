@extends('layouts.users')

@section('content')
	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>Nome</th>
	      <th>Email</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($participantes as $participante)
		    <tr>
		      <td>{{$participante->nome}}</td>
		      <td>{{$participante->email}}</td>
		    </tr>
	    @endforeach
      </tbody>
    </table>
@endsection