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
                        <input type="text" class="form-control" name="nome" placeholder="Nome" 
                            value="<?php echo ( $dados != NULL ?$dados->nome : set_value('nome'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="email" placeholder="E-mail" 
                            value="<?php echo ( $dados != NULL ?$dados->email : set_value('email'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="senha" placeholder="Senha " 
                            value="<?php echo ( $dados != NULL ?$dados->senha : set_value('senha'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">CPF</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input_cpf" name="cpf" placeholder="CPF" 
                            value="<?php echo ( $dados != NULL ?$dados->cpf : set_value('cpf'))?>">
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
                        <input type="text" class="form-control input_telefone" name="telefone" placeholder="Telefone" 
                            value="<?php echo ( $dados != NULL ?$dados->telefone : set_value('telefone'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">CEP</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input_cep" name="cep" placeholder="CEP" 
                            value="<?php echo ( $dados != NULL ?$dados->cep : set_value('cep'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Endereço</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="endereco" placeholder="Endereço" 
                            value="<?php echo ( $dados != NULL ?$dados->endereco : set_value('endereco'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">N°</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="numero" placeholder="N°" 
                            value="<?php echo ( $dados != NULL ?$dados->numero : set_value('numero'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Bairro</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="bairro" placeholder="Bairro" 
                            value="<?php echo ( $dados != NULL ?$dados->bairro : set_value('bairro'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Complemento</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="complemento" placeholder="Complemento" 
                            value="<?php echo ( $dados != NULL ?$dados->complemento : set_value('complemento'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Cidade</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="cidade" placeholder="Cidade" 
                            value="<?php echo ( $dados != NULL ?$dados->cidade : set_value('cidade'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Estado</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="estado" placeholder="Estado" 
                            value="<?php echo ( $dados != NULL ?$dados->estado : set_value('estado'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Ativo</label>
                    <div class="col-sm-4" >
                        <select name="ativo" class="from-control">

                            <?php if ($dados){  // inicio if ?>
                            <option value="0" <?=($dados->ativo == 0 ? 'selected=""' : '') ?>>NÃO</option>
                            <option value="1" <?=($dados->ativo == 1 ? 'selected=""' : '') ?>>SIM</option>
                            <?php } else{ ?>
                                <option value="0">NÃO</option>
                                <option value="1" selected="">SIM</option>
                            <?php }  // fim if ?> 
                        </select>
                    </div>
                </div>
                <?php if($dados) {?>
                    <input type="hidden" name="id_cliente" value="<?= $dados->id ?>">
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