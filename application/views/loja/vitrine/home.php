<section class=" container vitrine-produto-destaque">
    <div class="container">
        <div class="row">
            <?php foreach ($destaque as $row) { ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="<?= base_url('upload/foto_produtos/'.$row->foto) ?>" alt="<?= $row->nome_produto?>">
                        <div class="caption">
                            <h3><?= $row->nome_produto?></h3>
                            <p><?= formataMoedaReal($row->valor_produto, TRUE)?></p>
                            <p>
                                <a href="<?= base_url('produto/'.$row->meta_link_produto) ?>" title="Info" class="btn btn-primary" role="button"><i class="fa fa-info-circle"></i> Info</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>