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
                    <a href="<?php echo base_url('admin/clientes')?>" title="Novo"class="btn btn-primary">
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
                        <td><?php echo $dados->nome_cliente ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>E-mail:</b></td>
                        <td><?php echo $dados->email_cliente ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Telefone:</b></td>
                        <td><?php echo $dados->telefone_cliente ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>CPF:</b></td>
                        <td><?php echo $dados->cpf_cliente ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Data Nacimento:</b></td>
                        <td><?php echo formatDataView($dados->data_nascimento) ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>CEP:</b></td>
                        <td><?php echo $dados->cep_cliente ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Endereço:</b></td>
                        <td><?php echo $dados->end_cliente ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Numero:</b></td>
                        <td><?php echo $dados->num_cliente ?></td>
                    </tr>
                    <tr>
                    <tr>
                        <td class="text-justify h5"><b>Complemento:</b></td>
                        <td><?php echo $dados->compl_cliente ?></td>
                    </tr>
                        <td class="text-justify h5"><b>Bairro:</b></td>
                        <td><?php echo $dados->bairro_cliente ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Cidade:</b></td>
                        <td><?php echo $dados->cidade_cliente ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Estado:</b></td>
                        <td><?php echo $dados->estado_cliente ?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Ativo:</b></td>
                        <td><?php echo ($dados->ativo_cliente == 1 ? '<span class="label label-success"><i class="fa fa-check"></i></span>' :
                             '<span class="label label-danger"><i class="fa fa-times"></i></span>' )?></td>
                    </tr>
                    <tr>
                        <td class="text-justify h5"><b>Data cadastro:</b></td>
                        <td><?php echo formatDataView($dados->data_cadastro_cliente) ?></td>
                    </tr>
                </tbody>
                </thead >
            </table>
            <div class="row margin-botton-20">
                <div class="col-md-12 text-right">
                    <a href="<?php echo base_url('admin/clientes')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
                
        </div>
    </div>
<!-- /.box -->

</section>