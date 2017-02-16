@extends('layouts.users')

@section('content')
	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>Nome</th>
	      <th>Email</th>
	      <th>Situação</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($participantes as $participante)
		    <tr>
		      <td>{{ $participante->name }}</td>
		      <td>{{ $participante->email }}</td>
		      <td>
		      	<a href="{{ $participante->pivot->status == 0 ? route('users.reunioes.presenca', ['reuniao_id' => $reuniao->id, 'user_id' => $participante->id]) : '#'}}" class="{{ $participante->pivot->status == 0 ? 'btn btn-warning' : 'btn btn-success' }}">{{ $participante->pivot->status == 0 ? 'Aguardando' : 'Presente' }}</a>
		      </td>
		    </tr>
	    @endforeach
      </tbody>
    </table>
    <div class="form-group col-lg-3 col-lg-offset-9 text-right">
	    <a href="{{route('users.reunioes.encerrar', ['id' => $reuniao->id])}}" class="btn btn-primary">Encerrar reunião</a>
	    </div>
@endsection