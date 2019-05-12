<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {

	public function __construct(){

		parent::__construct();

		if (!$this->ion_auth->logged_in()){
			redirect('admin/Login');
			}
        
        $this->load->model('Config_loja_model');
      
	}

	public function index()	{

        $this->form_validation->set_rules('titulo', 'Titulo', 'required');
        if ($this->form_validation->run() == TRUE) {

            /*
                stdClass Object
                (
                    [id] => 1
                    [titulo] => loja virtual
                    [empresa] => devNeves
                    [cep] => 91740780
                    [endereco] => R Deusde Cardoso 160

                    [bairro] => vila nova
                    [complemento] => Casa
                    [cidade] => porto alegre
                    [estado] => rs
                    [email] => josueneves1982@gmail.com
                    [telefone] => 51986342221
                    [p_destaque] => 4
                )
            */

            $dados['titulo']= $this->input->post('titulo');
            $dados['empresa']= $this->input->post('empresa');
            $dados['cep']= $this->input->post('cep');
            $dados['endereco']= $this->input->post('endereco');
            $dados['bairro']= $this->input->post('bairro');
            $dados['complemento']= $this->input->post('complemento');
            $dados['cidade']= $this->input->post('cidade');
            $dados['estado']= $this->input->post('estado');
            $dados['email']= $this->input->post('email');
            $dados['telefone']= $this->input->post('telefone');
            $dados['p_destaque']= $this->input->post('p_destaque');
            $dados['data_atualizacao']= dataDiadb();

            $this->Config_loja_model->doUpdate($dados);

            redirect('admin/config', refresh);
        }
        else {
            $data['titulo']   ='Configuração da Loja';
            $data['view']     ='admin/config/index';
            $data['query']    =$this->Config_loja_model->getConfig();

            $this->load->view('admin/templates/index', $data);
        }
	}

}
