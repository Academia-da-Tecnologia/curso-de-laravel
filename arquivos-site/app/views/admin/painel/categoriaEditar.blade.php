@extends('admin.painel.layout')

@section('conteudoPainel')
   
    <div id="page-wrapper">
    
        <div class="row">

          <!-- Formulario para alterar post -->
          <h2>Alterar Categoria {{ $categoria->tb_categoria_nome }}</h2>
          
             <!--Mostrar mensagem se cadastrou ou nao-->
            @if(Session::has('mensagem'))
                {{ Session::get('mensagem') }}
            @endif

            {{ Form::open( ['role' => 'form','method' => 'PUT', 'route' => [ 'categoria.update', $categoria->id ] ] ) }}
              
            {{ Form::label('Nome:') }}
            {{ Form::text('categoria',$categoria->tb_categoria_nome,['class' => 'form-control']) }} {{ $errors->first('categoria') }}
            <br />
            {{ Form::submit('Alterar', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}

        </div>
   </div>

@stop