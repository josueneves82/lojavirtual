<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {

    public function __construct(){

        parent::__construct();
        
        if (!$this->ion_auth->logged_in()){
			redirect('admin/Login');
            }
        
        $this->load->model('Relatorios_model');
        
    }

    public function index(){
        $data['titulo'] = 'Relatorio de vendas';
        $data['view']='admin/relatorios/listar'; 
        $data['relatorios']= $this->Relatorios_model->getRelatorio(); 

        $this->load->view('admin/templates/index', $data);
    }

    public function busca($id_relatorio=NULL){
        $dados = NULL;
        if ($id_relatorio) {
            $data['titulo'] = 'Dados do pedido';

            $dados = $this->Relatorios_model->getRelatorioId($id_relatorio);


        }
        else {
            setMsg('msgCadastro', 'Pesquisa nao encontrado', 'erro');
            redrect('admi/relatorios', 'refresh');
        }
        $data['dados'] = $dados;
        $data['view']  = 'admin/relatorios/busca';
        $data['nave']  = array('titulo' => 'Pesquisar pedidos', 'link' => 'admin/relatorios'); 
        $this->load->view('admin/templates/index', $data);

    }

}