<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct(){

		parent::__construct();

		if (!$this->ion_auth->logged_in()){
			redirect('admin/Login');
			}

	}

	public function index()
	{
		$this->load->view('admin/templates/index');
	}

}
