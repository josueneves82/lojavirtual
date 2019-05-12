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
                    <a href="<?php echo base_url('admin/marcas/modulo')?>" title="Novo"class="btn btn-success">
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
                        <td>E-mail</td>
                        <td>Contato</td>
                        <td>Status</td>
                        <td >Opções</td>
                    </tr>
                <tbody>

                <?php foreach ($marcas as $row) { ?>
                        <tr>
                            <td><?php echo $row->nome_marca ?></td>
                            <td><?php echo $row->email ?></td>
                            <td><?php echo $row->contato ?></td>
    
                            <td class="text-center"><?php echo ($row->ativo == 1 ? '<span class="label label-success"><i class="fa fa-check"></i></span>' :
                             '<span class="label label-danger"><i class="fa fa-times"></i></span>' )?></td>    
    
                            <td class="text-right">
                                <a href="<?php echo base_url('admin/marcas/busca/'. $row->id )?>" 
                                    title="Editar cliente" class="btn btn-info"><i class="fa fa-search"></i></a> |
                                <a href="<?php echo base_url('admin/marcas/modulo/'. $row->id )?>" 
                                    title="Editar cliente" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></a> |
                                <a href="<?php echo base_url('admin/marcas/del/'. $row->id )?>" 
                                    title="Deletar cliente" class="btn btn-danger btn-apagar-cliente"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    
                </tbody class="margin-botton-20">

                </thead >
            </table>
        </div>
    </div>
<!-- /.box -->

</section>