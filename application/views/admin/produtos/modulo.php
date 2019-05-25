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
                    <a href="<?php echo base_url('admin/produtos')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
            <form action="<?php echo base_url('admin/produtos/core') ?>" method="post" accept-charset='utf-8' class="form-horizontal">
                
                <?php
                    errosValidacao();
                    getMsg('msgCadastro');

                ?>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome produto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nome_produto" placeholder="Nome produto" 
                            value="<?php echo ( $dados != NULL ?$dados->nome_produto : set_value('nome_produto'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Codigo produto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="cod_produto" placeholder="Codigo produto" 
                            value="<?php echo ( $dados != NULL ?$dados->cod_produto : set_value('cod_produto'))?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Valor produto </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="valor_produto" placeholder="Valor produto" 
                            value="<?php echo ( $dados != NULL ?$dados->valor_produto : set_value('valor_produto'))?>">
                    </div>        
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Qtd estoque</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="estoque_produto" placeholder="Qtd estoque" 
                            value="<?php echo ( $dados != NULL ?$dados->estoque_produto : set_value('estoque_produto'))?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Foto do produto</label>
                    <div class="col-sm-10">
                    <div id="upload_fotos">Upload</div>
                    </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10 retorno_foto_produto">
                        <?php if ($fotos) { ?>                            
                            <?php foreach ($fotos as $row) { ?>
                                <div class="col-sm-3 img_foto_view">
                                    <img src="<?= base_url('upload/foto_produtos/'.$row->foto ) ?>">
                                    <input type="hidden" value="<?= $row->foto ?>" name="foto_produto[]">
                                    <a href="#" class="btn btn-danger btn-apagar-foto-produto"><i class="fa fa-trash-o"></i> Apagar</a>
                                </div>  
                            <?php } ?>
                        <?php } ?>
                                                
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Descrição do produto</label>
                    <div class="col-sm-10">
                        <textarea name="informacao_produto">
                        <?php echo ( $dados != NULL ?$dados->informacao_produto : set_value('informacao_produto'))?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">Destacar produto</label>
                    <div class="col-sm-4" >
                        <select name="destaque_produto" class="from-control">

                            <?php if ($dados){  // inicio if ?>
                            <option value="0" <?=($dados->destaque_produto == 0 ? 'selected=""' : '') ?>>NÃO</option>
                            <option value="1" <?=($dados->destaque_produto == 1 ? 'selected=""' : '') ?>>SIM</option>
                            <?php } else{ ?>
                                <option value="0">NÃO</option>
                                <option value="1" selected="">SIM</option>
                            <?php }  // fim if ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-4" >
                        <select name="id_categoria_produto" class="from-control col-sm-8">
                            <option></option>
                            <?php foreach ($categorias as $row) { ?>

                                <?php if ($dados){  // inicio if ?>
                                    <option value="<?= $row->id_categoria ?>" <?= ($row->id_categoria == $dados->id_categoria_produto ? ' selected="" ' : '') ?>>
                                    <?= $row->nome_categoria ?></option>
                                <?php } 
                                else{ ?>
                                    <option value="<?= $row->id_categoria?>"> <?= $row->nome_categoria ?></option>
                                <?php }  // fim if ?>

                            <?php } // fim foreach ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">Fornecedor</label>
                    <div class="col-sm-4" >
                        <select name="id_marca_produto" class="from-control col-sm-8">
                            <option></option>
                            <?php foreach ($marcas as $row) { ?>

                                <?php if ($dados){  // inicio if ?>
                                    <option value="<?= $row->id_marca ?>" <?= ($row->id_marca == $dados->id_marca_produto ? ' selected="" ' : '') ?>>
                                    <?= $row->nome_marca ?></option>
                                <?php } 
                                else{ ?>
                                    <option value="<?= $row->id_marca?>"> <?= $row->nome_marca ?></option>
                                <?php }  // fim if ?>

                            <?php } // fim foreach ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">Ativo</label>
                    <div class="col-sm-4" >
                        <select name="ativo_produto" class="from-control">

                            <?php if ($dados){  // inicio if ?>
                            <option value="0" <?=($dados->ativo_produto == 0 ? 'selected=""' : '') ?>>NÃO</option>
                            <option value="1" <?=($dados->ativo_produto == 1 ? 'selected=""' : '') ?>>SIM</option>
                            <?php } else{ ?>
                                <option value="0">NÃO</option>
                                <option value="1" selected="">SIM</option>
                            <?php }  // fim if ?> 
                        </select>
                    </div>
                </div>

                <?php if($dados) {?>
                    <input type="hidden" name="id_produto" value="<?= $dados->id_produto ?>">
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