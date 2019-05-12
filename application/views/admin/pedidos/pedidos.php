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
                    <a href="<?php echo base_url('admin/pedidos')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
            <form action="<?php echo base_url('admin/pedidos/core') ?>" method="post" accept-charset='utf-8' class="form-horizontal">
                
                <?php
                    errosValidacao();
                    getMsg('msgCadastro');
                ?>

                <div class="form-group">
                    <label class="col-sm-2 control-label ">CPF</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control input_cpf" name="nome_produto" placeholder="CPF cliente" 
                            value="input_cpf">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">CATEGORIAS</label>
                    <div class="col-sm-3">
                    <select id="dropdown" name="id_produto" class="from-control col-sm-8">
                            <option></option>
                            <?php foreach ($categorias as $cat) { ?>

                                <?php if ($dados){  // inicio if ?>
                                    <option value="<?= $cat->id ?>" <?= ($cat->id == $dados->id_categoria ? ' selected="" ' : '') ?>>
                                    <?= $cat->nome_categoria ?></option>
                                <?php } 
                                else{ ?>
                                    <option value="<?= $cat->id?>"> <?= $cat->nome_categoria ?></option>
                                <?php }  // fim if ?>

                            <?php } // fim foreach ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">PRODUTO</label>
                    <select id="dropdown" name="id_produto" class="from-control col-sm-8">
                            <option></option>
                            <?php foreach ($pedidos as $ped) { ?>

                                <?php if ($dados){  // inicio if ?>
                                    <option value="<?= $ped->id ?>" <?= ($ped->id == $dados->id_produto ? ' selected="" ' : '') ?>>
                                    <?= $ped->nome_produto ?></option>
                                <?php } 
                                else{ ?>
                                    echo '<pre>';
                                        print_r($ped); 
                                <?php } // fim if ?>

                            <?php } // fim foreach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o"> </i> Salvar</button>
                    </div>    
                </div>
        
            </form>
        </div>
    </div>
</section>