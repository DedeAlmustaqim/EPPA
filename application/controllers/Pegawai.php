<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		//if (($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '2') )  {
		//} else {
			//show_404();
		//}	

		$this->load->library('template');
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->load->model('m_master');
		$this->load->model('m_pegawai');
		$this->load->library('datatables');
	}


	public function index()
	{
		$this->load->library('template');
		$data['judul'] = "Pegawai";
		$data['jab'] = $this->m_pegawai->jabatan();
		$data['user'] = $this->m_pegawai->user();
		$this->template->konten('pegawai', $data);
	}

	public function clear_pegawai(){
		$this->db->truncate('tbl_user');
		redirect('pegawai');
	}
	public function json_pegawai()
	{
		$data = $this->m_pegawai->json_pegawai();
		header('Content-Type: application/json');
		echo $data;
	}


	private function verif_post_pegawai()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('nip', 'nip', 'trim|required|alpha_numeric|max_length[18]');
		$this->form_validation->set_rules('id_jbt', 'id_jbt', 'trim|required');
		$this->form_validation->set_rules('id_penilai', 'id_penilai', 'trim');
		$this->form_validation->set_rules('penilai', 'penilai', 'trim');
		$this->form_validation->set_rules('pangkat_gol_peg', 'pangkat_gol_peg', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		return $this->form_validation->run();
	}
	public function post_pegawai()
	{
		if ($this->verif_post_pegawai()) {
			$nama = $this->input->post('nama');
			$nip = $this->input->post('nip');
			$id_jbt = $this->input->post('id_jbt');
			$id_penilai = $this->input->post('id_penilai');
			$penilai = $this->input->post('penilai');
			$email = $this->input->post('email');
			$pangkat = $this->input->post('pangkat_gol_peg');

			if ($id_penilai == "") {
				$id_penilai_x = null;
			} else {
				$id_penilai_x = $id_penilai;
			}

			$data = array(
				'id_user'       => random_string('alnum', 25),
				'nama'			=> $nama,
				'username'			=> $nip,
				'password'			=> md5("PNtamianglayang"),
				'id_jbt'			=> $id_jbt,
				'id_penilai'			=> $id_penilai_x,
				'penilai'			=> $penilai,
				'id_akses'			=> 3,
				'email'			=> $email,
				'pangkat_gol'			=> $pangkat,
				'created_at'			=> date('Y-m-d H:i:s'),
			);
			$this->m_pegawai->insert_peg($data);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	public function get_pegawai($id)
	{
		$row =  $this->m_pegawai->get_pegawai($id);

		$data = array(
			'id_user' => $row->id_user,
			'username' => $row->username,
			'nama' => $row->nama,
			'penilai' => $row->penilai,
			'id_jbt' => $row->id_jbt,
			'id_penilai' => $row->id_penilai,
			'email' => $row->email,
			'pangkat_gol' => $row->pangkat_gol,

		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	private function verif_edit_pegawai()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
		$this->form_validation->set_rules('nama_edit', 'nama_edit', 'trim|required');
		$this->form_validation->set_rules('nip_edit', 'nip_edit', 'trim|required|alpha_numeric|max_length[18]');
		$this->form_validation->set_rules('id_jbt_edit', 'id_jbt_edit', 'trim|required');
		$this->form_validation->set_rules('id_penilai_edit', 'id_penilai_edit', 'trim');
		$this->form_validation->set_rules('penilai_edit', 'penilai_edit', 'trim');
		$this->form_validation->set_rules('pangkat_gol_peg_edit', 'pangkat_gol_peg_edit', 'trim|required');
		$this->form_validation->set_rules('email_edit', 'email_edit', 'trim|required|valid_email');
		return $this->form_validation->run();
	}
	public function edit_pegawai()
	{
		if ($this->verif_edit_pegawai()) {
			$id = $this->input->post('id_user');
			$nama = $this->input->post('nama_edit');
			$nip = $this->input->post('nip_edit');
			$id_jbt = $this->input->post('id_jbt_edit');
			$id_penilai = $this->input->post('id_penilai_edit');
			$penilai = $this->input->post('penilai_edit');
			$email = $this->input->post('email_edit');
			$pangkat = $this->input->post('pangkat_gol_peg_edit');

			if ($id_penilai == "") {
				$id_penilai_x = null;
			} else {
				$id_penilai_x = $id_penilai;
			}

			$data = array(
				'nama'			=> $nama,
				'username'			=> $nip,
				'id_jbt'			=> $id_jbt,
				'id_penilai'			=> $id_penilai_x,
				'penilai'			=> $penilai,
				'id_akses'			=> 3,
				'email'			=> $email,
				'pangkat_gol'			=> $pangkat,
				'updated_at'			=> date('Y-m-d H:i:s'),
			);
			$this->m_pegawai->update_peg($data, $id);

			echo json_encode($data < $id);
		} else {
			echo "error";
		}
	}

	private function verif_peg()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		return $this->form_validation->run();
	}
	public function del_peg()
	{
		if ($this->verif_peg()) {
			$id = $this->input->post('id');

			$this->m_pegawai->del_peg($id);
			$this->m_pegawai->del_pkp($id);

			$data = array(
				'id_penilai' => NULL,
			);
			$this->m_pegawai->update_peg_del($data, $id);
		} else {
			echo "error";
		}
	}

	private function verif_reset_pass()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		return $this->form_validation->run();
	}
	public function reset_pass()
	{
		if ($this->verif_reset_pass()) {
			$id = $this->input->post('id');
			$data = array(
				'password'        => md5('PNtamianglayang'),


			);
		
			$this->m_pegawai->update_peg($data, $id);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}
}
