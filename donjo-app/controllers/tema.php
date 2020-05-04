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
		$data['tema_aktif'] = $this->theme_model->active();
		$this->setting_model->load_options();

		$header = $this->header_model->get_data();

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('tema/table', $data);
		$this->load->view('footer');
	}

	//hapus folder dan file
	public function delete($themes, $kat)
	{
		if($kat == 0) {
			$folder = 'desa/themes/'.$themes;
		} else{
			$folder = 'themes/'.$themes;
		}

		delete_files($folder, true , false, 1);

		redirect('tema');
	}

	//ganti tema
	public function ganti_tema($the, $mes=null)
	{
		if($mes == NULL)
		{
			$themes = $the;
		}else{
			$themes = $the.'/'.$mes;
		}

		$this->db->query("UPDATE setting_aplikasi SET value = '".$themes."'  WHERE `key` = 'web_theme'");

		redirect('tema');
	}
}
