<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function __construct(){

        parent::__construct();
        
        if (!$this->ion_auth->logged_in()){
			redirect('loja/loja');
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
            [nome_cliente] => zezinho
            [email] => josueneves1982@gmail.com
            [senha] => 123123
            [cpf_cliente] => 333.333.333-33
            [data_nascimento] => 11/11/1111
            [telefone] => (11) 11111-1111
            [cep_cliente] => 11111-111
            [end_cliente] => R Deusde Cardoso 160, Casa
            [num_cliente] => 
            [bairro_cliente] => 
            [compl_cliente] => 
            [cidade_cliente] => Porto Alegre
            [estado] => RS
            [ativo] => 1
        )*/

        $this->form_validation->set_rules('nome_cliente', 'Nome', 'required');
        $this->form_validation->set_rules('email_cliente', 'E-mail', 'required|valid_email');
        if ( !$this->input->post('id_cliente')) {
            $this->form_validation->set_rules('senha_cliente', 'Senha', 'required');
        }
        else {
            $this->form_validation->set_rules('senha_cliente', 'Senha');
        }
        $this->form_validation->set_rules('cpf_cliente', 'CPF', 'required');
        $this->form_validation->set_rules('data_nascimento', 'Data nascimento', 'required');
        $this->form_validation->set_rules('telefone_cliente', 'Telefone', 'required');
        $this->form_validation->set_rules('cep_cliente', 'CEP', 'required');
        $this->form_validation->set_rules('end_cliente', 'Endereço', 'required');
        $this->form_validation->set_rules('num_cliente', 'num_cliente', 'required');
        $this->form_validation->set_rules('bairro_cliente', 'Bairro', 'required');
        $this->form_validation->set_rules('compl_cliente', 'Complemento', 'required');
        $this->form_validation->set_rules('cidade_cliente', 'Cidade', 'required');
        $this->form_validation->set_rules('estado_cliente', 'estado_cliente', 'required');

        if ($this->form_validation->run() == TRUE) {
            $dadosCliente['nome_cliente'] = $this->input->post('nome_cliente');
            $dadosCliente['cpf_cliente'] = $this->input->post('cpf_cliente');
            $dadosCliente['data_nascimento'] = formataDataDB($this->input->post('data_nascimento'));
            $dadosCliente['cep_cliente'] = $this->input->post('cep_cliente');
            $dadosCliente['end_cliente'] = $this->input->post('end_cliente');
            $dadosCliente['num_cliente'] = $this->input->post('num_cliente');
            $dadosCliente['bairro_cliente'] = $this->input->post('bairro_cliente');
            $dadosCliente['compl_cliente'] = $this->input->post('compl_cliente');
            $dadosCliente['cidade_cliente'] = $this->input->post('cidade_cliente');
            $dadosCliente['estado_cliente'] = $this->input->post('estado_cliente');
            $dadosCliente['email_cliente'] = $this->input->post('email_cliente');
            $dadosCliente['senha_cliente'] = $this->input->post('senha_cliente');
            $dadosCliente['ativo_cliente'] = $this->input->post('ativo_cliente');
            $dadosCliente['telefone_cliente'] = $this->input->post('telefone_cliente');
            

            if ($this->input->post('id_cliente')) {
                //atualiza cadastro
                $dadosCliente['ultima_atualizacao_cliente'] = dataDiadb();
                $id_cliente =  $this->input->post('id_cliente');
                $this->Clientes_model->doUpdate($dadosCliente, $id_cliente);
                redirect('admin/clientes', 'refresh');

            }
            else {
                // novo cadastro
                $dadosCliente['data_cadastro_cliente'] = dataDiadb();
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