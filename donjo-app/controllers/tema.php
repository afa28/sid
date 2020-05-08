<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tema extends Admin_Controller
{

	private $temp_file;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('header_model');
		$this->load->model('theme_model');
		$this->load->library('session');
		$this->load->helper("file");
		$this->temp_file = FCPATH.'assets/themes/';

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
		if($tema !== NULL){
			$themes = $folder.'/'.$tema;
		}
		else
		{
			$themes = $folder;
		}

		// Load File Image dan Read

		$data['nama_tema'] = 'coba';
		$data['form_action'] = site_url('tema/install/'.$themes);


		$this->load->view('tema/detail', $data);
	}

	// Ganti Tema
	public function change($folder, $tema = NULL)
	{
		if($tema !== NULL){
			$themes = $folder.'/'.$tema;
		}
		else
		{
			$themes = $folder;
		}

		$this->db->where('key', 'web_theme')->update('setting_aplikasi', array('value' => $themes));

		redirect('tema');
	}

	// Backup Tema
	public function backup($folder, $tema = NULL)
	{
		$this->load->library('zip');

		if($tema !== NULL){
			$name = $tema.'.zip';
			$lokasi = $folder.'/themes/'.$tema.'/';
		}
		else
		{
			$name = $folder.'.zip';
			$lokasi = 'themes/'.$folder.'/';
		}

		$this->zip->read_dir($lokasi, FALSE);
		$this->zip->archive($this->temp_file.$name);
		$this->zip->download($name);

		// Hapus file upload setelah di extrack
		delete_files($this->temp_file, TRUE);
	}

	// Upload dan Install tema
	public function install()
	{
		$config['upload_path']		= $this->temp_file;
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
				$zip->extractTo(FCPATH.'/desa/themes/');
				$zip->close();

				// Hapus file upload setelah di extrack
				delete_files($this->temp_file, TRUE);
			}
			$this->session->set_flashdata('msg','Tema berhasil di tambahkan');
		}

		redirect('tema');
	}




	// Hapus folder dan file
	public function delete($tema)
	{
		//delete_files("desa/themes/".$tema."/", TRUE);
		//rmdir("desa/themes/lupa/");
		//$this->delete_directory($tema);
		@delete_folder(FClokasi.'desa/themes/'.$tema);
		//delete_file($lokasi, true, false, 1);

		redirect('tema');
	}

	public function delete_directory($folder_name)
	{
		$this->load->helper('file');

		$dir_lokasi = 'desa/themes/'.$folder_name;
		$del_lokasi = './desa/themes/'.$folder_name.'/';

		if(is_dir($dir_lokasi))
		{
			delete_files($del_lokasi, true, false, 1);
			rmdir($dir_lokasi);

			return true;
		}

		return false;
	}

}
