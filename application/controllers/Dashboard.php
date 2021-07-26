<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('akses') == '3') {
		} else {
			redirect('login');
		}
		$this->load->helper('string');

		$this->load->library('template');
		$this->load->model('m_dashboard');
		$this->load->model('m_master');
		$this->load->library('datatables');

		$this->id_user = $this->session->userdata('ses_id');
		$this->ta = $this->session->userdata('ta');
	}
	public function index()
	{
		$data['judul'] = "Dashboard";
		$row =  $this->m_master->info_profil($this->id_user);
		$data['nama'] = $row->nama;
		$data['nm_jbt'] = $row->nm_jbt;
		$data['username'] = $row->username;
		$data['email'] = $row->email;

		if ($row->img == null) {
			$img_x = "<img src='" . base_url() . "/assets/images/users/no_img.jpg" . "' class='img-circle' width='150'>";
		} else {
			$img_x = "<img src='" . base_url() . "/assets/images/users/" . $row->img . "' class='img-circle' width='150'>";
		}

		$data['img'] = $img_x;
		$data['penilai'] = $row->id_penilai;


		$this->template->konten('dashboard', $data);
		//var_dump($data);
	}

	public function btn_sinkron()
	{

		$id_user = $this->id_user;
		$this->db->where('id_user', $id_user);
		$this->db->where('tahun', $this->ta);
		$q = $this->db->get('tbl_pkp');
		if ($q->num_rows() > 0) {
			echo "1";
		} else {
			echo "0";
		}
	}

	public function sinkron()
	{

		$this->db->where('id_user', $this->id_user);
		$q = $this->db->get('tbl_pkp');

		if ($q->num_rows() > 0) {
			show_404();
		} else {
			$data = array(
				array(
					'id_pkp' => random_string('alnum', 25),
					'id_bln' => '1',
					'id_user' => $this->id_user,
					'tahun' => $this->ta
				),
				array(
					'id_pkp' => random_string('alnum', 25),

					'id_bln' => '2',
					'id_user' => $this->id_user,
					'tahun' => $this->ta
				),
				array(
					'id_pkp' => random_string('alnum', 25),

					'id_bln' => '3',
					'id_user' => $this->id_user,
					'tahun' => $this->ta
				),
				array(
					'id_pkp' => random_string('alnum', 25),

					'id_bln' => '4',
					'id_user' => $this->id_user,
					'tahun' => $this->ta
				),
				array(
					'id_pkp' => random_string('alnum', 25),

					'id_bln' => '5',
					'id_user' => $this->id_user,
					'tahun' => $this->ta
				),
				array(
					'id_pkp' => random_string('alnum', 25),

					'id_bln' => '6',
					'id_user' => $this->id_user,
					'tahun' => $this->ta
				),
				array(
					'id_pkp' => random_string('alnum', 25),

					'id_bln' => '7',
					'id_user' => $this->id_user,
					'tahun' => $this->ta
				),
				array(
					'id_pkp' => random_string('alnum', 25),

					'id_bln' => '8',
					'id_user' => $this->id_user,
					'tahun' => $this->ta
				),
				array(
					'id_pkp' => random_string('alnum', 25),

					'id_bln' => '9',
					'id_user' => $this->id_user,
					'tahun' => $this->ta
				),
				array(
					'id_pkp' => random_string('alnum', 25),

					'id_bln' => '10',
					'id_user' => $this->id_user,
					'tahun' => $this->ta
				),
				array(
					'id_pkp' => random_string('alnum', 25),

					'id_bln' => '11',
					'id_user' => $this->id_user,
					'tahun' => $this->ta
				),
				array(
					'id_pkp' => random_string('alnum', 25),

					'id_bln' => '12',
					'id_user' => $this->id_user,
					'tahun' => $this->ta
				),
			);
			$data2 = array(
				'id_user' => $this->id_user,
				'tahun' => $this->ta

			);
			$this->db->insert_batch('tbl_pkp', $data);
			$this->db->insert('tbl_nilai_pkp', $data2);

			redirect('dashboard');
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

	public function grafik_pkp()
	{
		$row = $this->m_dashboard->grafik_pkp();

		$data = array(
			'jan' => $row->jan,
			'feb' => $row->feb,
			'mar' => $row->mar,
			'apr' => $row->apr,
			'mei' => $row->mei,
			'jun' => $row->jun,
			'jul' => $row->jul,
			'ags' => $row->ags,
			'sep' => $row->sep,
			'okt' => $row->okt,
			'nov' => $row->nov,
			'des' => $row->des,
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function json_skor_pkp()
	{
		$data = $this->m_dashboard->json_skor_pkp($this->id_user);
		header('Content-Type: application/json');
		echo $data;
	}

	public function json_nilai_pkp()
	{
		$data = $this->m_dashboard->json_nilai_pkp($this->id_user);
		header('Content-Type: application/json');
		echo $data;
	}

	public function json_doc_pkp()
	{
		$data = $this->m_dashboard->json_doc_pkp($this->id_user);
		header('Content-Type: application/json');
		echo $data;
	}

	public function jadwal_exp()
	{
		$jan = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as jan FROM tbl_bln WHERE id_bln='1' ")->row();
		$feb = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as feb FROM tbl_bln WHERE id_bln='2' ")->row();
		$mar = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as mar FROM tbl_bln WHERE id_bln='3' ")->row();
		$apr = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as apr FROM tbl_bln WHERE id_bln='4' ")->row();
		$mei = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as mei FROM tbl_bln WHERE id_bln='5' ")->row();
		$jun = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as jun FROM tbl_bln WHERE id_bln='6' ")->row();
		$jul = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as jul FROM tbl_bln WHERE id_bln='7' ")->row();
		$ags = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as ags FROM tbl_bln WHERE id_bln='8' ")->row();
		$sep = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as sep FROM tbl_bln WHERE id_bln='9' ")->row();
		$okt = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as okt FROM tbl_bln WHERE id_bln='10' ")->row();
		$nov = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as nov FROM tbl_bln WHERE id_bln='11' ")->row();
		$des = $this->db->query("SELECT DATE_FORMAT(tgl_akhir, '%Y/%m/%d %H:%i:%s') as des FROM tbl_bln WHERE id_bln='12' ")->row();

		$data = array(
			//belanja operasi
			'jan' => $jan->jan,
			'feb' => $feb->feb,
			'mar' => $mar->mar,
			'apr' => $apr->apr,
			'mei' => $mei->mei,
			'jun' => $jun->jun,
			'jul' => $jul->jul,
			'ags' => $ags->ags,
			'sep' => $sep->sep,
			'okt' => $okt->okt,
			'nov' => $nov->nov,
			'des' => $des->des,
		);

		header('Content-Type: application/json');
		echo json_encode($data);
	}
}
