@extends('layouts.users')

@section('content')
	{!! Form::open(['route' => 'users.reunioes.save', 'method' => 'post']) !!}
    {!! Form::hidden('user_id', $user_id, ['class' => 'control-label']) !!}     
  <div class="form-group col-lg-7">
    {!! Form::label('nome', 'Nome:', ['class' => 'control-label']) !!}     
    {!! Form::text('nome', null, ['class' => 'form-control ']) !!}
  </div>
  <div class="form-group col-lg-5">
    {!! Form::label('local', 'Local:', ['class' => 'control-label']) !!}     
    {!! Form::text('local', null, ['class' => 'form-control ']) !!}
  </div>
  <div class="form-group col-lg-6">
    {!! Form::label('data', 'Data:', ['class' => 'control-label']) !!}     
    {!! Form::text('data', null, ['class' => 'form-control ']) !!}
  </div>
  <div class="form-group col-lg-6">
    {!! Form::label('hora', 'Hora:', ['class' => 'control-label']) !!}     
    {!! Form::text('hora', null, ['class' => 'form-control ']) !!}
  </div>
  <div class="form-group col-lg-3 col-lg-offset-9 text-right">
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </div>
  {!! Form::close() !!}
@endsection