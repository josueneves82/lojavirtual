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
                    <a href="<?php echo base_url('admin/marcas')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
            <form action="<?php echo base_url('admin/marcas/core') ?>" method="post" accept-charset='utf-8' class="form-horizontal">
                
                <?php
                    errosValidacao();
                    getMsg('msgCadastro');
                ?>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nome_marca" placeholder="Nome" 
                            value="<?php echo ( $dados != NULL ?$dados->nome_marca : set_value('nome_marca'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="email_marca" placeholder="E-mail" 
                            value="<?php echo ( $dados != NULL ?$dados->email_marca : set_value('email_marca'))?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input_telefone" name="contato_marca" placeholder="Telefone" 
                            value="<?php echo ( $dados != NULL ?$dados->contato_marca : set_value('contato_marca'))?>">
                    </div>        
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">CNPJ</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input_cnpj " name="cnpj_marca" placeholder="CNPJ" 
                            value="<?php echo ( $dados != NULL ?$dados->cnpj_marca : set_value('cnpj_marca'))?>">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">Ativo</label>
                    <div class="col-sm-4" >
                        <select name="ativo_marca" class="from-control">

                            <?php if ($dados){  // inicio if ?>
                            <option value="0" <?=($dados->ativo_marca == 0 ? 'selected=""' : '') ?>>NÃO</option>
                            <option value="1" <?=($dados->ativo_marca == 1 ? 'selected=""' : '') ?>>SIM</option>
                            <?php } else{ ?>
                                <option value="0">NÃO</option>
                                <option value="1" selected="">SIM</option>
                            <?php }  // fim if ?> 
                        </select>
                    </div>
                </div>

                <?php if($dados) {?>
                    <input type="hidden" name="id_marca" value="<?= $dados->id_marca ?>">
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