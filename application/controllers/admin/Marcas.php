<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller {

    public function __construct(){

        parent::__construct();
        
        if (!$this->ion_auth->logged_in()){
			redirect('admin/Login');
            }
        
        $this->load->model('Marcas_model');
        
    }

    public function index(){
        $data['titulo'] = 'Lista de cliente';
        $data['view']='admin/marcas/listar'; 
        $data['marcas']= $this->Marcas_model->getMarcas(); 

        $this->load->view('admin/templates/index', $data);
    }

    public function modulo($id_marca=NULL){

        $dados = NULL;
        if ($id_marca) {
            $data['titulo'] = 'Atualizar marca';

            $dados = $this->Marcas_model->getMarcaId($id_marca);
            if ( !$dados) {
                setMsg('msgCadastro', 'Marca nao encontrado', 'erro');
                redrect('admi/marcas', 'refresh');
            }

        }
        else {
            $data['titulo'] = 'Novo marca';
        }
        $data['dados'] = $dados;
        $data['view']  = 'admin/Marcas/modulo';
        $data['nave']  = array('titulo' => 'Listar marcas', 'link' => 'admin/marcas'); 
        $this->load->view('admin/templates/index', $data);
    }

    public function core(){

        $this->form_validation->set_rules('nome_marca', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('contato', 'Telefone', 'required');
       
    
        if ($this->form_validation->run() == TRUE) {
            $dadosMarca['nome_marca'] = $this->input->post('nome_marca');
            $dadosMarca['email'] = $this->input->post('email');
            $dadosMarca['contato'] = ($this->input->post('contato'));
            $dadosMarca['cnpj'] = $this->input->post('cnpj');
            $dadosMarca['ativo'] = $this->input->post('ativo');
          
    
            if ($this->input->post('id_marca')) {
                //atualiza cadastro
                $dadosMarca['ultima_atualizacao'] = dataDiadb();
                $id =  $this->input->post('id_marca');
                $this->Marcas_model->doUpdate($dadosMarca, $id);
                redirect('admin/marcas', 'refresh');
    
            }
            else {
                // novo cadastro
                $dadosMarca['data_cadastro'] = dataDiadb();
                $this->Marcas_model->doInsert($dadosMarca);
                redirect('admin/marcas', 'refresh');
            }
        }
        else {
            $this->modulo();
        }
    }

    public function del($id_marca=NULL){

        if ($id_marca) {
            $this->Marcas_model->doDelete($id_marca);
            setMsg('msgCadastro', 'Fornecedor deletado com sucesso!', 'sucesso');
            redirect('admin/marcas', 'refresh');
        }
        else {
            setMsg('msgCadastro', 'erro ao deletar Fornecedor', 'erro');
            redirect('admin/marcas', 'refresh');
        }
    }
    public function busca($id_marca=NULL){
        $dados = NULL;
        if ($id_marca) {
            $data['titulo'] = 'Pesquisar Fornecedor';

            $dados = $this->Marcas_model->getMarcaId($id_marca);


        }
        else {
            setMsg('msgCadastro', 'Fornecedor nao encontrado', 'erro');
            redrect('admi/marcas', 'refresh');
        }
        $data['dados'] = $dados;
        $data['view']  = 'admin/marcas/busca';
        $data['nave']  = array('titulo' => 'Pesquisar marcas', 'link' => 'admin/marcas'); 
        $this->load->view('admin/templates/index', $data);

    }
}