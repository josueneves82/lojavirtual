<section class="content-header">
    <h1><?php echo $titulo; ?></h1>

    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-home"></i> Principal</a></li>
            <?php 
                if (isset($nave)) {
                    echo '<li><a href="'. base_url($nave['link']) .'" title="'.  $nave['titulo'] .'">' . $nave['titulo'] .'</a></li>';
                }
            ?>
        <li class="active"><?php echo $titulo ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <div class="row margin-botton-20 margin-top-10">
                <div class="col-md-12 text-right">
                    <a href="<?php echo base_url('admin/clientes')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
            <form action="<?php echo base_url('admin/clientes/core') ?>" method="post" accept-charset='utf-8' class="form-horizontal">
                
                <?php
                    errosValidacao();
                    getMsg('msgCadastro');
                ?>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nome_cliente" placeholder="Nome" 
                            value="<?php echo ( $dados != NULL ?$dados->nome_cliente : set_value('nome_cliente'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="email_cliente" placeholder="E-mail" 
                            value="<?php echo ( $dados != NULL ?$dados->email_cliente : set_value('email_cliente'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="senha_cliente" placeholder="Senha " 
                            value="<?php echo ( $dados != NULL ?$dados->senha_cliente : set_value('senha_cliente'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">CPF</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input_cpf" name="cpf_cliente" placeholder="CPF" 
                            value="<?php echo ( $dados != NULL ?$dados->cpf_cliente : set_value('cpf_cliente'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Data nascimento</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input_date" name="data_nascimento" placeholder="Data nascimento" 
                            value="<?php echo ( $dados != NULL ? formatDataView($dados->data_nascimento) : set_value('data_nascimento'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input_telefone" name="telefone_cliente" placeholder="Telefone" 
                            value="<?php echo ( $dados != NULL ?$dados->telefone_cliente : set_value('telefone_cliente'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">CEP</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input_cep" name="cep_cliente" placeholder="CEP" 
                            value="<?php echo ( $dados != NULL ?$dados->cep_cliente : set_value('cep_cliente'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Endereço</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="end_cliente" placeholder="Endereço" 
                            value="<?php echo ( $dados != NULL ?$dados->end_cliente : set_value('end_cliente'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">N°</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="num_cliente" placeholder="N°" 
                            value="<?php echo ( $dados != NULL ?$dados->num_cliente : set_value('num_cliente'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Bairro</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="bairro_cliente" placeholder="Bairro" 
                            value="<?php echo ( $dados != NULL ?$dados->bairro_cliente : set_value('bairro_cliente'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Complemento</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="compl_cliente" placeholder="Complemento" 
                            value="<?php echo ( $dados != NULL ?$dados->compl_cliente : set_value('compl_cliente'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Cidade</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="cidade_cliente" placeholder="Cidade" 
                            value="<?php echo ( $dados != NULL ?$dados->cidade_cliente : set_value('cidade_cliente'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Estado</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="estado_cliente" placeholder="Estado" 
                            value="<?php echo ( $dados != NULL ?$dados->estado_cliente : set_value('estado_cliente'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Ativo</label>
                    <div class="col-sm-4" >
                        <select name="ativo_cliente" class="from-control">

                            <?php if ($dados){  // inicio if ?>
                            <option value="0" <?=($dados->ativo_cliente == 0 ? 'selected=""' : '') ?>>NÃO</option>
                            <option value="1" <?=($dados->ativo_cliente == 1 ? 'selected=""' : '') ?>>SIM</option>
                            <?php } else{ ?>
                                <option value="0">NÃO</option>
                                <option value="1" selected="">SIM</option>
                            <?php }  // fim if ?> 
                        </select>
                    </div>
                </div>
                <?php if($dados) {?>
                    <input type="hidden" name="id_cliente" value="<?= $dados->id_cliente ?>">
                <?php } ?>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o"> </i> Salvar</button>
                    </div>    
                </div>
        
            </form>
        </div>
    </div>
</section>