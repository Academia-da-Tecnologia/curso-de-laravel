@extends('admin.painel.layout')

@section('conteudoPainel')

    <div id="page-wrapper">
        <div class="row">
            <h2>Posts Cadastrados ( {{ count($posts) }} )</h2>

            <p class="bg-danger" style="padding: 5px;font-size: 18px;">Atenção, todos os posts listados aqui são os posts que você cadastrou.</p>
            
            <!--Botao para cadastrar post-->
            <a href="{{ URL::to('post/create') }}" class="btn btn-primary">Cadastrar Post</a>
            
            <table class="table table-striped">
                <thead style="background-color: #000;color:#fff;font-size: 18px;">
                    <tr>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Categoria</th>
                        <th>Visitas</th>
                        <th>Alterar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    @if(count($postsUser) > 0)
                        @if($idUser == $post->tb_post_autor)
                        <tr>
                            <td>{{ $post->tb_post_titulo }}</td>
                            <td>{{ $post->tb_user_nome }}</td>
                            <td>{{ $post->tb_categoria_nome }}</td>
                            <td>{{ $post->tb_post_visitas }}</td>
                            <td>
                                <a href="/post/{{ $post->idPost }}/edit" class="btn btn-primary" type="button">
                                    <span class="glyphicon glyphicon-edit"></span> Editar
                                </a>
                            </td>
                            <td>
                            {{ Form::open(['method' => 'delete', 'route' => ['post.destroy', $post->idPost] ]) }}
                                <button type="submit" value="Excluir" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Excluir</button>
                            {{ Form::close() }}
                            </td>
                        </tr>
                        @endif
                    @else
                    <tr><td colspan="6" class="text-center">Nenhum post seu cadastrado</td></tr>    
                    @endif
                @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="6" class="text-center">{{ $links }}</td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>

@stop