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
        $data['titulo'] = ' pedidos';
        $data['view']='admin/pedidos/pedidos'; 

        $this->load->view('admin/templates/index', $data);
    }

    public function core(){

        $this->form_validation->set_rules('cod_produto', 'Codigo produto', 'required');
        $this->form_validation->set_rules('qtd_produto', 'Qtd produto', 'required');
        $this->form_validation->set_rules('cpf_pedido', 'CPF cliente', 'required');



        if ($this->form_validation->run() == TRUE) {
            $dadosPedido['cpf_pedido'] = $this->input->post('cpf_pedido');
            $dadosPedido['cod_produto'] = $this->input->post('cod_produto');
            $dadosPedido['qtd_produto'] = ($this->input->post('qtd_produto'));
            $dadosPedido['data_pedido'] = dataDiadb();
            $this->Pedidos_model->doInsert($dadosPedido);
            redirect('admin/pedidos', 'refresh');
        }
        else {
            $this->modulo();
        }

    }



}