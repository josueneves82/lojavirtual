<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Loja_model');

    }

    public function index(){

        $query = $this->Loja_model->getDadosLoja();

        $data['titulo'] = $query->titulo;
        $data['dados_loja'] = $query;
        $data['categorias'] = $this->Loja_model->getCategoriaLoja();
        $data['destaque'] = $this->Loja_model->getProdutoDestaque($query->p_destaque);
        $data['view'] = 'loja/vitrine/home';

        $this->load->view('loja/index', $data);
	}





}













