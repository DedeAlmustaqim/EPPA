<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_pkp extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();

		if (($this->session->userdata('akses') == '2')||($this->session->userdata('akses') == '3')) {
		} else {
			redirect('login');
		}
		$this->load->library('template');
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->load->model('m_pkp');
		$this->load->model('m_master');
		$this->load->library('datatables');

		$this->id_user = $this->session->userdata('ses_id');
		$this->ta = $this->session->userdata('ta');
	}


	public function index()
	{
		$this->load->library('template');
		$data['judul'] = "FORMULIR PENILAIAN CAPAIAN KINERJA BULANAN PEGAWAI NEGERI SIPIL";


		$this->template->konten('nilai_pkp', $data);
		//var_dump($data);
	}

	public function get_peg($id)
	{

		$this->load->library('template');
		$data['judul'] = "Nilai PKP Bulanan";
		$row =  $this->m_master->info_profil($id);
		$data['nama'] = $row->nama;
		$data['nm_jbt'] = $row->nm_jbt;
		$data['username'] = $row->username;
		$data['email'] = $row->email;
		$this->template->konten('nilai_pkp_peg', $data);
		//var_dump($data);
	}

	public function json_pkp_peg()
	{

		$data = $this->m_pkp->json_pkp_peg();
		header('Content-Type: application/json');
		echo $data;
	}

	public function json_pkp_tabel_peg($bln, $id)
	{

		//$id = $this->uri->segment(3);
		$data = $this->m_pkp->json_pkp_tabel_peg($bln, $id);
		header('Content-Type: application/json');
		echo $data;
	}

	private function cek_verif_keg()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'trim|required');

		return $this->form_validation->run();
	}
	public function verif_keg()
	{
		if ($this->cek_verif_keg()) {
			$id = $this->input->post('id');
			$data = array(
				'stts_keg' => 1
			);
			$this->m_pkp->update_keg($data, $id);
		} else {
			show_404();
		}
	}

	private function cek_unverif_keg()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'trim|required');

		return $this->form_validation->run();
	}
	public function unverif_keg()
	{
		if ($this->cek_unverif_keg()) {
			$id = $this->input->post('id');
			$data = array(
				'stts_keg' => 0
			);
			$this->m_pkp->update_keg($data, $id);
		} else {
			show_404();
		}
	}

	public function get_stts_pkp($id)
	{
		$row = $this->m_pkp->cek_stts_pkp($id);
		$jmlh_keg = $row->jmlh_keg;
		$count_keg = $row->count_keg;

		if ($jmlh_keg == $count_keg) {
			$stts = 1;
		} else {
			$stts = 0;
		}
		$data = array(
			'stts' => $stts,
			
		);

		header('Content-Type: application/json');
		echo json_encode($data);
	}
}
