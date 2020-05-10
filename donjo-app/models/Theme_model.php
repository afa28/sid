<?php class Theme_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/*
	| Tema sistem ada di subfolder themes/
	| Tema buatan sistem ada di subfolder desa/themes/
	*/
	public function list_all()
	{
		$tema_sistem = glob('themes/*' , GLOB_ONLYDIR);
		$tema_desa = glob('desa/themes/*' , GLOB_ONLYDIR);
		$tema_semua = array_merge($tema_sistem, $tema_desa);
		$list_tema = array();
		foreach ($tema_semua as $tema){
			$list_tema[] = str_replace('themes/', '', $tema);
		}
		return $list_tema;
	}

	/*
	| Tema aktif
	*/
	public function active()
	{
		$active = $this->db->select('value')
		->where('key', 'web_theme')
		->get('setting_aplikasi')->row()->value;

		return $active;
	}

	public function extract(){
		if(!empty($_FILES['file']['name'])){
				// Set preference
			$folder = 'desa/themes/';

			if (!file_exists($folder))
			{
				$folder = 'themes/';
			}
			$config['upload_path'] =  $folder;
			$config['allowed_types'] = 'zip';
				$config['max_size'] = '5120'; // max_size in kb (5 MB)
				$config['file_name'] = $_FILES['file']['name'];

								// Load upload library
				$this->load->library('upload',$config);

								// File upload
				if($this->upload->do_upload('file')){
										// Get data about the file
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
					$link = $folder.$filename;

										## Extract the zip file ---- start
					$zip = new ZipArchive;

					if ($zip->open($link) === TRUE)
					{

												// Extract file
						$zip->extractTo($folder);
						$zip->close();

						$this->session->set_flashdata('msg','Upload & Extract successfully.');
				}else{
					$this->session->set_flashdata('msg','Failed to upload');
				}
			}else{
				$this->session->set_flashdata('msg','Failed to upload');
			}
		}
	}
	?>
