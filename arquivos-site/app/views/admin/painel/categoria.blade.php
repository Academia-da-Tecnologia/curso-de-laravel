@extends('admin.painel.layout')

@section('conteudoPainel')
<div id="page-wrapper">
    <div class="row">

        <h2>Categorias Cadastrados ( {{ count($categorias) }} )</h2>
        <div>
            <p class="bg-danger" style="padding: 5px;font-size: 18px;">
                <span class="glyphicon glyphicon-asterisk"></span>
                Tome cuidado ao deletar uma categoria, fazendo isso você também estará
                deletando o post relacionado a essa categoria.
            </p>
        </div>
    
        <a href="{{ URL::to('categoria/create') }}" class="btn btn-primary">Cadastrar nova categoria</a>
        <table class="table table-striped table-bordered table-hover" id="tabela-administradores" cellspacing="0">
            <thead style="background-color: #000;color:#fff;font-size: 18px;">
                <tr>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Excluir</th>
                </tr>
            </thead>
            <tbody>
              @foreach($categorias as $categoria)
                  <tr>
                      <td class="text-center">{{ $categoria->tb_categoria_nome }}</td>
                      <td class="text-center">
                           <a href="/categoria/{{ $categoria->id }}/edit" type="button" class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"> </span> Editar
                        </a>
                      </td>
                      <td class="text-center">
                          {{ Form::open(['method' => 'DELETE','route' => ['categoria.destroy', $categoria->id] ]) }}
                            <button type="submit" value="Excluir" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> Excluir
                            </button>
                          {{ Form::close() }}
                      </td>
                  </tr>  
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
