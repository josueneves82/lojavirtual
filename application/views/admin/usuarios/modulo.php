<section class="content-header">
    <h1>
        <?php
            echo $titulo;
        ?>
    </h1>
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
                    <a href="<?php echo base_url('admin/usuarios')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
            <form action="<?php echo base_url('admin/usuarios/core') ?>" method="post" accept-charset='utf-8' class="form-horizontal">
                
                <?php
                    errosValidacao();
                    getMsg('msgCadastro');
                ?>
                
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="username" placeholder="Nome" 
                            value="<?php echo ( $dados != NULL ?$dados->username : set_value('username'))?>">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" placeholder="E-mail" 
                        value="<?php echo ($dados != NULL ?$dados->email : set_value('email')) ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Data nascimento</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control input_date " name="data_nascimento" placeholder="Data nascimento" 
                            value="<?php echo ( $dados != NULL ? formatDataView($dados->data_nascimento) : set_value('data_nascimento'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control input_telefone" name="phone" placeholder="Telefone" 
                            value="<?php echo ( $dados != NULL ?$dados->phone : set_value('phone'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Ativo</label>
                    <div class="col-sm-3" >
                        <select name="active" class="from-control">

                            <?php if ($dados){  // inicio if ?>
                            <option value="0" <?=($dados->active == 0 ? 'selected=""' : '') ?>>NÃO</option>
                            <option value="1" <?=($dados->active == 1 ? 'selected=""' : '') ?>>SIM</option>
                            <?php } else{ ?>
                                <option value="0">NÃO</option>
                                <option value="1" selected="">SIM</option>
                            <?php }  // fim if ?> 
                        </select>
                    </div>
                </div>
                <?php if ($dados) { ?>
                    <input type="hidden" name="id_usuario" value="<?= $dados->id ?>">
                <?php } ?>
                <div class="form-group ">
                    <div class="col-sm-offset-2 col-sm-10 ">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o"> </i> Salvar</button>
                    </div>
                </div>    
            </form>
        </div>
    </div>
</section>