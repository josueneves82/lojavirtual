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
        $fotos = NULL;
        if ($id_produto) {
            $data['titulo'] = 'Atualizar produto';

            $query = $this->Produtos_model->getProdutoId($id_produto);

            if ($query) {
                $dados = $query;
                $fotos = $this->Produtos_model->getFotoProduto($query->id_produto);
            }
            else {
                setMsg('msgCadastro', 'produto nao encontrado', 'erro');
                redirect('admi/produtos', 'refresh');
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
        $data['fotos'] = $fotos;

        $this->load->view('admin/templates/index', $data);
    }

    public function core(){

        $this->form_validation->set_rules('nome_produto', 'Nome produto', 'required');
        $this->form_validation->set_rules('cod_produto', 'Codigo produto', 'required');
        $this->form_validation->set_rules('valor_produto', 'Valor', 'required');
        $this->form_validation->set_rules('estoque_produto', 'Qtd estoque', 'required');
        $this->form_validation->set_rules('informacao_produto', 'Infomacao do produto', 'required');
        $this->form_validation->set_rules('id_categoria_produto', 'Categoria', 'required');
        $this->form_validation->set_rules('id_marca_produto', 'Fornecedor', 'required');


        if ($this->form_validation->run() == TRUE) {
            $dadosProduto['nome_produto'] = $this->input->post('nome_produto');
            $dadosProduto['cod_produto'] = $this->input->post('cod_produto');
            $dadosProduto['valor_produto'] = ($this->input->post('valor_produto'));
            $dadosProduto['estoque_produto'] = $this->input->post('estoque_produto');
            $dadosProduto['informacao_produto'] = $this->input->post('informacao_produto');
            $dadosProduto['id_categoria_produto'] = $this->input->post('id_categoria_produto');
            $dadosProduto['id_marca_produto'] = $this->input->post('id_marca_produto');
            $dadosProduto['destaque_produto'] = $this->input->post('destaque_produto');
            $dadosProduto['ativo_produto'] = $this->input->post('ativo_produto');

            if ($this->input->post('id_produto')) {

                //atualiza  data cadastro
                $dadosProduto['ultima_atualizacao_produto'] = dataDiadb();

                $id_produto =  $this->input->post('id_produto');

                $this->Produtos_model->doUpdate($dadosProduto, $id_produto);

                // apagar foto antigas
                $this->Produtos_model->doDeleteFotoProduto($id_produto);

                 //redirect('admin/produtos', 'refresh');

            }
            else {
                // novo data cadastro
                $dadosProduto['data_cadastro_produto'] = dataDiadb();

                // cadastra novo produto
                $this->Produtos_model->doInsert($dadosProduto);
                // pegar o id add no BD
                $id_produto = $this->session->userdata('last_id');
               
                }

                 // extrair dados do array foto_produto
                 $foto_produto = $this->input->post('foto_produto');
                 // saber quantas foto exite na variavel
                 $t_foto = count($foto_produto); // retorna um valor int
 
                 for ($i=0; $i < $t_foto ; $i++) { 
                     $foto['id_produto_foto'] = $id_produto;
                     $foto['foto'] = $foto_produto[$i];
 
                     $this->Produtos_model->doInsertFoto($foto);
                
                
            }
            redirect('admin/produtos', 'refresh');
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
    public function upload(){
        // local onde esta armazenado as fotos
       $pasta = 'C:\Users\Dell\Desktop\loja_virtual\upload\foto_produtos';
        // setar as config da biblioteca 
       $config['upload_path'] = $pasta;
       $config['allowed_types'] = 'jpg|png|gif';
       $config['max_size'] = 2048;
       $config['encrypt_name'] = TRUE;

       // carregar a biblioteca upload e pasta
       $this->load->library('upload', $config);

       // verificar se tem uma foto para envio
        if ($this->upload->do_upload('foto_produto')) {
            
            $retorno['file_name'] = $this->upload->data('file_name');
            $retorno['msg'] = ' foto enviada com sucesso';
            $retorno['erro'] = 0;
        }
        else {
            $retorno['msg'] = $this->upload->display_errors();
            $retorno['erro'] = 25;
        }

        // transformando o array em json
        echo json_encode($retorno);











    }


}