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
                    <a href="<?php echo base_url('admin')?>" title="Novo"class="btn btn-primary">
                    <i class="fa fa-reply"></i> <b>Voltar</b></a>
                </div>
            </div>
            <?php
                errosValidacao();
                getMsg('msgCadastro');

            ?>
            <!-- Inicio formaulario -->
            <form class="form-horizontal" method="post" action="<?php base_url('admin/config')?>">

                <div class="form-group">
                    <label for="titulo" class="col-sm-2 control-label">Titulo</label>
                    <div class="col-sm-10">
                    <input type="text" required="" name="titulo" value="<?php echo $query->titulo ?>" class="form-control" id="titulo" placeholder="Titulo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="empresa" class="col-sm-2 control-label">Nome da empresa</label>
                    <div class="col-sm-10">
                    <input type="text" required="" name="empresa" value="<?php echo $query->empresa ?>" class="form-control" id="empresa" placeholder="Nome da empresa">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cep" class="col-sm-2 control-label">CEP</label>
                    <div class="col-sm-10">
                    <input type="text" required="" name="cep" value="<?php echo $query->cep ?>" class="form-control" id="cep" placeholder="CEP">
                    </div>
                </div>
                <div class="form-group">
                    <label for="endereco" class="col-sm-2 control-label">Endereço</label>
                    <div class="col-sm-10">
                    <input type="text" required="" name="endereco" value="<?php echo $query->endereco ?>" class="form-control" id="endereco" placeholder="Endereço">
                    </div>
                </div>
                <div class="form-group">
                    <label for="bairro" class="col-sm-2 control-label">Bairro</label>
                    <div class="col-sm-10">
                    <input type="text" required="" name="bairro" value="<?php echo $query->bairro ?>" class="form-control" id="bairro" placeholder="Bairro">
                    </div>
                </div>
                <div class="form-group">
                    <label for="complemento" class="col-sm-2 control-label">Complemento</label>
                    <div class="col-sm-10">
                    <input type="text" required="" name="complemento" value="<?php echo $query->complemento ?>" class="form-control" id="complemento" placeholder="Complemento">
                    </div>
                </div>
                <div class="form-group">
                    <label for="cidade" class="col-sm-2 control-label">Cidade</label>
                    <div class="col-sm-10">
                    <input type="text" required="" name="cidade" value="<?php echo $query->cidade ?>" class="form-control" id="cidade" placeholder="Cidade">
                    </div>
                </div>
                <div class="form-group">
                    <label for="estado" class="col-sm-2 control-label">Estado</label>
                    <div class="col-sm-10">
                    <input type="text" required="" name="estado" value="<?php echo $query->estado ?>" class="form-control" id="estado" placeholder="Estado">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                    <input type="text" required="" name="email" value="<?php echo $query->email ?>" class="form-control" id="email" placeholder="E-mail">
                    </div>
                </div>
                <div class="form-group">
                    <label for="telefone" class="col-sm-2 control-label">Telefone</label>
                    <div class="col-sm-10">
                    <input type="text" required="" name="telefone" value="<?php echo $query->telefone ?>" class="form-control" id="telefone" placeholder="Telefone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="p_destaque" class="col-sm-2 control-label">Total de produto destaque</label>
                    <div class="col-sm-10">
                    <input type="text" required="" name="p_destaque" value="<?php echo $query->p_destaque ?>" class="form-control" id="p_destaque" placeholder="Total de produto destaque">
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