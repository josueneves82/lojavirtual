<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){

		parent::__construct();

	}

	public function index(){

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');

		if ($this->form_validation->run() == TRUE){

			$identity = $this->input->post('email');
			$password = $this->input->post('senha');
			$remember = ($this->input->post('manter_conectado') != NULL ? TRUE : FALSE);
			
			if ($this->ion_auth->login($identity, $password, $remember)) {
				
				redirect('admin/Principal', 'refresh');
			}
			else {
				redirect('admin/Login', 'refresh');
			}
			
		}
		else
		{
			$this->load->view('admin/templates/Login');
		}		
				
	}
	public function sair(){

		$this->ion_auth->logout();
		redirect('loja/loja', 'refresh');
		
	}



}
