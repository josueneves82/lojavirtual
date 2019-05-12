<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    public function __construct(){

        parent::__construct();
        
        if (!$this->ion_auth->logged_in()){
			redirect('admin/Login');
            }
        
        $this->load->model('Pedidos_model');
        
    }
    public function index(){
        $dados = NULL;

        $data['titulo'] = 'Realizar pedidos';
        $data['dados'] = $dados;
        $data['produtos'] = $this->Pedidos_model->geIdProdutos();
        $data['categorias'] = $this->Pedidos_model->geIdCategorias();
        $data['view']='admin/pedidos/pedidos';
        $data['nave']  = array('titulo' => 'Listar produtos', 'link' => 'admin/produtos'); 
        $this->load->view('admin/templates/index', $data);
    }
    
    public function listaPedidos() {
        //$data['titulo'] = 'Lista de produtos';
        $data['view']='admin/pedidos/pedidos'; 
        $data['pedidos']= $this->Pedidos_model->getProdutos(); 

        $this->load->view('admin/templates/index', $data);

       }
}