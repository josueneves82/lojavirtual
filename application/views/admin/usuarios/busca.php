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
                    <a href="<?php echo base_url('admin/usuarios')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
            
            <?php getMsg('msgCadastro'); ?>

            <table class="table table-responsive table-condensed margin-botton-20 ">
                <thead>
                    <tr class="text-left h2">
                        <td class=" col-md-3">Descrição do cliente</td>
                        <td></td>

                    </tr>

                <tbody>
                    <tr>
                        <td class="text-justify h5"><b>Nome:</b></td>
                        <td><?php echo $dados->username ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>E-mail:</b></td>
                        <td><?php echo $dados->email ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Telefone:</b></td>
                        <td><?php echo $dados->phone ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Ativo:</b></td>
                        <td><?php echo ($dados->active == 1 ? '<span class="label label-success"><i class="fa fa-check"></i></span>' :
                             '<span class="label label-danger"><i class="fa fa-times"></i></span>' )?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Data Nacimento:</b></td>
                        <td><?php echo formatDataView($dados->data_nascimento) ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Data cadastro:</b></td>
                        <td><?php echo formatDataView($dados->data_cadastro) ?></td>
                    </tr>
                </tbody>
                </thead >
            </table>
        </div>
    </div>
<!-- /.box -->

</section>