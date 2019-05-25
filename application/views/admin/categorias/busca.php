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
                    <a href="<?php echo base_url('admin/categorias')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
            
            <?php getMsg('msgCadastro'); ?>

            <table class="table table-responsive table-condensed margin-botton-20 ">
                <thead>
                    <tr class="text-left h2">
                        <td class=" col-md-3">Descrição da categorias</td>
                        <td></td>

                    </tr>

                <tbody>
                    <tr>
                        <td class="text-justify h5"><b>Nome:</b></td>
                        <td><?php echo $dados->nome_categoria ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Ativo:</b></td>
                        <td><?php echo ($dados->ativo_categoria == 1 ? '<span class="label label-success"><i class="fa fa-check"></i></span>' :
                             '<span class="label label-danger"><i class="fa fa-times"></i></span>' )?></td>
                    </tr>
                </tbody>
                </thead >
            </table>
            <div class="row margin-botton-20">
                <div class="col-md-12 text-right">
                    <a href="<?php echo base_url('admin/categorias')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
                
        </div>
    </div>
<!-- /.box -->

</section>