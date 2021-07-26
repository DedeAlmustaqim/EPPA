<?php
defined('BASEPATH') or exit('No direct script access allowed');

class master extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		/*if (($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '2') || ($this->session->userdata('akses') == '3'))  {
		} else {
			redirect('login');
		}	*/

		$this->load->library('template');
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->load->model('m_master');
		$this->load->library('datatables');
	}


	public function index()
	{
		show_404();
		//var_dump($data);
	}

	public function setting_bln()
	{
		$this->load->library('template');
		$data['judul'] = "Master - Setting Bulan";
		$this->template->konten('master/setting_bln', $data);
	}

	public function json_bln()
	{
		$data = $this->m_master->json_bln();
		header('Content-Type: application/json');
		echo $data;
	}

	private function verif_hapus_jadwal()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		return $this->form_validation->run();
	}
	public function hapus_jadwal()
	{
		if ($this->verif_hapus_jadwal()) {
			$id = $this->input->post('id');
			$data = array(
				'tgl_awal'        => null,
				'tgl_akhir'        => null,

			);
			$this->m_master->update_tbl_bln($data, $id);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	private function verif_jadwal()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('IdBln', 'IdBln', 'trim|required');
		$this->form_validation->set_rules('TglAwal', 'TglAwal', 'trim|required');
		$this->form_validation->set_rules('TglAkhir', 'TglAkhir', 'trim|required');
		$this->form_validation->set_rules('WktInputAwal', 'WktInputAwal', 'trim|required');
		$this->form_validation->set_rules('WktInputAkhir', 'WktInputAkhir', 'trim|required');
		return $this->form_validation->run();
	}
	public function jadwal()
	{
		if ($this->verif_jadwal()) {
			$id = $this->input->post('IdBln');
			$TglAwal = $this->input->post('TglAwal');
			$TglAkhir = $this->input->post('TglAkhir');
			$WktInputAwal = $this->input->post('WktInputAwal');
			$WktInputAkhir = $this->input->post('WktInputAkhir');
			$data = array(
				'tgl_awal'        => $TglAwal." ".$WktInputAwal,
				'tgl_akhir'        => $TglAkhir." ".$WktInputAkhir,

			);
			$this->m_master->update_tbl_bln($data, $id);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	private function verif_jadwal_verif()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('IdBlnVerif', 'IdBlnVerif', 'trim|required');
		$this->form_validation->set_rules('TglAwalVerif', 'TglAwalVerif', 'trim|required');
		$this->form_validation->set_rules('TglAkhirVerif', 'TglAkhirVerif', 'trim|required');
		$this->form_validation->set_rules('WktVerifAwal', 'WktVerifAwal', 'trim|required');
		$this->form_validation->set_rules('WktVerifAkhir', 'WktVerifAkhir', 'trim|required');
		return $this->form_validation->run();
	}
	public function jadwal_verif()
	{
		if ($this->verif_jadwal_verif()) {
			$id = $this->input->post('IdBlnVerif');
			$TglAwal = $this->input->post('TglAwalVerif');
			$TglAkhir = $this->input->post('TglAkhirVerif');
			$WktInputAwal = $this->input->post('WktVerifAwal');
			$WktInputAkhir = $this->input->post('WktVerifAkhir');
			$data = array(
				'tgl_awal_verif'        => $TglAwal." ".$WktInputAwal,
				'tgl_akhir_verif'        => $TglAkhir." ".$WktInputAkhir,

			);
			$this->m_master->update_tbl_bln($data, $id);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	public function clear_pegawai()
	{
		$akses = $this->session->userdata('akses');
		if ($akses != 2) {
			redirect('dashboard');
		}

		$this->db->truncate('tbl_user');
		
		

		redirect('admin/dashboard');
	}
}
