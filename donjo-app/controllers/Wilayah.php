<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('wilayah_model');
	}

	public function list_dusun()
	{
		$data = $this->wilayah_model->list_wilayah();
		echo json_encode($data);
	}

	public function list_rw($dusun = '')
	{
		$data = $this->wilayah_model->list_wilayah($dusun);
		echo json_encode($data);
	}

	public function list_rt($dusun = '', $rw = '-')
	{
		$data = $this->wilayah_model->list_wilayah($dusun, $rw);
		echo json_encode($data);
	}

	/*
	 * -----------------------------------------------------------------------------------------------------
	 * Susun ulang afa28
	 */

	public function index()
	{
		$this->load->view('header', $this->_header);
		$this->load->view('nav');
		$this->load->view('wilayah/data', $data);
		$this->load->view('footer');
	}

	public function data($id = 0)
	{
		$data = array();

		foreach ($this->wilayah_model->get_data() as $key => $val)
		{
			$sebutan = ucwords($this->setting->sebutan_dusun);

			// Button Lainnya (Dropdown)
			$lainnya = [
				['wilayah/ubah', 'Lokasi Kantor '.$sebutan, 'fa-map-pin'],
				['wilayah/ubah', 'Peta Wilayah '.$sebutan, 'fa-map-o']
			];


			$baris = [];
			$baris[] = '<td class="text-center">'.($key + 1).'</td>';
			$baris[] = '<td nowrap>'.
										ubah('wilayah/ubah').'&nbsp'.
										hapus('wilayah/hapus').'&nbsp'.
										lainnya($lainnya, 'Peta').'&nbsp'.
								 '</td>';
			$baris[] = '<td>'.$val['dusun'].'</td>';
			$baris[] = '<td>'.$val['rw'].'</td>';
			$baris[] = '<td class="text-center">'.$val['rt'].'</td>';
			$baris[] = '<td class="text-center">'.$val['id_kepala'].'</td>';
			$baris[] = '<td class="text-center">'.$val['id_kepala'].'</td>';
			$baris[] = '<td class="text-center">'.$val['id_kepala'].'</td>';
			$baris[] = '<td class="text-center">'.$val['id_kepala'].'</td>';
			$baris[] = '<td class="text-center">'.$val['id_kepala'].'</td>';

			$data[] = $baris;
		}

		echo json_encode($data);
	}
}
