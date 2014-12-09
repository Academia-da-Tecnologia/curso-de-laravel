@extends('site.layout')

@section('conteudo')
  
    <h2>Foto Atual: </h2> 

    @if( !empty($user->tb_user_foto) )
        {{ HTML::image( $user->tb_user_foto, null ,['width' => 120, 'height' =>100 ] ) }}
    @else

    @endif;

    <br>
    <br>
    <h2>Alterar a foto</h2>
    <p class="text-danger" style="font-size: 18px;">Para alterar a foto, escolha uma foto e clique em alterar.</p>

     @if(Session::has('mensagem'))
        {{ Session::get('mensagem') }}
    @endif
    
    {{ Form::open(['files' => true,'method' => 'PUT' , 'route' => [ 'userFoto.update',$user->id ]]) }}
    {{ Form::label('Foto: ') }}
    {{ Form::file('foto') }}
    {{ $errors->first( 'foto' ) }}
    <br>
    {{ Form::submit('Alterar', ['class' => 'btn btn-warning']) }}

    {{ Form::close() }}

@stop