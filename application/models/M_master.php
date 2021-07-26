<?php
class M_master extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    public function tampil_unit()
    {
        $this->datatables->select('*');
        $this->datatables->from('tbl_unit');
        return $this->db->get('tbl_unit')->result();
    }

    public function json_bln()
    {
        $this->datatables->select('id_bln, nm_bln');
        $this->datatables->select('DATE_FORMAT(tgl_awal, "%Y-%m-%d") as tgl1');
        $this->datatables->select('DATE_FORMAT(tgl_akhir, "%Y-%m-%d") as tgl2');
        $this->datatables->select('DATE_FORMAT(tgl_awal, "%H:%i:%s") as wkt1');
        $this->datatables->select('DATE_FORMAT(tgl_akhir, "%H:%i:%s") as wkt2');
        $this->datatables->select('DATE_FORMAT(tgl_awal_verif, "%Y-%m-%d") as tgl_awal_verif');
        $this->datatables->select('DATE_FORMAT(tgl_akhir_verif, "%Y-%m-%d") as tgl_akhir_verif');
        $this->datatables->select('DATE_FORMAT(tgl_awal_verif, "%H:%i:%s") as pukul_awal_verif');
        $this->datatables->select('DATE_FORMAT(tgl_akhir_verif, "%H:%i:%s") as pukul_akhir_verif');
        $this->datatables->select('case when tgl_awal < CURRENT_TIMESTAMP() AND CURRENT_TIMESTAMP()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->datatables->select('case when tgl_awal_verif < CURRENT_TIMESTAMP() AND CURRENT_TIMESTAMP()  < tgl_akhir_verif then "1" else "0"
        end as kunci_verif');
        $this->datatables->from('tbl_bln');
        return $this->datatables->generate();
    }

    function update_tbl_bln($data, $id)
    {
        $this->db->where('id_bln', $id);
        $result = $this->db->update('tbl_bln', $data);
        return $result;
    }

    function info_profil($id)
	{
        $this->datatables->select('*');
        $this->datatables->join('tbl_jabatan', 'tbl_user.id_jbt = tbl_jabatan.id_jbt', 'left');
        $this->datatables->where('id_user', $id);
        $this->datatables->from('tbl_user');
        return $this->db->get('tbl_user')->row();
	}

    function penilai($id)
	{
        $this->datatables->select('*');
        $this->datatables->join('tbl_jabatan', 'tbl_user.id_jbt = tbl_jabatan.id_jbt', 'left');
        $this->datatables->where('id_user', $id);
        $this->datatables->from('tbl_user');
        return $this->db->get('tbl_user')->row();
	}

    
}
