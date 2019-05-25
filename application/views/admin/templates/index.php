<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php 

    if (isset($titulo)) {
      echo '<title>'. $titulo.'</title>';
    }
    else{
      echo '<title>ADMINISTRADOR LOJA</title>';
    }
  ?>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('public/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('public/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('public/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('public/dist/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('public/dist/css/skins/_all-skins.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/dist/css/admin_loja.css') ?>">
  <!-- PLUGIN DATA-TABLE-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/data-tables/datatables.css') ?>">
    <!-- JQUERY UPLOAD-->
    <link rel="stylesheet" href="<?php echo base_url('public/bower_components/jquery-uploadfile/css/uploadfile.css') ?>">    
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

  <!-- Inicio Header-->
  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b><b>V</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Loja</b>Virtual</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <!-- Botao sair Header-->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="<?php echo base_url('admin/Login/sair')?>">SAIR 
            <i class="fa fa-share"></i> </a>
          </li>
        </ul>
      </div>
      <!-- Fim botao sair Header-->
    </nav>
  </header>
  <!-- Fim Header-->



  <!-- Barra Menu -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Menu  Principal -->
        <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-home"></i> <span>PRINCIPAL</span></a></li>
        <!-- Menu de clientes -->
        <li class="treeview">
          <a href="#">
          <i class="fa fa-users"></i><span>CLIENTES</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/clientes') ?>"><i class="fa fa-user"></i> Lista de clientes</a></li>
            <li><a href="<?php echo base_url('admin/clientes/modulo') ?>"><i class="fa fa-user-plus"></i> Cadastrar clientes</a></li>
          </ul>
        </li>
        <!-- Menu de estoque -->
        <li class="treeview">
          <a href="#">
          <i class="fa fa-truck"></i><span>ESTOQUE</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/produtos') ?>"><i class="fa fa-tags"></i> Produtos</a></li>
            <li><a href="<?php echo base_url('admin/categorias') ?>"><i class="fa fa-plus-circle"></i> Categorias</a></li>
            <li><a href="<?php echo base_url('admin/marcas') ?>"><i class="fa fa-industry"></i></i> Fornecedores</a></li>
          </ul>
        </li>
        <!-- Menu de vendas -->
        <li class="treeview">
          <a href="#">
          <i class="fa fa-shopping-cart"></i><span>VENDAS</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/pedidos') ?>"><i class="fa fa-money"></i> Pedidos</a></li>
            <li><a href="<?php echo base_url('admin/relatorios') ?>"><i class="fa fa-line-chart"></i> Relatorio</a></li>
          </ul>
        </li>
        <!-- Menu de configuração -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i><span>CONFIGURAÇÕES</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/config') ?>"><i class="fa fa-shopping-bag"></i> Loja</a></li>
            <li><a href="<?php echo base_url('admin/usuarios') ?>"><i class="fa fa-user-circle"></i> Usuarios</a></li>
          </ul>
        </li>
        <!-- Botao sair menu -->       
        <li><a href="<?php echo base_url('admin/Login/sair') ?>"><i class="fa fa-share"></i>
        <span>SAIR</span></a></li>
        <!-- Fim  Botao sair menu -->
    </section>
  </aside>
  <!-- Fim Barra Menu -->
  


  <!-- conteudo da pagina -->
  <div class="content-wrapper">

    <?php 
      if (isset($view)) {
        $this->load->view($view);
      }
    ?>

  </div>
  <!-- Fim conteudo da pagina -->

  <!-- Inicio footer --> 
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Loja Virtual</b> 1.0
    </div>
    <strong>Copyright &copy; 2018 <a href="#">Neves Devweb</a>.</strong> todos direitos reservados.
  </footer>
 <!-- /.Fim footer -->

  
<!-- jQuery 3 -->
<script src="<?php echo base_url('public/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('public/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('public/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- PLUGIN DATATABLE-->
<script type="text/javascript" charset="utf8" src="<?php echo base_url('public/data-tables/datatables.js') ?>"></script>
<!-- jQuery Mask -->
<script src="<?php echo base_url('public/jquery-mask/js/jquery.mask.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('public/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('public/dist/js/demo.js') ?>"></script>
<!-- main-->
<script src="<?php echo base_url('public/dist/js/main.js') ?>"></script>
<!-- JQUERY UPLOAD -->
<script src="<?php echo base_url('public/bower_components/jquery-uploadfile/js/jquery.uploadfile.min.js') ?>"></script>
</body>
</html>
