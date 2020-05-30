<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pembangunan extends Admin_Controller {

    private $header;
    
    public function __construct()
	{
		parent::__construct();
        $this->modul_ini = 209;
        $this->load->model('header_model');
        $this->header = $this->header_model->get_data();
    }

    function index(){
        $this->load->view('header', $this->header);
		$this->load->view('nav');
		$this->load->view('pembangunan/daftar', $data);
		$this->load->view('footer');
    }

    function list_data(){
		$data = $this->db->get('pembangunan')->result_array();
        
        echo json_encode($data);
    }
    
}