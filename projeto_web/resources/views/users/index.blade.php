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
		    </tr>
	    @endforeach
      </tbody>
    </table>
@endsection