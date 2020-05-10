<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tema extends Admin_Controller
{

	private $temp_folder; // Penyimpanan tema sementara
	private $file_name; // Nama file tema (.zip)
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
		$this->temp_folder = FCPATH.'assets/themes/';
		$this->folder_extract = FCPATH.'desa/themes/';
		$this->clear();
		$this->load->helper(array('form', 'file', 'url'));

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

		$data['list_tema'] = array_merge(array(0 => $active), $list);

		$data['form_action'] = site_url('zip/extract');

		$header = $this->header_model->get_data();

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('tema/table', $data);
		$this->load->view('footer');
	}

	public function detail($folder, $tema = NULL)
	{
		$this->themes($folder_extract, $tema);

		$data['nama']					= $themes;
		$data['lokasi']				= $lokasi;
		$data['form_action']	= site_url('tema/install/'.$themes);

		$this->load->view('tema/detail', $data);
	}

	// Ganti Tema
	public function change($folder_extract, $tema = NULL)
	{
		$this->themes($folder_extract, $tema);

		$this->db->where('key', 'web_theme')->update('setting_aplikasi', array('value' => $this->themes_name));

		redirect('tema');
	}

	// Backup Tema
	public function backup($folder_extract, $tema = NULL)
	{
		$this->themes($folder_extract, $tema);

		$this->zip->read_dir($lokasi, FALSE);
		$this->zip->archive($this->temp_folder.$this->file_name);
		$this->zip->download($this->file_name);
	}

	// Upload dan Install tema
	public function install()
	{

		$this->do_upload();

		redirect('tema');
	}

	// Sterilkan folder_extract temp dari file
	public function clear()
	{
		delete_folder($this->temp_folder);
		mkdir($this->temp_folder, 0, true);
	}

	private function themes($folder, $tema = NULL)
	{
		if($tema !== NULL)
		{
			$this->file_name = $tema.'.zip';
			$this->themes_name = $folder.'/'.$tema;
			$this->folder_themes = $folder.'/themes/'.$folder.'/';
		}
		else
		{
			$this->file_name = $folder.'.zip';
			$this->themes_name = $folder;
			$this->folder_themes = 'themes/'.$folder.'/';
		}
	}


	// Hapus tema (Tema bawaan tdk dpt dihapus)
	public function delete($tema)
	{
		delete_folder($this->folder_extract.$tema);

		redirect('tema');
	}

}
