@extends('admin.painel.layout')

@section('conteudoPainel')
        <div id="page-wrapper">
            <div class="row">
            <h2>Dados dos Posts Cadastrados</h2>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados dos Posts cadastrados até o momento
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="postsTable">
                                    <thead>
                                        <tr>
                                            <th>Post Título</th>
                                            <th>Visitas</th>
                                            <th>Autor</th>
                                            <th>Editar</th>
                                            <th>Deletar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listaPosts">
                                    @foreach( $posts as $post )
                                        <tr class="odd gradeX">
                                            <td>{{ $post->tb_post_titulo }}</td>
                                            <td class="text-center">{{ $post->tb_post_visitas }}</td>
                                            <td>{{ $post->tb_user_nome}}</td>
                                            <td class="text-center">
                                                <button data-id="{{ $post-> idPost}}" class="btn btn-warning btn-sml btn-editar-post" >Editar</button>
                                            </td>
                                            <td class="text-center">
                                                <button data-id="{{ $post-> idPost}}" class="btn btn-danger btn-sml btn-deletar-post" >Deletar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

                <div id="modal-salvar">
                    <div class="modal fade" id="modalEditarPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                                <h4 class="modal-title" id="myModalLabel">Alterar dados do Post</h4>
                              </div>
                              <div class="modal-body">
                                {{ Form::open(['id' => 'formEditarPost']) }}
                    <br />            
                                {{ Form::label('Titulo') }}
                                {{ Form::text('titulo',null,['class' => 'form-control','id' => 'tituloTxt']) }}
                    <br />
                                {{ Form::label('Tags') }}
                                {{ Form::text('tags',null,['class' => 'form-control','id' => 'tagsTxt']) }}
                    <br />
                                {{ Form::label('Categorias') }}
                                    <select name="categoria" id="categoriasTxt" class="form-control">
                                        
                                    </select><br />

                                {{ Form::label('Slug') }}
                                {{ Form::text('slug',null,['class' => 'form-control','id' => 'slugTxt']) }}
                    <br />
                                {{ Form::hidden('visitas',null,['id' => 'visitasTxt']) }}
                                {{ Form::hidden('idPost',null,['id' => 'idPost']) }}
                                {{ Form::label('Post') }}
                                {{ Form::textarea('mensagem',null,['class' => 'form-control','id' => 'postTxt']) }}
                    <br />
                                {{ Form::close() }}
                                <br />
                                <div id="status-update"></div>
                              </div>
                              <div class="modal-footer">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="button" id="btn-login-user" class="btn btn-primary btn-salvar-post">Salvar</button>
                              </div>
                            </div>
                          </div>
                          </div>   
                    </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

@stop