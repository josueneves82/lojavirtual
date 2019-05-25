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
                    <a href="<?php echo base_url('admin/categorias/modulo')?>" title="Novo"class="btn btn-success">
                    <i class="fa fa-user-plus"></i> <b>Novo</b></a>   
                </div>
                <div class="col-md-6 text-right">
                    <a href="<?php echo base_url('admin')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
            
            <?php getMsg('msgCadastro'); ?>

            <table class="table table-responsive table-bordered table_listar_data-tables">
                <thead>
                    <tr class="text-center">
                        <td>CATEGORIAS</td>
                        <td>Status</td>
                        <td>Opções</td>
                    </tr>

                <tbody>

                    <?php foreach ($Categorias as $row) { ?>
                    <tr>
                        <td><?php echo $row->nome_categoria ?></td>
                        <td class="text-center"><?php echo ($row->ativo_categoria == 1 ? '<span class="label label-success"><i class="fa fa-check"></i></span>' :
                         '<span class="label label-danger"><i class="fa fa-times"></i></span>' )?></td>    

                        <td class="text-right">
                            <a href="<?php echo base_url('admin/categorias/busca/'. $row->id_categoria )?>" 
                            title="Editar categoria" class="btn btn-info"><i class="fa fa-search"></i></a> |
                            <a href="<?php echo base_url('admin/categorias/modulo/'. $row->id_categoria )?>" 
                            title="Editar categoria" class="btn btn-warning"><i class="fa fa-pencil"></i></a> |
                            <a href="<?php echo base_url('admin/categorias/del/'. $row->id_categoria )?>" 
                            title="Deletar categoria" class="btn btn-danger btn-apagar-cliente"><i class="fa fa-trash-o"></i></a>
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