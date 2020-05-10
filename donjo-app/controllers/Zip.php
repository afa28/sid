<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class zip extends CI_Controller
{
	// Upload and Extract zip file
	public function install()
	{
		// Set preference
		$folder_upload	=	FCPATH.'assets/themes/';
		$folder_extract	=	FCPATH.'desa/themes/';

		if (!file_exists($folder_extract))
		{
			mkdir($folder_extract, 0, true);
		}

		$config['upload_path'] =  $folder_upload;
		$config['allowed_types'] = 'zip';
		$config['max_size'] = '5120'; // max_size in kb (5 MB)
		$config['file_name'] = $_FILES['file']['name'];

		// Load upload library
		$this->load->library('upload',$config);

		// File upload
		if($this->upload->do_upload('file') AND !empty($_FILES['file']['name']))
		{
			// Get data about the file
			$uploadData = $this->upload->data();
			$filename = $uploadData['file_name'];
			$link = $folder_upload.$filename;

			## Extract the zip file ---- start
			$zip = new ZipArchive;
			$res = $zip->open($link);
			if ($res === TRUE)
			{

				// Extract file
				$zip->extractTo($folder_extract);
				$zip->close();

				$this->session->set_flashdata('msg','Upload & Extract successfully.');
			}
			else
			{
				$this->session->set_flashdata('msg','Failed to extract.');
			}
		}
		else
		{
			$this->session->set_flashdata('msg','Failed to upload');
		}

		redirect('tema');
	}
}
