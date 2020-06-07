<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tema extends Admin_Controller {

	private $header;

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['header_model', 'theme_model']);
		$this->load->library(['zip']);
		$this->load->helper(['file']);
		$this->modul_ini = 13;
		$this->sub_modul_ini = 212;
		$this->header = $this->header_model->get_data();
	}

	public function index()
	{
		$this->load->view('header', $this->header);
		$this->load->view('nav');
		$this->load->view('admin/tema/data', $data);
		$this->load->view('footer');
	}

	private function _ajax()
	{

	}



}
