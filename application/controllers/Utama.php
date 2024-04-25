<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

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

	public function index()
	{
		if($this->session->userdata("status") == "online"){
			$this->load->view('head');
			$data = [
				"count_tugas" => $this->mtugas->count(),
				"count_materi" => $this->mmateri->count(),
				"count_guru" => $this->mguru->count()
			];
			$this->load->view('body', $data);
		} else {
			$this->load->view("utama");
		}
	}
}
