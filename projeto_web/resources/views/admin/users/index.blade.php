@extends('layouts.admin')

@section('content')
	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>#ID</th>
	      <th>Nome</th>
	      <th>Email</th>
	      <th>Sexo</th>
	      <th>Categoria</th>
	      <th>Situação</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($users as $user)
		    <tr>
		      <td>{{$user->id}}</td>
		      <td>{{$user->name}}</td>
		      <td>{{$user->email}}</td>
		      <td>{{$user->sexo}}</td>
		      <td>{{$user->role_id == 1 ? "Administrador" : "Usuário"}}</td>
		      <td><a href="{{ route('admin.users.switch', ['id' => $user->id]) }}"><i class="{{ $user->situacao == 1 ? 'fa fa-eye' : 'fa fa-eye-slash icon-desativado'}}"></i></a></td>
		    </tr>
	    @endforeach
      </tbody>
    </table>
@endsection