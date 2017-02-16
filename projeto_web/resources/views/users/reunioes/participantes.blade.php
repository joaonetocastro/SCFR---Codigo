@extends('layouts.users')

@section('content')
	  {!! Form::open(['route' => 'users.reunioes.participantes.update', 'method' => 'post']) !!}
	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>Participa?</th>
	      <th>Nome</th>
	      <th>Email</th>
	      <th>Profissao</th>
	    </tr>
	  </thead>
	  <tbody>
	  <input type="hidden" value="{{ $reuniao->id }}" name="id">
	  	@foreach($usuarios as $usuario)
		    <tr>
		      <td><input type="checkbox" name="situacoes[{{ $usuario->id }}]" {{in_array($usuario->id, $situacoes) || $usuario->id == $reuniao->user_id ? 'checked' : ''}} {{ $usuario->id == $reuniao->user_id ? 'disabled' : '' }}></td>
		      <td>{{$usuario->name}}</td>
		      <td>{{$usuario->email}}</td>
		      <td>{{$usuario->profissao->nome}}</td>
		    </tr>
	    @endforeach
      </tbody>
    </table>
    <div class="form-group col-lg-3 col-lg-offset-9 text-right">
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </div>
	    {!! Form::close() !!}
@endsection