@extends('admin.painel.layout')

@section('conteudoPainel')
<div id="page-wrapper">
    <div class="row">

        <h2>Autores Cadastrados ( {{ count($autores) }} )</h2>
        <div>
            <p class="bg-danger" style="padding: 5px;font-size: 18px;">
                <span class="glyphicon glyphicon-asterisk"></span>Tome cuidado ao deletar um autor, fazendo isso você também estará
                deletando todos os posts e comentarios do post desse autor.
            </p>
        </div>
        @if( $isAdminGeral )
            <a href="{{ URL::to('/autor/create') }}" class="btn btn-primary">Cadastrar Novo Autor</a>
        @endif
        <a href='{{ URL::to("/autor/$idUser/edit") }}' class="btn btn-primary">Alterar Meus Dados</a>
        <table class="table table-striped table-bordered table-hover" id="tabela-administradores" cellspacing="0">
            <thead style="background-color: #000;color:#fff;font-size: 18px;">
                <tr>
                    <th class="text-center">Autor</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($autores as $autor)
                    @if( $idUser != $autor->id )
                   <tr>
                     <td class="text-center">{{ $autor->tb_user_nome }}</td>    
                     <td class="text-center">
                        <a href="/autor/{{ $autor->id }}/edit" type="button" class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"> </span>Editar
                        </a>
                     </td>
                     <td class="text-center">
                         {{ Form::open([ 'method' => 'DELETE', 'route' => [ 'autor.destroy',$autor->id ] ]) }}                                
                        <button type="submit" value="Excluir" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Excluir</button>
                         {{ Form::close() }}
                     </td>
                   </tr>  
                   @endif   
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" align="center">{{ $links }}</td>
                </tr>
            </tfoot>
        </table>
   

    </div>
</div>
<!-- /#page-wrapper -->

@stop
