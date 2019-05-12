<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function __construct(){

        parent::__construct();
        
        if (!$this->ion_auth->logged_in()){
			redirect('admin/Login');
            }
        
        $this->load->model('Clientes_model');
        
    }

    public function index(){
        $data['titulo'] = 'Lista de cliente';
        $data['view']='admin/clientes/listar'; 
        $data['clientes']= $this->Clientes_model->getClientes(); 

        $this->load->view('admin/templates/index', $data);
    }

    public function modulo($id_cliente=NULL){

        $dados = NULL;
        if ($id_cliente) {
            $data['titulo'] = 'Atualizar cliente';

            $dados = $this->Clientes_model->getClienteId($id_cliente);
            if ( !$dados) {
                setMsg('msgCadastro', 'Cliente nao encontrado', 'erro');
                redrect('admi/clientes', 'refresh');
            }

        }
        else {
            $data['titulo'] = 'Novo cliente';
        }
        $data['dados'] = $dados;
        $data['view']  = 'admin/Clientes/modulo';
        $data['nave']  = array('titulo' => 'Listar clientes', 'link' => 'admin/clientes'); 
        $this->load->view('admin/templates/index', $data);
    }

    public function core(){

        /*Array
        (
            [nome] => zezinho
            [email] => josueneves1982@gmail.com
            [senha] => 123123
            [cpf] => 333.333.333-33
            [data_nascimento] => 11/11/1111
            [telefone] => (11) 11111-1111
            [cpe] => 11111-111
            [endereco] => R Deusde Cardoso 160, Casa
            [numero] => 
            [bairro] => 
            [complemento] => 
            [cidade] => Porto Alegre
            [estado] => RS
            [ativo] => 1
        )*/

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        if ( !$this->input->post('id_cliente')) {
            $this->form_validation->set_rules('senha', 'Senha', 'required');
        }
        else {
            $this->form_validation->set_rules('senha', 'Senha');
        }
        $this->form_validation->set_rules('cpf', 'CPF', 'required');
        $this->form_validation->set_rules('data_nascimento', 'Data nascimento', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');
        $this->form_validation->set_rules('cep', 'CEP', 'required');
        $this->form_validation->set_rules('endereco', 'Endereço', 'required');
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('complemento', 'Complemento', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');

        if ($this->form_validation->run() == TRUE) {
            $dadosCliente['nome'] = $this->input->post('nome');
            $dadosCliente['cpf'] = $this->input->post('cpf');
            $dadosCliente['data_nascimento'] = formataDataDB($this->input->post('data_nascimento'));
            $dadosCliente['cep'] = $this->input->post('cep');
            $dadosCliente['endereco'] = $this->input->post('endereco');
            $dadosCliente['numero'] = $this->input->post('numero');
            $dadosCliente['bairro'] = $this->input->post('bairro');
            $dadosCliente['complemento'] = $this->input->post('complemento');
            $dadosCliente['cidade'] = $this->input->post('cidade');
            $dadosCliente['estado'] = $this->input->post('estado');
            $dadosCliente['email'] = $this->input->post('email');
            $dadosCliente['senha'] = $this->input->post('senha');
            $dadosCliente['ativo'] = $this->input->post('ativo');
            $dadosCliente['telefone'] = $this->input->post('telefone');
            

            if ($this->input->post('id_cliente')) {
                //atualiza cadastro
                $dadosCliente['ultima_atualizacao'] = dataDiadb();
                $id =  $this->input->post('id_cliente');
                $this->Clientes_model->doUpdate($dadosCliente, $id);
                redirect('admin/clientes', 'refresh');

            }
            else {
                // novo cadastro
                $dadosCliente['data_cadastro'] = dataDiadb();
                $this->Clientes_model->doInsert($dadosCliente);
                redirect('admin/clientes', 'refresh');
            }
        }
        else {
            $this->modulo();
        }

    }

    public function del($id_cliente=NULL){

        if ($id_cliente) {
            $this->Clientes_model->doDelete($id_cliente);
            setMsg('msgCadastro', 'Cliente deletado com sucesso!', 'sucesso');
            redirect('admin/clientes', 'refresh');
        }
        else {
            setMsg('msgCadastro', 'erro ao deletar cliente', 'erro');
            redirect('admin/clientes', 'refresh');
        }
    }

    public function deal($id_cliente=NULL){

        if ($id_cliente) {
            $this->Clientes_model->doDelete($id_cliente);
            setMsg('msgCadastro', 'sadasdasdas deletado com sucesso!', 'sucesso');
            redirect('admin/clientes', 'refresh');
        }
        else {
            setMsg('msgCadastro', 'erro ao sadasdsadasdsadsa cliente', 'erro');
            redirect('admin/clientes', 'refresh');
        }
    }
    public function busca($id_cliente=NULL){
        $dados = NULL;
        if ($id_cliente) {
            $data['titulo'] = 'Pesquisar cliente';

            $dados = $this->Clientes_model->getClienteId($id_cliente);


        }
        else {
            setMsg('msgCadastro', 'Cliente nao encontrado', 'erro');
            redrect('admi/clientes', 'refresh');
        }
        $data['dados'] = $dados;
        $data['view']  = 'admin/Clientes/busca';
        $data['nave']  = array('titulo' => 'Pesquisar clientes', 'link' => 'admin/clientes'); 
        $this->load->view('admin/templates/index', $data);

    }

}