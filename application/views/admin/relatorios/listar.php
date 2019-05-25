<section class="content-header">
    <h1><?php echo $titulo;?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-home"></i> Principal</a></li>
        <li class="active"><?php echo $titulo ?></li>
    </ol>
</section>

<!-- Main conteudo -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <div class="row margin-botton-20 margin-top-10">
                <div class="col-md-12 text-right">
                    <a href="<?php echo base_url('admin')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
            
            <?php getMsg('msgCadastro'); ?>

            <?php 
           /* echo '<pre>';
                print_r($relatorios);*/                
            ?> 
        <table class="table table-responsive table-bordered table_listar_data-table">
                <thead>
                    <tr class="text-center">
                        <td class="col-sm-1">ID pedido</td>
                        <td class="col-sm-1">Cod. produto</td>
                        <td class="col-sm-2">Nome produto</td>
                        <td class="col-sm-1">Qtd. produto</td>
                        <td class="col-sm-1">Valor total</td>
                        <td class="col-sm-1">Data pedido</td>
                        <td class="col-sm-2">CPF</td>
                        <td>Nome cliente</td>
                        <td>Opções</td>
                    </tr>

                <tbody>

                    <?php foreach ($relatorios as $row) { ?>
                    <tr class="text-center">
                        <td><?php echo $row->id_ped ?></td>
                        <td><?php echo $row->cod_produto ?></td>
                        <td><?php echo $row->nome_produto ?></td>
                        <td><?php echo $row->qtd_produto ?></td>
                        <td class="text-center col-sm-2"><?php echo formataMoedaReal($row->valor_produto, true) ?></td>
                        <td><?php echo formatDataView($row->data_pedido) ?></td>
                        <td><?php echo $row->cpf_cliente ?></td>
                        <td class="text-center col-sm-2"><?php echo $row->nome_cliente ?></td>


                        <td class="text-center">
                            <a href="<?php echo base_url('admin/relatorios/busca/'. $row->id_ped )?>" 
                            title="Editar cliente" class="btn btn-info"><i class="fa fa-search"></i></a> 
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>

                </thead >
            </table>
           
        </div>
    </div>
<!-- /.box -->

</section>