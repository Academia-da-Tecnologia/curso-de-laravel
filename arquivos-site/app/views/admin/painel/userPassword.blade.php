@extends('admin.painel.layout')

@section('conteudoPainel')
   
<div id="page-wrapper">
    
    <div class="row">
		<h2>Alterar Senha</h2>
		
		    @if(Session::has('mensagem'))
                {{ Session::get('mensagem') }}
            @endif     	
			<br />

		{{ Form::open(['role' => 'form', 'method' => 'PUT', 'route' => ['password.update',$idUser] ]) }}
		
		{{ Form::label('Senha Atual') }}
		{{ Form::text('atual', Input::old('atual'), ['class' => 'form-control']) }} {{ $errors->first('atual') }}	
		<br />
		{{ Form::label('Nova Senha') }}
		{{ Form::text('nova', Input::old('nova'), ['class' => 'form-control']) }} {{ $errors->first('nova') }}	
		<br />
		{{ Form::label('Senha Atual') }}
		{{ Form::text('novamente', Input::old('novamente'), ['class' => 'form-control']) }} {{ $errors->first('novamente') }}	
		<br />
		{{ Form::submit('Alterar', ['class' => 'btn btn-primary']) }}
		{{ Form::close() }}	
    </div>
</div>

@stop