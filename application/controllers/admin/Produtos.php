<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

    public function __construct(){

        parent::__construct();
        
        if (!$this->ion_auth->logged_in()){
			redirect('admin/Login');
            }
        
        $this->load->model('Produtos_model');
        
    }

    public function index(){
        $data['titulo'] = 'Lista de produtos';
        $data['view']='admin/produtos/listar'; 
        $data['produtos']= $this->Produtos_model->getProdutos(); 

        $this->load->view('admin/templates/index', $data);
    }

    public function modulo($id_produto=NULL){

        $dados = NULL;
        if ($id_produto) {
            $data['titulo'] = 'Atualizar produto';

            $dados = $this->Produtos_model->getProdutoId($id_produto);
            if ( !$dados) {
                setMsg('msgCadastro', 'produto nao encontrado', 'erro');
                redrect('admi/produtos', 'refresh');
            }

        }
        else {
            $data['titulo'] = 'Novo produto';
        }
        $data['dados'] = $dados;
        $data['marcas'] = $this->Produtos_model->getIdMarcas();
        $data['categorias'] = $this->Produtos_model->geIdCategorias();
        $data['view']  = 'admin/produtos/modulo';
        $data['nave']  = array('titulo' => 'Listar produtos', 'link' => 'admin/produtos'); 
        $this->load->view('admin/templates/index', $data);
    }

    public function core(){

        $this->form_validation->set_rules('nome_produto', 'Nome produto', 'required');
        $this->form_validation->set_rules('cod_produto', 'Codigo produto', 'required');
        $this->form_validation->set_rules('valor', 'Valor', 'required');
        $this->form_validation->set_rules('estoque', 'Qtd estoque', 'required');
        $this->form_validation->set_rules('informacao', 'Infomacao do produto', 'required');
        $this->form_validation->set_rules('id_categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('id_marca', 'Fornecedor', 'required');


        if ($this->form_validation->run() == TRUE) {
            $dadosProduto['nome_produto'] = $this->input->post('nome_produto');
            $dadosProduto['cod_produto'] = $this->input->post('cod_produto');
            $dadosProduto['valor'] = ($this->input->post('valor'));
            $dadosProduto['estoque'] = $this->input->post('estoque');
            $dadosProduto['informacao'] = $this->input->post('informacao');
            $dadosProduto['id_categoria'] = $this->input->post('id_categoria');
            $dadosProduto['id_marca'] = $this->input->post('id_marca');
            $dadosProduto['destaque'] = $this->input->post('destaque');
            $dadosProduto['ativo'] = $this->input->post('ativo');
            if ($this->input->post('id_produto')) {
                //atualiza cadastro
                $dadosProduto['ultima_atualizacao'] = dataDiadb();
                $id =  $this->input->post('id_produto');
                $this->Produtos_model->doUpdate($dadosProduto, $id);
                redirect('admin/produtos', 'refresh');

            }
            else {
                // novo cadastro
                $dadosProduto['data_cadastro'] = dataDiadb();
                $this->Produtos_model->doInsert($dadosProduto);
                redirect('admin/produtos', 'refresh');
                
            }
        }
        else {
            $this->modulo();
        }

    }
    public function del($id_produto=NULL){

        if ($id_produto) {
            $this->Produtos_model->doDelete($id_produto);
            setMsg('msgCadastro', 'Produto deletado com sucesso!', 'sucesso');
            redirect('admin/produtos', 'refresh');
        }
        else {
            setMsg('msgCadastro', 'erro ao deletar produto', 'erro');
            redirect('admin/produtos', 'refresh');
        }
    }
    public function busca($id_produto=NULL){
        $dados = NULL;
        if ($id_produto) {
            $data['titulo'] = 'Pesquisar produto';

            $dados = $this->Produtos_model->getProdutoId($id_produto);


        }
        else {
            setMsg('msgCadastro', 'produto nao encontrado', 'erro');
            redrect('admi/produtos', 'refresh');
        }
        $data['dados'] = $dados;
        $data['view']  = 'admin/Produtos/busca';
        $data['nave']  = array('titulo' => 'Pesquisar produtos', 'link' => 'admin/produtos'); 
        $this->load->view('admin/templates/index', $data);

    }


}