<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pkp extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();

		if (($this->session->userdata('akses') == '3')) {
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

		$row =  $this->m_master->info_profil($this->id_user);
		$data['nama'] = $row->nama;
		$data['nm_jbt'] = $row->nm_jbt;
		$data['username'] = $row->username;
		$data['email'] = $row->email;
		$data['penilai'] = $row->id_penilai;
		$data['pangkat'] = $row->pangkat_gol;
		if ($row->img == null) {
			$img_x = "<img src='" . base_url() . "/assets/images/users/no_img.jpg" . "'  width='100'>";
		} else {
			$img_x = "<img src='" . base_url() . "/assets/images/users/" . $row->img . "'  width='100'>";
		}

		$data['img'] = $img_x;

		if ($row->id_penilai == null) {
			$data['nama_p'] = "-";
			$data['nm_jbt_p'] = "-";
			$data['username_p'] = "-";
			$data['pangkat_p'] = "-";

			$data['img_p'] = "<img src='" . base_url() . "/assets/images/users/no_img.jpg" . "'  width='100'>";;
		} else {
			$row2 =  $this->m_master->penilai($row->id_penilai);
			$data['nama_p'] = $row2->nama;
			$data['nm_jbt_p'] = $row2->nm_jbt;
			$data['username_p'] = $row2->username;
			$data['pangkat_p'] = $row2->pangkat_gol;

			if ($row2->img == null) {
				$img_p = "<img src='" . base_url() . "/assets/images/users/no_img.jpg" . "'  width='100'>";
			} else {
				$img_p = "<img src='" . base_url() . "/assets/images/users/" . $row2->img . "'  width='100'>";
			}

			$data['img_p'] = $img_p;
		}
		$this->template->konten('pkp', $data);
		//var_dump($data);
	}


	public function cetak_pkp()
	{
		$this->load->library('pdfgenerator');
		$filename =  "SKRD";
		$data['cetak'] = "tesss";
		$row =  $this->m_master->info_profil($this->id_user);
		$data['nama'] = $row->nama;
		$data['nm_jbt'] = $row->nm_jbt;
		$data['username'] = $row->username;
		$data['email'] = $row->email;
		$data['penilai'] = $row->id_penilai;

		if ($row->id_penilai == null) {
			$data['nama_p'] = "-";
			$data['nm_jbt_p'] = "-";
			$data['username_p'] = "-";
		} else {
			$row2 =  $this->m_master->penilai($row->id_penilai);
			$data['nama_p'] = $row2->nama;
			$data['nm_jbt_p'] = $row2->nm_jbt;
			$data['username_p'] = $row2->username;
		}
		$filename = $row->nama . "-" . $row->username;
		$html = $this->load->view('laporan/cetak_pkp', $data, true);
		$this->pdfgenerator->generate($html, $filename);
	}

	public function get_sum_nilai_ind($id)
	{
		$SumIndiKeg = $this->db->query("SELECT SUM(nilai_kin_keg) as nilai_kin_sum  FROM tbl_keg WHERE id_indikator='$id' AND tahun='$this->ta' ")->row();
		$CountIndiKeg = $this->db->query("SELECT count(id_indikator) as nilai_kin_count  FROM tbl_keg WHERE id_indikator='$id' AND tahun='$this->ta' ")->row();

		$data = array(
			'nilai_sum' => round($SumIndiKeg->nilai_kin_sum, 2),
			'nilai_count' => round($CountIndiKeg->nilai_kin_count, 2),
		);

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function get_sum_nilai_pkp($id)
	{
		$SumInd = $this->db->query("SELECT SUM(nilai) as nilai  FROM tbl_indikator WHERE id_pkp='$id' AND tahun='$this->ta' ")->row();
		$CountInd = $this->db->query("SELECT count(id_pkp) as nilai_count  FROM tbl_indikator WHERE id_pkp='$id' AND tahun='$this->ta' ")->row();

		$data = array(
			'nilai' => round($SumInd->nilai, 2) / round($CountInd->nilai_count, 2),

		);

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function get_verif_pkp($id)
	{
		$SumKeg = $this->db->query("SELECT SUM(stts_keg) as stts_keg  FROM tbl_keg WHERE id_pkp='$id' AND tahun='$this->ta' ")->row();
		$CountKeg = $this->db->query("SELECT count(id_pkp) as id_pkp  FROM tbl_keg WHERE id_pkp='$id' AND tahun='$this->ta' ")->row();
		if ($SumKeg->stts_keg != $CountKeg->id_pkp) {
			$verif = 0;
		}else if($SumKeg->stts_keg==$CountKeg->id_pkp){
			$verif = 1;
		}

		$data = array(
			'verif' => $verif,

		);

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function keg($bln, $idpkp, $id)
	{
		$this->load->library('template');

		$row =  $this->m_pkp->get_knc($bln);
		if ($row->kunci_bln == 0) {
			redirect('pkp');
		}
		$getbln =  $this->m_pkp->get_bln($bln);
		$getindikator =  $this->m_pkp->get_indikator_row($id);
		$data = array(
			'judul' => "KEGIATAN TUGAS JABATAN",
			'bln' => $getbln->nm_bln,
			'indikator' => $getindikator->indikator,
			'kunci_bln' => $row->kunci_bln
		);
		$this->template->konten('kegiatan', $data);
		//var_dump($data);
	}
	public function json_pkp($id_bln)
	{

		$data = $this->m_pkp->json_pkp($id_bln);
		header('Content-Type: application/json');
		echo $data;
	}

	public function json_keg($id)
	{
		$data = $this->m_pkp->json_keg($id);
		header('Content-Type: application/json');
		echo $data;
	}

	public function json_get_keg($id, $id_ind)
	{
		$getindikator =  $this->m_pkp->get_indikator_row($id_ind);

		$row = $this->m_pkp->json_get_keg($id);
		$data = array(
			'indikator' => $getindikator->indikator,
			'id_keg' => $row->id_keg,
			'keg' => $row->keg,
			'ak_target' => $row->ak_target,
			'output_target' => $row->output_target,
			'satuan_target' => $row->satuan_target,
			'mutu_target' => $row->mutu_target,
			'ak_real' => $row->ak_real,
			'output_real' => $row->output_real,
			'satuan_real' => $row->satuan_real,
			'mutu_real' => $row->mutu_real,
			'mutu_kuant_kual' => $row->mutu_kuant_kual,
			'nilai_kin_keg' => $row->nilai_kin_keg,
		);
		echo json_encode($data);
	}

	private function verif_indikator()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_user', 'id_user', 'trim|required');
		$this->form_validation->set_rules('id_pkp', 'id_pkp', 'trim|required');
		$this->form_validation->set_rules('indikator', 'indikator', 'trim|required');
		return $this->form_validation->run();
	}
	public function tambah_indikator()
	{
		if ($this->verif_indikator()) {
			$id_pkp = $this->input->post('id_pkp');
			$indikator = $this->input->post('indikator');
			$data = array(
				'id_indikator'        => random_string('alnum', 25),
				'id_pkp'        => $id_pkp,
				'indikator'        => $indikator,
				'tahun'        => $this->ta,

			);

			$this->m_pkp->insert_indikator($data);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	//EDIT INDIKATOR
	private function verif_edit_indikator()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_indikator', 'id_indikator', 'trim|required');
		$this->form_validation->set_rules('indikator_edit', 'indikator_edit', 'trim|required');
		return $this->form_validation->run();
	}
	public function edit_indikator()
	{
		if ($this->verif_edit_indikator()) {
			$id_indikator = $this->input->post('id_indikator');
			$indikator = $this->input->post('indikator_edit');
			$data = array(
				'indikator'        => $indikator,

			);

			$this->m_pkp->update_indikator($data, $id_indikator);

			echo json_encode($data);
		} else {
			echo "error";
		}
	}

	//TAMBAH KEGIATAN
	private function verif_keg()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_indikator', 'id_indikator', 'trim|required');
		$this->form_validation->set_rules('id_bln', 'id_bln', 'trim|required');
		$this->form_validation->set_rules('keg', 'keg', 'trim|required');
		$this->form_validation->set_rules('id_pkp_keg', 'id_pkp_keg', 'trim|required');
		$this->form_validation->set_rules('ak_target', 'ak_target', 'trim|required');
		$this->form_validation->set_rules('output_target', 'output_target', 'trim|required');
		$this->form_validation->set_rules('satuan_target', 'satuan_target', 'trim|required');
		$this->form_validation->set_rules('ak_real', 'ak_real', 'trim|required');
		$this->form_validation->set_rules('output_real', 'output_real', 'trim|required');
		$this->form_validation->set_rules('satuan_real', 'satuan_real', 'trim|required');
		$this->form_validation->set_rules('mutu_real', 'mutu_real', 'trim|required');
		$this->form_validation->set_rules('mutu_target', 'mutu_target', 'trim|required');
		$this->form_validation->set_rules('mutu_kuant_kual', 'mutu_kuant_kual', 'trim|required');
		$this->form_validation->set_rules('nilai_kin', 'nilai_kin', 'trim|required');
		return $this->form_validation->run();
	}
	public function tambah_keg()
	{

		if ($this->verif_keg()) {
			$id_indikator = $this->input->post('id_indikator');
			$id_bln = $this->input->post('id_bln');
			$keg = $this->input->post('keg');
			$id_pkp = $this->input->post('id_pkp_keg');
			$ak_target = $this->input->post('ak_target');
			$output_target = $this->input->post('output_target');
			$satuan_target = $this->input->post('satuan_target');
			$ak_real = $this->input->post('ak_real');
			$output_real = $this->input->post('output_real');
			$satuan_real = $this->input->post('satuan_real');
			$mutu_real = $this->input->post('mutu_real');
			$mutu_target = $this->input->post('mutu_target');
			$mutu_kuant_kual = $this->input->post('mutu_kuant_kual');
			$nilai_kin = $this->input->post('nilai_kin');


			$data = array(
				'id_keg'        => random_string('alnum', 25),
				'id_indikator'        => $id_indikator,
				'id_bln'        => $id_bln,
				'id_pkp'        => $id_pkp,
				'tahun'        => $this->ta,
				'keg'        => $keg,
				'ak_target'        => $ak_target,
				'output_target'        => $output_target,
				'satuan_target'        => $satuan_target,
				'ak_real'        => $ak_real,
				'output_real'        => $output_real,
				'satuan_real'        => $satuan_real,
				'mutu_real'        => $mutu_real,
				'mutu_target'        => $mutu_target,
				'mutu_kuant_kual'        => $mutu_kuant_kual,
				'nilai_kin_keg'        => $nilai_kin,
			);

			$this->m_pkp->insert_keg($data);
			$array = array(
				'success'   => true,
			);
			echo json_encode($array);
		} else {
			$array = array(
				'error'   => true,
			);
			echo json_encode($array);
		}
	}

	///EDIT KEG
	private function verif_edit_keg()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_keg', 'id_keg', 'trim|required');
		$this->form_validation->set_rules('keg_edit', 'keg_edit', 'trim|required');
		$this->form_validation->set_rules('id_pkp_keg_edit', 'id_pkp_keg_edit', 'trim|required');
		$this->form_validation->set_rules('ak_target_edit', 'ak_target_edit', 'trim|required');
		$this->form_validation->set_rules('output_target_edit', 'output_target_edit', 'trim|required');
		$this->form_validation->set_rules('satuan_target_edit', 'satuan_target_edit', 'trim|required');
		$this->form_validation->set_rules('ak_real_edit', 'ak_real_edit', 'trim|required');
		$this->form_validation->set_rules('output_real_edit', 'output_real_edit', 'trim|required');
		$this->form_validation->set_rules('satuan_real_edit', 'satuan_real_edit', 'trim|required');
		$this->form_validation->set_rules('mutu_real_edit', 'mutu_real_edit', 'trim|required');
		$this->form_validation->set_rules('mutu_target_edit', 'mutu_target_edit', 'trim|required');
		$this->form_validation->set_rules('mutu_kuant_kual_edit', 'mutu_kuant_kual_edit', 'trim|required');
		$this->form_validation->set_rules('nilai_kin_edit', 'nilai_kin_edit', 'trim|required');
		return $this->form_validation->run();
	}
	public function edit_keg()
	{

		if ($this->verif_edit_keg()) {
			$id = $this->input->post('id_keg');
			$id_pkp = $this->input->post('id_pkp_keg_edit');
			$keg = $this->input->post('keg_edit');
			$ak_target = $this->input->post('ak_target_edit');
			$output_target = $this->input->post('output_target_edit');
			$satuan_target = $this->input->post('satuan_target_edit');
			$ak_real = $this->input->post('ak_real_edit');
			$output_real = $this->input->post('output_real_edit');
			$satuan_real = $this->input->post('satuan_real_edit');
			$mutu_real = $this->input->post('mutu_real_edit');
			$mutu_target = $this->input->post('mutu_target_edit');
			$mutu_kuant_kual = $this->input->post('mutu_kuant_kual_edit');
			$nilai_kin = $this->input->post('nilai_kin_edit');


			$data = array(
				'tahun'        => $this->ta,
				'keg'        => $keg,
				'id_pkp'        => $id_pkp,
				'ak_target'        => $ak_target,
				'output_target'        => $output_target,
				'satuan_target'        => $satuan_target,
				'ak_real'        => $ak_real,
				'output_real'        => $output_real,
				'satuan_real'        => $satuan_real,
				'mutu_real'        => $mutu_real,
				'mutu_target'        => $mutu_target,
				'mutu_kuant_kual'        => $mutu_kuant_kual,
				'nilai_kin_keg'        => $nilai_kin,
			);

			$this->m_pkp->update_keg($data, $id);
			$array = array(
				'success'   => true,
			);
			echo json_encode($array);
		} else {
			$array = array(
				'error'   => true,
			);
			echo json_encode($array);
		}
	}


	private function cek_del_keg()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', 'trim|required');

		return $this->form_validation->run();
	}
	public function del_keg()
	{
		if ($this->cek_del_keg()) {
			$id = $this->input->post('id');

			$this->db->where('id_keg', $id);
			$this->db->delete('tbl_keg');
		} else {
			show_404();
		}
	}

	private function cek_del_ind()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_indikator', 'id_indikator', 'trim|required');

		return $this->form_validation->run();
	}
	public function del_ind()
	{
		if ($this->cek_del_ind()) {
			$id = $this->input->post('id_indikator');

			$this->db->where('id_indikator', $id);
			$this->db->delete('tbl_indikator');
		} else {
			show_404();
		}
	}

	public function update_nilai_ind($id)
	{
		$nilai = $this->input->post('NilaiInd');

		$data = array(
			'nilai' => $nilai,
		);
		$this->m_pkp->update_indikator($data, $id);
	}
	public function update_stts_pkp($id)
	{
		$verif = $this->input->post('verif');

		$data = array(
			'stts_pkp' => $verif,
		);
		$this->m_pkp->update_pkp($data, $id);
	}

	public function update_nilai_pkp($id, $idbln)
	{
		$nilai = $this->input->post('NilaiPkp');
		$data = array(
			'nilai_pkp' => $nilai,
			'tahun' => $this->ta,
		);
		if ($idbln == 1) {
			$data2 = array(
				'jan'        => $nilai,
				'tahun' => $this->ta,


			);
		} else if ($idbln == 2) {
			$data2 = array(
				'feb'        => $nilai,
				'tahun' => $this->ta,


			);
		} else if ($idbln == 3) {
			$data2 = array(
				'mar'        => $nilai,
				'tahun' => $this->ta,


			);
		} else if ($idbln == 4) {
			$data2 = array(
				'apr'        => $nilai,
				'tahun' => $this->ta,


			);
		} else if ($idbln == 5) {
			$data2 = array(
				'mei'        => $nilai,
				'tahun' => $this->ta,


			);
		} else if ($idbln == 6) {
			$data2 = array(
				'jun'        => $nilai,
				'tahun' => $this->ta,


			);
		} else if ($idbln == 7) {
			$data2 = array(
				'jul'        => $nilai,
				'tahun' => $this->ta,


			);
		} else if ($idbln == 8) {
			$data2 = array(
				'ags'        => $nilai,
				'tahun' => $this->ta,


			);
		} else if ($idbln == 9) {
			$data2 = array(
				'sep'        => $nilai,
				'tahun' => $this->ta,


			);
		} else if ($idbln == 10) {
			$data2 = array(
				'okt'        => $nilai,
				'tahun' => $this->ta,


			);
		} else if ($idbln == 11) {
			$data2 = array(
				'nov'        => $nilai,
				'tahun' => $this->ta,


			);
		} else if ($idbln == 12) {
			$data2 = array(
				'des'        => $nilai,
				'tahun' => $this->ta,


			);
		}
		$this->m_pkp->update_nilai_pkp($data2);
		$this->m_pkp->update_pkp($data, $id);
	}
}
