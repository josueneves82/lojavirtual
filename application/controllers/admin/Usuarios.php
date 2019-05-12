<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct(){

        parent::__construct();
        
        if (!$this->ion_auth->logged_in()){
			redirect('admin/Login');
            }
    }

	public function index(){

        $data['titulo']   ='Lista de Usuarios';
        $data['view']     ='admin/usuarios/listar';
        $data['usuarios'] = $this->ion_auth->users()->result();

        $this->load->view('admin/templates/index', $data); 

    }
    
    public function modulo($id_usuario= NULL){

        $dados= NULL;

        if ($id_usuario) {

            $dados = $this->ion_auth->user($id_usuario)->row();

            if ($dados) {
                $data['titulo'] = 'Atualizar Cadastro';
            }            
            else {
                setMsg('msgCadastro', 'registro não encontrado', 'erro');
                redirect('admin/usuarios', 'refresh');
            }
        }
        else {
            $data['titulo'] = 'Novo usuario';
        }
        
        $data['dados'] = $dados;
        $data['view']  = 'admin/usuarios/modulo';
        $data['nave']  = array('titulo' => 'Listar usuarios', 'link' => 'admin/usuarios'); 
        $this->load->view('admin/templates/index', $data);
    }

    public function core(){

        $this->form_validation->set_rules('username', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('phone', 'Telefone', 'required');
        $this->form_validation->set_rules('data_nascimento', 'Data nascimento', 'required');
        if ( !$this->input->post('id_usuario')) {
            $this->form_validation->set_rules('senha', 'Senha', 'required');
        }
        
        if ($this->form_validation->run() == TRUE){

            $username = $this->input->post('username');
            $password = $this->input->post('senha');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $data_nascimento = formataDataDB($this->input->post('data_nascimento'));
            $additional_data = NULL;
            $group = array('1');

            if ($this->input->post('id_usuario')) {
                
                $id = $this->input->post('id_usuario');

                $data['username']= $this->input->post('username');
                $data['email']= $this->input->post('email');
                $data['phone']= $this->input->post('phone');
                $data['data_nascimento']= formataDataDB($this->input->post('data_nascimento'));
                $data['active']= $this->input->post('active');

                if ($this->input->post('id_usuario')) {
                    //atualiza cadastro
                    $data['ultima_atualizacao'] = dataDiadb();
                }
                else {
                    // novo cadastro
                    $data['data_cadastro'] = dataDiadb();
                }

                if ($this->input->post('senha')) {
                    $data['password']= $this->input->post('senha');
                }
                
                if ($this->ion_auth->update($id, $data)) {
                    setMsg('msgCadastro', 'Cadastro do usuário foi atualizado', 'sucesso');
                    redirect('admin/usuarios', 'refresh');
                }
                else {
                    setMsg('msgCadastro', 'Erro na atualização', 'erro');
                    redirect('admin/usuarios', 'refresh');
                }             
            
            }
            else {
                if ($this->ion_auth->register($username, $password, $email, $additional_data, $group, $phone, $data_nascimento)) {
                
                    setMsg('msgCadastro', 'Usuario Cadastrado com Sucesso', 'sucesso');
                    redirect('admin/usuarios', 'refresh');
                }
                else {
                    setMsg('msgCadastro', 'Erro ao Cadastrar', 'erro');
                    redirect('admin/usuarios', 'refresh');
                }
            }  

        }
        else {
            $this->modulo();
        }
    }

    public function del($id_usuario = NULL){

        if ($id_usuario) {
            if ($id_usuario == 1 ) {
                setMsg('msgCadastro', 'Nao é possivel excluir esse Usuario', 'erro');
                redirect('admin/usuarios', 'refresh');
            }
            if ($id_usuario == $this->session->userdata('user_id')) {
                setMsg('msgCadastro', 'Nao é possivel excluir o seu propio Usuario', 'erro');
                redirect('admin/usuarios', 'refresh');
            }
            if ($this->ion_auth->delete_user($id_usuario)) {
                setMsg('msgCadastro', 'Usuario Deletado com Sucesso', 'sucesso');
                redirect('admin/usuarios', 'refresh');
            }
            else {
                setMsg('msgCadastro', 'erro ao deletar usuario', 'erro');
                redirect('admin/usuarios', 'refresh');
            }
        }
        else {
            setMsg('msgCadastro', 'selecione um usuario', 'erro');
            redirect('admin/usuarios', 'refresh');
        }
    }

    public function busca($id_usuario=NULL){
        $dados= NULL;

        if ($id_usuario) {

            $dados = $this->ion_auth->user($id_usuario)->row();

            if ($dados) {
                $data['titulo'] = 'Pesquisa de usuario';
            }            
            
        }
        else {
            setMsg('msgCadastro', 'registro não encontrado', 'erro');
            redirect('admin/usuarios', 'refresh');
        }
        
        $data['dados'] = $dados;
        $data['view']  = 'admin/usuarios/busca';
        $data['nave']  = array('titulo' => 'Pesquisar usuarios', 'link' => 'admin/usuarios'); 
        $this->load->view('admin/templates/index', $data);
       
    }
}
