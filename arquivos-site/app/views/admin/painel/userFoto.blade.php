@extends('admin.painel.layout')

@section('conteudoPainel')

<div id="page-wrapper">
	<div class="row">
		<h2>Sua foto atual é</h2>
		@if(empty($user->tb_user_foto))
			Sem foto
		@else
			<img src="{{ asset($user->tb_user_foto) }}" width="120" height="90">
		@endif

	<br />
	<br />
		@if(Session::has('mensagem'))
			{{ Session::get('mensagem') }}
		@endif
	<h2>Escolha uma foto abaixo</h2>
	{{ Form::open(['files' => true, 'route' => 'foto.store']) }}
		{{ Form::label('foto') }}
		{{ Form::file('foto') }} {{ $errors->first('foto') }}
		<br />
		{{ Form::submit('Cadastrar Nova Foto',['class' => 'btn btn-primary']) }}
	{{ Form::close() }}

	</div>
</div>


@stop()