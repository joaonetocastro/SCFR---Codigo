@extends('layouts.users')

@section('content')
	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>Nome</th>
	      <th>Local</th>
	      <th>Data</th>
	      <th>Hora</th>
	      <th>Situação</th>
	      <th>Ações</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($reunioes as $reuniao)
		    <tr>
		      <td>{{$reuniao->nome}}</td>
		      <td>{{$reuniao->local}}</td>
		      <td>{{$reuniao->data}}</td>
		      <td>{{$reuniao->hora}}</td>
		      <td>{{$reuniao->status == 1 ? 'Finalizada' : ($reuniao->status == 0 ? 'Agendada' : 'Em andamento')}}</td>
		      <td>
		      	@if($reuniao->status != 1)
		      		<a href="{{ route('users.reunioes.iniciar', ['id' => $reuniao->id]) }}"><i class="fa fa-play fa-lg"></i></a>
		      	@endif
		      	@if($reuniao->status == 0)
		      		<a href="{{ route('users.reunioes.participantes', ['id' => $reuniao->id]) }}"><i class="fa fa-address-book-o fa-lg"></i></a>
		      	@endif
		      	<a href="{{ route('users.reunioes.delete', ['id' => $reuniao->id]) }}"><i class="fa fa-remove fa-lg"></i></a>
		      </td>
		    </tr>
	    @endforeach
      </tbody>
    </table>
@endsection