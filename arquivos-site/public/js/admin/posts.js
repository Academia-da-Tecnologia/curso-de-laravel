$(document).ready(function(){

    var wrapper = $("#wrapper");
    var row = wrapper.find(".row");
    var table_posts = row.find('#postsTable');
    var tbody_lista_posts = table_posts.find('#listaPosts');
    var modalEditarPost = row.find('#modalEditarPost');
    var modal_body = modalEditarPost.find('.modal-body');
    var tituloTxt = modal_body.find("#tituloTxt");
    var tagsTxt = modal_body.find("#tagsTxt");
    var categoriasTxt = modal_body.find("#categoriasTxt");
    var slugTxt = modal_body.find("#slugTxt");
    var visitasTxt = modal_body.find("#visitasTxt");
    var idPost = modal_body.find("#idPost");
    var mensagemTxt = modal_body.find("#mensagemTxt");
    var modal_salvar = wrapper.find("#modal-salvar");
    var formEditarPost = modal_salvar.find("#formEditarPost");
    var status_update = modal_salvar.find("#status-update");

    tbody_lista_posts.on('click', '.btn-editar-post', function(){
        
        var id = $(this).attr('data-id');

        $.ajax({
            url: '/postJquery/'+id+'/edit',
            type: 'GET',
            dataType: 'json',
            success: function( data ){

                var countcategorias = data['categorias'].length;
                var select = '';
                var post_categoria = data['post'].tb_post_categoria;

                tituloTxt.val( data['post'].tb_post_titulo );
                tagsTxt.val( data['post'].tb_post_tags );
                slugTxt.val( data['post'].tb_post_slug );
                visitasTxt.val( data['post'].tb_post_visitas );
                idPost.val( data['post'].id );
                tinyMCE.activeEditor.setContent(data['post'].tb_post_mensagem, {format : 'raw'});

                for( var i= 0; i< countcategorias; i++ ){
                    var id_categoria = data['categorias'][i].id;
                    var selected = ( id_categoria == post_categoria ) ? 'selected="selected"' : '';

                    select+='<option value="'+id_categoria+'" '+selected+'>'+data['categorias'][i].tb_categoria_nome+'</option>';
                }

                categoriasTxt.html('');
                categoriasTxt.append( select );

                modalEditarPost.modal({
                    show: 'true'
                });


            },
            error: function( jhq, error ){
                console.log( jhq.responseText );
            }
        });

    });

tbody_lista_posts.on('click', '.btn-deletar-post', function(){

    if( confirm( 'Deseja realmente deletar esse post ?' ) ){

        var id = $(this).attr('data-id');

        $.ajax({
            url:'/deletarPost/'+id,
            type: 'DELETE',
            success: function( data ){
                
                console.log(data);
                
                if( data == 'deletou' ){
                    //location.reload();  
                }

            },
            error: function( jhq, error ){
                    console.log( jhq.responseText );
            }
        });
    }

 

});


    modal_salvar.on('click', '.btn-salvar-post', function(){

        var tituloTxt = modal_body.find("#tituloTxt");
        var tagsTxt = modal_body.find("#tagsTxt");
        var categoriasTxt = modal_body.find("#categoriasTxt");
        var slugTxt = modal_body.find("#slugTxt");
        var postTxt = tinyMCE.get('postTxt').getContent({format : 'raw'});

        $.ajax({
            url: '/postUpdate',
            type:'PUT',
            data: formEditarPost.serialize()+'&post='+postTxt,
            beforeSend: function(){
                $(status_update).html( 'Salvando dados, aguarde !!!' );
            },
            success: function( data ){
        
                if( tituloTxt.val().length == 0 ){
                    alert( 'O titulo não pode ficar em branco' );
                }else if( tagsTxt.val().length == 0 ){
                    alert( 'O tag não pode ficar em branco' );
                }else{

                    if( data == 'atualizado' ){
                        $(status_update).html('Atualizado com sucesso !!!');

                          setTimeout(function(){
                            $('#modalEditarPost').modal('hide');   
                            location.reload();  
                        },2000);

                    }else if( data == 'natualizado' ){
                        $(status_update).html('Ocorreu um erro ao alterar os dados, certifique-se que alterou os dados corretamente, se o erro persistir entre em contato com o administrador do sistema !!!');
                    }
                    

                }
            }
        });


    });

});