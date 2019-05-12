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
                <div class="col-md-6 text-left">
                    <a href="<?php echo base_url('admin/produtos/modulo')?>" title="Novo"class="btn btn-success">
                    <i class="fa fa-user-plus"></i> <b>Novo</b></a>   
                </div>
                <div class="col-md-6 text-right">
                    <a href="<?php echo base_url('admin')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
            
            <?php getMsg('msgCadastro'); ?>

            <table class="table table-responsive table-bordered table_listar_data-table">
                <thead>
                    <tr class="text-center">
                        <td>Nome</td>
                        <td>Categoria</td>
                        <td>Fornecedor</td>
                        <td>Valor</td>
                        <td>Estoque</td>
                        <td>Status</td>
                        <td>Opções</td>
                    </tr>

                <tbody>

                    <?php foreach ($produtos as $produto) { ?>
                    <tr class="text-center">
                        <td><?php echo $produto->nome_produto ?></td>
                        <td><?php echo $produto->nome_categoria ?></td>
                        <td><?php echo $produto->nome_marca ?></td>
                        <td><?php echo formataMoedaReal($produto->valor, TRUE) ?></td>
                        <td><?php echo $produto->estoque ?></td>

                        <td><?php echo ($produto->ativo == 1 ? '<span class="label label-success"><i class="fa fa-check"></i></span>' :
                         '<span class="label label-danger"><i class="fa fa-times"></i></span>' )?></td>    

                        <td class="text-right">
                            <a href="<?php echo base_url('admin/produtos/busca/'. $produto->id )?>" 
                            title="Editar cliente" class="btn btn-info"><i class="fa fa-search"></i></a> |
                            <a href="<?php echo base_url('admin/produtos/modulo/'. $produto->id )?>" 
                            title="Editar cliente" class="btn btn-warning"><i class="fa fa-pencil"></i></a> |
                            <a href="<?php echo base_url('admin/produtos/del/'. $produto->id )?>" 
                            title="Deletar cliente" class="btn btn-danger btn-apagar-cliente"><i class="fa fa-trash-o"></i></a>
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