@extends('layouts.admin')

@section('content')
	{!! Form::open(['route' => 'admin.users.save', 'method' => 'post']) !!}
  <div class="form-group col-lg-7">
    {!! Form::label('name', 'Nome:', ['class' => 'control-label']) !!}     
    {!! Form::text('name', null, ['class' => 'form-control ']) !!}
  </div>
  <div class="form-group col-lg-5">
    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}     
    {!! Form::text('email', null, ['class' => 'form-control ']) !!}
  </div>
  <div class="form-group col-lg-6">
    {!! Form::label('sexo', 'Sexo:', ['class' => 'control-label']) !!}     
    {!! Form::select('sexo', ['Masculino' => 'Masculino', 'Feminino' => 'Feminino'], null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group col-lg-6">
    {!! Form::label('profissao', 'Profissão:', ['class' => 'control-label']) !!}     
    {!! Form::select('profissao_id', $profissoes, null, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group col-lg-6">
    {!! Form::label('role_id', 'Categoria:', ['class' => 'control-label']) !!}     
    {!! Form::select('role_id', [1 => "Administrador", 2 => "Usuário	"], null, ['class' => 'form-control ', 'placeholder' ]) !!}
  </div>
  <div class="form-group col-lg-6">
    {!! Form::label('password', 'Senha:', ['class' => 'control-label']) !!}     
    {!! Form::password('password', ['class' => 'form-control ', 'placeholder' => 'Deixe em branco caso não queira alterar']) !!}
  </div>
  <div class="form-group col-lg-3 col-lg-offset-9 text-right">
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </div>
  {!! Form::close() !!}
@endsection