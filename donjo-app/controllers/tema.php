<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tema extends Admin_Controller
{

	private $temp_folder; // Penyimpanan tema sementara
	private $folder_extract; // Folder extrack tema (desa/themes/)
	private $themes_name; // Nama tema untuk DB
	private $folder_themes; // Folder peyimpanan tema (themes/ atau desa/themes/)

	public function __construct()
	{
		parent::__construct();
		$this->load->model('header_model');
		$this->load->model('theme_model');
		$this->load->library('session');
		$this->load->library('zip');
		$this->load->helper('file');
		$this->temp_folder = FCPATH.'assets/themes/';
		$this->folder_extract = FCPATH.'desa/themes/';
		$this->clear();

		$this->modul_ini = 11;
		$this->sub_modul_ini = 205;
	}

	public function index()
	{
		$active = $this->theme_model->active();
		$list = $this->theme_model->list_all();

		if (($cari = array_search($active, $list)) !== false)
		{
			array_splice($list, $cari, 1);
		}

		$data['active'] = $active;
		$data['list_tema'] = array_merge(array(0 => $active), $list);
		$data['form_action'] = site_url('install');

		$header = $this->header_model->get_data();

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('tema/table', $data);
		$this->load->view('footer');
	}

	public function detail($tipe, $tema = NULL)
	{
		$this->themes($folder, $tema);

		$data['active'] = $this->theme_model->active();
		$data['nama']		=	$this->themes_name;
		$data['lokasi']	=	$this->folder_themes;
		$data['readme']	=	$this->readme();
		$data['tipe']		=	$tipe;
		$data['tema']		=	$tema;

		$this->load->view('tema/detail', $data);
	}

	// Ganti Tema
	public function change($tipe, $tema = NULL)
	{
		$this->themes($tipe, $tema);

		$this->theme_model->change($this->folder_themes);

		redirect('tema');
	}

	// Backup Tema
	public function backup($tipe, $tema = NULL)
	{
		$this->themes($tipe, $tema);

		$this->zip->read_dir($this->folder_themes, FALSE);
		$this->zip->archive($this->temp_folder.$this->themes_name.'.zip');
		$this->zip->download($this->themes_name.'.zip');
	}

	// Costumize Tema
	public function costumize($tipe, $tema = NULL)
	{
		$this->themes($tipe, $tema);

		$data['lokasi']	=	$this->folder_themes;
		$data['list_setting']	=	$this->theme_model->list_setting();
		$data['form_action']	=	site_url('insert');

		$header = $this->header_model->get_data();

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('tema/form', $data);
		$this->load->view('footer');
	}

	// Sterilkan folder temp dari file
	public function clear()
	{
		delete_folder($this->temp_folder);
		mkdir($this->temp_folder, 0, true);
	}

	private function themes($tipe, $tema = NULL)
	{
		$lokasi = 'desa/';

		if($tema === NULL)
		{
			$tema = $tipe;
			$lokasi = '';
		}

		$this->themes_name	=	$tema;
		$this->folder_themes=	$lokasi.'themes/'.$tema;
	}

	// Hapus tema (Tema bawaan tdk dpt dihapus)
	public function delete($tema)
	{
		delete_folder($this->folder_extract.$tema.'/');

		redirect('tema');
	}

	public function readme()
	{
		$readme = $this->folder_themes.'/readme.txt';

		if(file_exists($readme))
		{
			$lines = file($readme);

			foreach ($lines as $line_num => $line)
			{
				$data .= $line.'<br />';
			}

			return $data;
		}
	}

}
