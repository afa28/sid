<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pembangunan extends Admin_Controller {

    private $header;
    
    public function __construct()
	{
		parent::__construct();
        $this->modul_ini = 209;
        $this->load->model('header_model');
        $this->load->model('pembangunan_model', 'pembangunan');
        $this->header = $this->header_model->get_data();
    }

    function index()
    {
        $this->load->view('header', $this->header);
		$this->load->view('nav');
		$this->load->view('pembangunan/daftar');
		$this->load->view('footer');
    }

    function detail()
    {
        $this->load->view('header', $this->header);
		$this->load->view('nav');
		$this->load->view('pembangunan/detail');
		$this->load->view('footer');
    }

    function tampil()
    {
		$data = $this->pembangunan->get();
        
        echo json_encode($data);
    }

    function hapus($id = null)
    {
        if($id !== null AND $this->pembangunan->delete($id) > 0)
        {
            $_SESSION['error_msg'] = 'Sukses menghapus data';
            $_SESSION['success'] = 1;
        }
        else
        {
            $_SESSION['error_msg'] = 'Gagal menghapus data';
            $_SESSION['success'] = 1;
        }
        
        redirect('pembangunan');
    }


    
}