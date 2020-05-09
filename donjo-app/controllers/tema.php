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
		$this->load->helper("file");
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

		$data['list_tema'] = array_merge(array(0 => $active), $list);

		$data['form_action'] = site_url('tema/install');

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
		$config['upload_path']		= $this->temp_folder;
		$config['allowed_types']	= 'zip';
		$config['max_size'] 			= '5120'; // max_size in kb (5 MB)

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('file_themes'))
		{
			$this->session->set_flashdata('msg', 'Error : '.$this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$full_path = $data['upload_data']['full_path'];

			$zip = new ZipArchive;

			if ($zip->open($full_path) === TRUE)
			{
				$zip->extractTo($this->folder_extract);
				$zip->close();
			}
			$this->session->set_flashdata('msg','Tema berhasil di tambahkan');
		}

		redirect('tema');
	}

	// Sterilkan folder_extract temp dari file
	public function clear()
	{
		delete_folder($this->temp_folder);
		mkdir($this->temp_folder, 0, true);
	}

	// Sterilkan folder_extract temp dari file
	public function themes($folder, $tema = NULL)
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


	// Hapus folder_extract dan file
	public function delete($tema)
	{
		//delete_files("desa/themes/".$tema."/", TRUE);
		//rmdir("desa/themes/lupa/");
		//$this->delete_directory($tema);
		delete_folder($this->folder_extract.$tema);
		//delete_file($lokasi, true, false, 1);

		redirect('tema');
	}

}
