<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller
{
	// Upload dan Install tema
	public function index()
	{
		// Set preference
		$temp_folder	=	FCPATH.'assets/themes/';
		$folder_extract	=	FCPATH.'desa/themes/';

		if (!file_exists($folder_extract))
		{
			mkdir($folder_extract, 0, true);
		}

		$config['upload_path']		=	$temp_folder;
		$config['allowed_types']	=	'zip';
		$config['max_size']				=	'5120'; // max_size in kb (5 MB)
		$config['file_name']			=	$_FILES['file']['name'];

		$this->load->library('upload',$config);

		if($this->upload->do_upload('file') AND !empty($_FILES['file']['name']))
		{
			$uploadData = $this->upload->data();
			$filename = $uploadData['file_name'];
			$link = $temp_folder.$filename;

			$zip = new ZipArchive;

			if ($zip->open($link) === TRUE)
			{

				$zip->extractTo($folder_extract);
				$zip->close();

				$msg = 'Tema berhasil di install';
			}
		}
		else
		{
			$msg = $this->upload->display_errors();
		}

		$this->session->set_flashdata('msg', $msg);

		redirect('tema');
	}
}
