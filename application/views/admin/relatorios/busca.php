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
                    <a href="<?php echo base_url('admin/relatorios')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
            
            <?php getMsg('msgCadastro'); ?>

            <table class="table table-responsive table-condensed margin-botton-20 ">
                <thead>
                    <tr class="text-left h2">
                        <td class=" col-md-3">Descrição do pedido</td>
                        <td></td>

                    </tr>

                <tbody>
                        <tr>
                            <td class="text-justify h5"><b>Id pedido:</b></td>
                            <td><?php echo $dados->id_ped ?></td>
                        </tr>
                        <tr>
                            <td class="text-justify h5"><b>Codigo produto:</b></td>
                            <td><?php echo $dados->cod_produto ?></td>
                        </tr>
                        <tr>
                            <td class="text-justify h5"><b>Nome produto:</b></td>
                            <td><?php echo $dados->nome_produto ?></td>
                        </tr>
                        <tr>
                            <td class="text-justify h5"><b>Valor produto:</b></td>
                            <td><?php echo formataMoedaReal($dados->valor_produto) ?></td>
                        </tr>
                        <tr>
                            <td class="text-justify h5"><b>Qtd produto:</b></td>
                            <td><?php echo $dados->qtd_produto ?></td>
                        </tr>
                        <tr>
                            <td class="text-justify h5"><b>Valor total:</b></td>
                            <td><?php echo formataMoedaReal($dados->valor_produto) ?></td>
                        </tr>
                        <tr>
                            <td class="text-justify h5"><b>Data do pedido:</b></td>
                            <td><?php echo formatDataView($dados->data_pedido)?></td>
                        </tr>
                        <tr>
                            <td class="text-justify h5"><b>Informação do produto:</b></td>
                            <td><?php echo $dados->informacao_produto ?></td>
                        </tr>
                        <tr>
                            <td class="text-justify h5"><b>CPF cliente:</b></td>
                            <td><?php echo ($dados->cpf_cliente) ?></td>
                        </tr>
                        <tr>
                            <td class="text-justify h5"><b>Nome cliente:</b></td>
                            <td><?php echo ($dados->nome_cliente) ?></td>
                        </tr>
                        <tr>
                            <td class="text-justify h5"><b>E-mail cliente:</b></td>
                            <td><?php echo ($dados->email_cliente) ?></td>
                        </tr>
                        <tr>
                            <td class="text-justify h5"><b>Fone cliente:</b></td>
                            <td><?php echo ($dados->telefone_cliente) ?></td>
                        </tr>

                </tbody>
                </thead >
            </table>
            <div class="row margin-botton-20">
                <div class="col-md-12 text-right">
                    <a href="<?php echo base_url('admin/relatorios')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
                
        </div>
    </div>
<!-- /.box -->

</section>
    <!--  Array
        (
            [0] => stdClass Object
                (
                    [id_ped] => 5
                    [data_pedido] => 2019-05-13
                    [qtd_produto] => 3
                    [cpf_pedido] => 123.123.123-12
                    [cod_produto] => 1212
                    [id_produto] => 2
                    [id_marca_produto] => 1
                    [id_categoria_produto] => 3
                    [nome_produto] => tulipa
                    [valor_produto] => 20.00
                    [destaque_produto] => 1
                    [ativo_produto] => 1
                    [estoque_produto] => 50
                    [data_cadastro_produto] => 2019-05-05
                    [ultima_atualizacao_produto] => 2019-05-05 22:58:22
                    [informacao_produto] => copo para cerveja
                    [id_categoria] => 3
                    [nome_categoria] => Copos
                    [ativo_categoria] => 1
                    [ultima_atualizacao_categoria] => 2019-05-06 12:22:48
                    [id_cliente] => 1
                    [nome_cliente] => Josue Luiz Neves
                    [cpf_cliente] => 123.123.123-12
                    [data_nascimento] => 1982-08-28
                    [cep_cliente] => 91740-780
                    [end_cliente] => R Deusde Cardoso 
                    [num_cliente] => 160
                    [bairro_cliente] => vila nova
                    [compl_cliente] => Casa
                    [cidade_cliente] => porto alegre
                    [estado_cliente] => rs
                    [email_cliente] => josueneves1982@gmail.com
                    [senha_cliente] => 123123
                    [ativo_cliente] => 0
                    [telefone_cliente] => (51) 98634-1121
                    [data_cadastro_cliente] => 2019-05-01
                    [ultima_atualizacao_cliente] => 2019-05-13 14:21:21
                ) -->