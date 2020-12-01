<?php

class Testing extends CI_Controller {

	public function index()
	{
		$this->load->view('testing', $data);
	}

	public function send()
	{

		$curl = curl_init();
		$token = "KYJCV1NXyydd7EgwRdVA"; //token lu
		$pesan = $this->input->post('pesan');
		$target = $this->input->post('target');
		//nomer target gunakan 628
		//gunakan koma " , " untuk multi nomer 6283xxxx,6281xxxxx

		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array(
				"Authorization: $token",
			)
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_URL, "https://fonnte.com/api/send_message.php");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);
}
}
