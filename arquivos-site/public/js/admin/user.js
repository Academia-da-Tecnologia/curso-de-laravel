$(document).ready(function(){

	var wrapper = $("#wrapper");
	var row = wrapper.find(".row");
	var tabela_administradores = row.find("#tabela-administradores");

	tabela_administradores.on('click', '.btn-deletar-administrador', function(event){

		var id = $(this).attr('data-id');
		var linha = event.currentTarget;


		$.ajax({
			url: '/user/destroy/'+id,
			type: 'DELETE',
			beforeSend: function(){
				$(linha).closest('td').append('<br />Excluindo...');
			},

			success: function(data){
				var tr = $(linha).closest('tr');
				if(data == 'excluido'){
					$(tr).attr('class', 'deletado');

					setTimeout(function(){
						$(tr).fadeOut('slow');
					},1000);

					setTimeout(function(){
						window.location.href = '/logoutAdmin';
					},2000);

				}	
			}
		});

	});


});