<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $titulo ?></title>

	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url('public/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('public/bower_components/font-awesome/css/font-awesome.min.css') ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('public/bower_components/Ionicons/css/ionicons.min.css') ?>">
	<!-- Loja css -->
	<link rel="stylesheet" href="<?php echo base_url('public/dist/css/loja.css') ?>">
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>
<body>
	<header>
		<div class="row conteudo-header">
			<div class="container">
				<div class="row">
					<div class="col-md-3 text-left">
						<a href="" title="" class="logo">
							<?= $dados_loja->empresa ?>
						</a>
					</div>
					<div class="col-md-6 text-center">
						<form class="form-inline">
							<div class="form-group">
								<input type="text" name="query_busca" class="form-control input-lg" value="" placeholder="Buscar Produto ..." >
							</div>
							<button type="submit" class="btn btn-default btn-lg "><i class="fa fa-search"></i> Busca</button>
						</form>					
					</div>
					<div>
						<div id="btn-logar" class="col-xs-3">
							<a id="btn-conf" href="<?= base_url('admin/Login') ?>" class="btn btn-primary btn-block btn-flat">LOGAR</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<nav class="navbar navbar-inverse ">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div id="navbar" class="collapse navbar-collapse">
						<ul class="nav navbar-nav text-center">
							<li><a href="#">Principal</a></li>
							<?php foreach ($categorias as $row) { ?>								
								<li><a href="#"><?= $row->nome_categoria ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- carousel fotos  -->
	<section class="container">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>

  		<!-- Wrapper for slides -->
			<div class="carousel-inner carousel-foto" role="listbox">
				<div class="item active">
					<img src="<?= base_url('upload/banner/banner1.jpg')?>" alt="...">
				</div>
			 	<div class="item">
					<img src="<?= base_url('upload/banner/banner2.jpg')?>" alt="...">
				</div>
				<div class="item">
					<img src="<?= base_url('upload/banner/banner3.jpg')?>" alt="...">
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only"><i class="fa fa-chevron-left"></i></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only"><i class="fa fa-chevron-right"></i></span>
			</a>
		</div>
	</section>	
	<!-- lista de produtos -->
	<section class="container">
		<?php 
		if (isset($view)) {
			$this->load->view($view);
		}
		?>
	</section>

	<!--rodape -->
	<footer class="rodape col-md-12">
		<div class="container">
			<div class="row">
				<div class="col-md-4 text-left">
					<h4 class="empresa"><?= $dados_loja->empresa ?></h4>
					<p><h6><?= $dados_loja->endereco .' , '. $dados_loja->bairro .', '. $dados_loja->cidade .', '. $dados_loja->estado?></h6></p>
					<h6><i class="fa fa-phone"></i> <?= $dados_loja->telefone ?></h6>
					<h6><i class="fa fa-envelope-o"></i> <?= $dados_loja->email ?></h6>
				</div>
				<div class="col-md-4 text-center redes">
					redes socias
				</div>
				<div class="col-md-4 text-center Copyright">
					<strong>Copyright &copy; 2018 <a href="#">Neves Devweb</a> . seu site web.</strong> 
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery 3 -->
	<script src="<?php echo base_url('public/bower_components/jquery/dist/jquery.min.js') ?>"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url('public/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>


</body>
</html>