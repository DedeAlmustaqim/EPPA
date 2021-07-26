<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Profil extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('akses') == '3') {
		} else {
			redirect('admin/dashboard');
		}
		$this->load->library('template');
		$this->load->model('m_master');
		$this->load->model('m_pegawai');
		$this->load->library('datatables');

		$this->id_user = $this->session->userdata('ses_id');
		$this->ta = $this->session->userdata('ta');
	}
	public function index()
	{

		$row =  $this->m_master->info_profil($this->id_user);
		$data = array(
			'judul' =>  "Profil",
			'id_user' => $row->id_user,
			'username' => $row->username,
			'penilai' => $row->penilai,
			'id_penilai' => $row->id_penilai,
			'nama' => $row->nama,
			'email' => $row->email,
			'id_jbt' => $row->id_jbt,
			'nm_jbt' => $row->nm_jbt,
			'img' => $row->img,
			'jab'	=> $this->m_pegawai->jabatan()

		);

		if ($row->id_penilai == null) {
			$data['nama_p'] = "-";
		} else {
			$row2 =  $this->m_master->penilai($row->id_penilai);
			$data['nama_p'] = $row2->nama;
		}
		$this->template->konten('profil', $data);
		//var_dump($data);
	}

	public function img_pf()
	{

		$this->load->helper(['form', 'string']);
		$id      	= $this->input->post('id_user_img', true);
		$edoc = $_FILES['img_pf']['name'];

		$config['upload_path']          = 'assets/images/users';
		$config['allowed_types']        = 'png|jpg|jpeg';
		$x = explode(".", $edoc);
		$ext = strtolower(end($x));
		$config['file_name'] = $id . "img." . $ext;
		$config['overwrite']            = true;
		$config['max_size']             = 2048; // 1MB
		$edoc_name = $config['file_name'];
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config); // Load konfigurasi uploadnya  

		if (!$this->upload->do_upload('img_pf')) {

			show_404();
		} else {
			$data = array('img_pf' => $this->upload->data());
			$data = array(

				'img'    		=> $edoc_name,

			);


			$this->m_pegawai->update_peg($data, $id);

			redirect('profil');
		}
	}

	private function verif_pf_pegawai()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
		$this->form_validation->set_rules('nama_pf', 'nama_pf', 'trim|required');
		$this->form_validation->set_rules('nip_pf', 'nip_pf', 'trim|required|alpha_numeric|max_length[18]');
		$this->form_validation->set_rules('id_jbt_pf', 'id_jbt_pf', 'trim|required');
		$this->form_validation->set_rules('id_penilai_pf', 'id_penilai_pf', 'trim');
		$this->form_validation->set_rules('penilai_pf', 'penilai_pf', 'trim');
		$this->form_validation->set_rules('email_pf', 'email_pf', 'trim|required|valid_email');
		return $this->form_validation->run();
	}
	public function update_pf()
	{
		if ($this->verif_pf_pegawai()) {
			$id = $this->input->post('id_user');
			$nama = $this->input->post('nama_pf');
			$nip = $this->input->post('nip_pf');
			$id_jbt = $this->input->post('id_jbt_pf');
			$id_penilai = $this->input->post('id_penilai_pf');
			$penilai = $this->input->post('penilai_pf');
			$email = $this->input->post('email_pf');

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
				'updated_at'			=> date('Y-m-d H:i:s'),
			);
			$this->m_pegawai->update_peg($data, $id);

			redirect('profil');
		} else {
			redirect('profil');
		}
	}


	private function cek_ubah_pass()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_user_pass', 'id_user_pass', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('pass', 'pass', 'trim|required');
		$this->form_validation->set_rules('pass2', 'pass2', 'trim|required|matches[pass]|min_length[8]');

		return $this->form_validation->run();
	}
	public function ubah_pass()
	{
		if ($this->cek_ubah_pass()) {
			$id = $this->input->post('id_user_pass');
			$pass = $this->input->post('pass');


			$data = array(
				'password'			=> md5($pass),

			);
			$this->m_pegawai->update_peg($data, $id);

			echo json_encode($data);
		} else {
			redirect('profil');
		}
	}
}
