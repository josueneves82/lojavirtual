$(document).ready(function () {

        // upload de foto
        $("#upload_fotos").uploadFile({
                url:"http://localhost:8080/admin/produtos/upload",
                fileName:"foto_produto",
                returnType:'json',
                onSuccess:function(files,data,xhr,pd){
                        $('.ajax-file-upload-statusbar').hide();
                        if (data.erro == 0) {
                                $('.retorno_foto_produto').append('<div class="col-sm-3 img_foto_view"><img src="http://localhost:8080/../upload/foto_produtos/'+ data.file_name +'"><input type="hidden" value="'+ data.file_name +'" name="foto_produto[]"><a href="#" class="btn btn-danger btn-apagar-foto-produto"><i class="fa fa-trash-o"></i> Apagar</a></div>');
                        }
                        else{
                                alert(data.msg);
                        }
                },
                onError: function(files,status,errMsg,pd){
                        alert(files +'<br>'+errMsg);
                }

        });
        //  confirmar antes de apagar
        $(document).on('click', '.btn-apagar-foto-produto', function(){
                if (confirm("Deseja deletar este foto")) {
                        $(this).parent().remove();
                }
                else {
                        return false;
                }
        });

        //alerta delete cliente
        $('.btn-apagar-cliente').on('click', function () {

                if (confirm("Deseja deletar este cliente")) {
                        return true;
                }
                else {
                        return false;
                }
        })
        //alerta delete cliente
        $('.btn-apagar-usuario').on('click', function () {

                if (confirm("Deseja deletar este usuario")) {
                        return true;
                }
                else {
                        return false;
                }
        })
        /** jquery mask */
        $('.input_date').mask('00/00/0000');
        $('.input_cep').mask('00000-000');
        $('.input_cpf').mask('000.000.000-00', { reverse: true });
        $('.input_cnpj').mask('00.000.000/0000-00', { reverse: true });
        // mascara fone 9 dig
        var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
                spOptions = {
                        onKeyPress: function (val, e, field, options) {
                                field.mask(SPMaskBehavior.apply({}, arguments), options);
                        }
                };

        $('.input_telefone').mask(SPMaskBehavior, spOptions);


        $('.table_listar_data-table').DataTable({
                language: {

                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ Resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Buscar",
                        "oPaginate": {
                                "sNext": "Próximo",
                                "sPrevious": "Anterior",
                                "sFirst": "Primeiro",
                                "sLast": "Último"
                        },
                        "oAria": {
                                "sSortAscending": ": Ordenar colunas de forma ascendente",
                                "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                }

        });

        $('.sidebar-menu').tree()
});
