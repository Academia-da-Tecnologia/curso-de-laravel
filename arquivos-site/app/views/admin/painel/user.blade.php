@extends('admin.painel.layout')

@section('conteudoPainel')
 <div id="page-wrapper">
	  <div class="row">
	  <h2>Lista dos Administradores</h2>
	  @if( $isAdminGeral )
	  	<a href="{{ URL::to('user/create') }}" class="btn btn-primary">Cadastrar Administrador</a>
	  @endif
	   <a href='{{ URL::to("/user/$idUser/edit") }}' class="btn btn-primary">Alterar Meus Dados</a>
		<table width="100%" class="table table-striped" cellspacing="0" id="tabela-administradores">
			<thead style="background-color: #000;color: #FFF;font-size: 18px;">
				<tr>
					<th>Nome</th>
					<th class="text-center">Alterar</th>
					<th class="text-center">Deletar</th>
					<th class="text-center">Alterar Senha</th>
				</tr>
			</thead>
			<tbody>
			@foreach($administradores as $administrador)
				@if($idUser != $administrador->id)
				<tr>
					<td>{{ $administrador->tb_user_nome }}</td>
					<td class="text-center">
						<a href="/user/{{ $administrador->id }}/edit" class="btn btn-primary btn-lg">
						<span class="glyphicon glyphicon-pencil"></span>
						Editar</a>
					</td>
					<td class="text-center">
						<a href="#" data-id="{{ $administrador->id }}" class="btn btn-danger btn-lg btn-deletar-administrador">
						<span class="glyphicon glyphicon-remove"></span>
						Excluir</a>
					</td>
					<td class="text-center">
						<a href="/password/{{ $administrador->id }}/edit" class="btn btn-warning btn-lg">
						<span class="glyphicon glyphicon-refresh"></span>
						Alterar</a>
					</td>
				</tr>
				@endif
			@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5" class="text-center">{{ $links }}</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
@stop