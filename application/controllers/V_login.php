<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("mmateri");
		$this->load->model("mmapel");
		$this->load->model("mguru");
		$this->load->model("mtugas");	
		$this->load->model("mrombel");
		$this->load->model("mjurusan");
	   //  $this->load->model("mjadwal");
	} 
    
    public function log() {
       
        if($this->session->userdata("status") == "online"){
			$this->load->view('head');
			$data = [
				"count_tugas" => $this->mtugas->count(),
				"count_materi" => $this->mmateri->count(),
				"count_guru" => $this->mguru->count()
			];
			$this->load->view('body', $data);
		} else {
			$this->load->view("login2");
		}
    }
}
