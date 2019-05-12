<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

    public function __construct(){

        parent::__construct();
        
        if (!$this->ion_auth->logged_in()){
			redirect('admin/Login');
            }
        
        $this->load->model('Categorias_model');
        
    }

    public function index(){
        $data['titulo'] = 'Lista de categorias';
        $data['view']='admin/Categorias/listar'; 
        $data['Categorias']= $this->Categorias_model->getCategorias(); 

        $this->load->view('admin/templates/index', $data);
	}

	public function modulo($id_categoria=NULL){

		$dados = NULL;

		if ($id_categoria) {
			$data['titulo']= 'Atualizar categoria';
			$dados = $this->Categorias_model->getCategoriaId($id_categoria);

			if ( !$dados) {
				setMsg('msgCadastro', 'Categoria não encontrada', 'erro');
				redirect('admin/categorias', 'refresh');
				
			}

		}
		else {
			$data['titulo']= 'Nova categoria';
		}

		$data['dados'] = $dados;
		$data['view']  = 'admin/Categorias/modulo';
		$data['nave']  = array('titulo' => 'Listar Categorias', 'link' => 'admin/Categorias'); 
        $this->load->view('admin/templates/index', $data);
	}

	public function core(){

		$this->form_validation->set_rules('nome_categoria', 'Nome ', 'required');

		if ($this->form_validation->run() == True) {
			/*
				Array
				(
					[nome_categoria] => copos
					[ativo] => 1
				)
			*/
			$dadosCategorias['nome_categoria'] = $this->input->post('nome_categoria');
			$dadosCategorias['ativo'] = $this->input->post('ativo');

			if ($this->input->post('id_categoria')) {

				$dadosCategorias['ultima_atualizacao'] = dataDiadb();
				$id =  $this->input->post('id_categoria');
                $this->Categorias_model->doUpdate($dadosCategorias, $id);
                redirect('admin/Categorias', 'refresh');
                
			}
			else {
				$this->Categorias_model->doInsert($dadosCategorias);
				redirect('admin/categorias', 'refresh');
			}
		}
		else {
			$this->modulo();
		}

	}

	public function del($id_categoria=NULL){

        if ($id_categoria) {
            $this->Categorias_model->doDelete($id_categoria);
            setMsg('msgCadastro', 'Categoria deletado com sucesso!', 'sucesso');
            redirect('admin/categorias', 'refresh');
        }
        else {
            setMsg('msgCadastro', 'erro ao deletar Categoria', 'erro');
            redirect('admin/categorias', 'refresh');
        }
	}
	

	
    public function busca($id_categoria=NULL){
        $dados = NULL;
        if ($id_categoria) {
            $data['titulo'] = 'Pesquisar Categoria';

            $dados = $this->Categorias_model->getCategoriaId($id_categoria);


        }
        else {
            setMsg('msgCadastro', 'Categoria nao encontrado', 'erro');
            redrect('admi/Categorias', 'refresh');
        }
        $data['dados'] = $dados;
        $data['view']  = 'admin/Categorias/busca';
        $data['nave']  = array('titulo' => 'Pesquisar categorias', 'link' => 'admin/categorias'); 
        $this->load->view('admin/templates/index', $data);

    }
}













