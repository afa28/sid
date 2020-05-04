<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tema extends Admin_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('header_model');
		$this->load->model('theme_model');
		$this->load->library('session');
		$this->load->helper("file");

		$this->modul_ini = 11;
		$this->sub_modul_ini = 205;
	}

	public function index()
	{
		$data['list_tema'] = $this->theme_model->list_all();
		$this->setting_model->load_options();

		$header = $this->header_model->get_data();

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('tema/table', $data);
		$this->load->view('footer');
	}

	//hapus folder dan file
	public function delete($folder, $tema)
	{
		$folder = $folder.'themes'.$tema;

		delete_files($folder, true , false, 1);

		redirect('tema');
	}

	//ganti tema
	public function change($folder, $tema = NULL)
	{
		if($tema != NULL){
			$themes = $folder.'/'.$tema;
		}
		else
		{
			$themes = $folder;
		}

		$this->db->where('key', 'web_theme')->update('setting_aplikasi', array('value' => $themes));

		redirect('tema');
	}

	/*
	public function _cek($folder, $tema)
	{

		if($tema != 'klasik' OR $tema != 'hadakewa')
		{

		}
		return $tema;
	}
	*/

}
