@extends('layouts.users')

@section('content')
	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>#ID</th>
	      <th>Nome</th>
	      <th>Usuário</th>
	      <th>Local</th>
	      <th>Data</th>
	      <th>Hora</th>
	      <th>Ações</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($reunioes as $reuniao)
		    <tr>
		      <td>{{$reuniao->id}}</td>
		      <td>{{$reuniao->nome}}</td>
		      <td>{{$reuniao->user_id}}</td>
		      <td>{{$reuniao->local}}</td>
		      <td>{{$reuniao->data}}</td>
		      <td>{{$reuniao->hora}}</td>
		      <td>
		      	<a href="{{ route('users.reunioes.participantes', ['id' => $reuniao->id]) }}"><i class="fa fa-address-book-o fa-lg"></i></a>
		      	<a href="{{ route('users.reunioes.delete', ['id' => $reuniao->id]) }}"><i class="fa fa-remove fa-lg"></i></a>
		      </td>
		    </tr>
	    @endforeach
      </tbody>
    </table>
@endsection