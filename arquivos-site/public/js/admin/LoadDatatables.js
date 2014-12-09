 $(document).ready(function() {
        $('#postsTable').dataTable({
            "language": {
            "sProcessing":    "Processando...",
            "sLengthMenu":    "Mostrar _MENU_ registros",
            "sZeroRecords":   "Nenhum resultado encontrado",
            "sEmptyTable":    "Nenhum dado disponível na tabela",
            "sInfo":          "Mostrando registros de _START_ até _END_ de um total de _TOTAL_ registros",
            "sInfoEmpty":     "Mostrando registros de 0 até 0 de um total de 0 registros",
            "sInfoFiltered":  "(filtrado de um total de _MAX_ registros)",
            "sInfoPostFix":   "",
            "sSearch":        "Buscar Post: ",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Carregando...",
            "oPaginate": {
                "sFirst":    "Primeiro",
                "sLast":    "Último",
                "sNext":    "Próximo",
                "sPrevious": "Anterior"
                }
            }
        });
    });