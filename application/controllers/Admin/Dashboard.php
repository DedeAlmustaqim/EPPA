<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if (($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '2') ) {
		} else {
			redirect('login');
		}
		$this->load->library('template');
		$this->load->model('m_admin');
		$this->load->library('datatables');

		$this->id_user = $this->session->userdata('ses_id');
		$this->ta = $this->session->userdata('ta');
	}
	public function index()
	{
		$data['judul'] = "Dashboard";
		$this->template->konten('admin/dashboard', $data);
		//var_dump($data);
	}

	public function json_nilai_pkp($filter)
	{

		if ($filter == 1) {
			$data = $this->m_admin->json_stts_pkp();
			header('Content-Type: application/json');
			echo $data;
		} else  if($filter==2){
			$data = $this->m_admin->json_skor_pkp();
			header('Content-Type: application/json');
			echo $data;
		} else  if($filter==3){
			$data = $this->m_admin->json_nilai_pkp_filter();
			header('Content-Type: application/json');
			echo $data;
		} else  if($filter==4){
			$data = $this->m_admin->json_dokumen_pkp();
			header('Content-Type: application/json');
			echo $data;
		}
	}

	function clear_data()
	{
		$this->db->truncate('tbl_pkp');
		$this->db->truncate('tbl_stts_pkp');
		$this->db->truncate('tbl_skor_pkp');
		$this->db->truncate('tbl_nilai_pkp');
		$this->db->truncate('tbl_doc_pkp');
		redirect('dashboard');
	}
	
	
}
