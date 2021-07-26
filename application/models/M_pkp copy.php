<?php
class M_pkp extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->ses_id = $this->session->userdata('ses_id');
        $this->ta = $this->session->userdata('ta');
    }

    public function btn_bln()
    {
        $this->datatables->select('*');
        $this->db->select('case when tgl_awal < CURDATE() AND CURDATE()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->datatables->from('tbl_bln');
        return $this->db->get('tbl_bln')->result();
    }

    public function json_pkp($id)
    {
        $this->datatables->select('tbl_pkp.id_bln, 
        tbl_pkp.skor, 
        tbl_pkp.edoc_pkp, 
        tbl_pkp.id_user, 
        tbl_pkp.`status`, 
        tbl_pkp.tahun, 
        tbl_pkp.count_catatan, 
        tbl_pkp.nilai, 
        tbl_bln.id_bln, 
        tbl_bln.nm_bln, 
        tbl_bln.tgl_awal, 
        tbl_bln.tgl_akhir');
        $this->datatables->select('DATE_FORMAT(tgl_awal, "%d-%m -%Y") as tgl1');
        $this->datatables->select('DATE_FORMAT(tgl_akhir, "%d-%m -%Y") as tgl2');
        $this->datatables->select('case when tgl_awal < CURDATE() AND CURDATE()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->datatables->join('tbl_bln', 'tbl_pkp.id_bln = tbl_bln.id_bln', 'left');
        $this->datatables->join('tbl_user', 'tbl_pkp.id_user = tbl_user.id_user', 'left');
        $this->datatables->where('tbl_pkp.id_user',$id);
        $this->datatables->where('tbl_pkp.tahun',$this->ta);

        $this->db->order_by('tbl_bln.id_bln', 'asc');
        $this->datatables->from('tbl_pkp');
        return $this->datatables->generate();
    }

    public function json_get_pkp($id)
    {
        $this->datatables->select('tbl_pkp.id_bln, 
        tbl_pkp.skor, 
        tbl_pkp.edoc_pkp, 
        tbl_pkp.id_user, 
        tbl_pkp.`status`, 
        tbl_pkp.tahun, 
        tbl_pkp.count_catatan, 
        tbl_pkp.nilai, 
        tbl_bln.id_bln, 
        tbl_bln.nm_bln, 
        tbl_bln.tgl_awal, 
        tbl_bln.tgl_akhir');
        $this->datatables->select('DATE_FORMAT(tgl_awal, "%d-%m -%Y") as tgl1');
        $this->datatables->select('DATE_FORMAT(tgl_akhir, "%d-%m -%Y") as tgl2');
        $this->datatables->select('case when tgl_awal < CURDATE() AND CURDATE()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->datatables->join('tbl_bln', 'tbl_pkp.id_bln = tbl_bln.id_bln', 'left');
        $this->datatables->join('tbl_user', 'tbl_pkp.id_user = tbl_user.id_user', 'left');
        $this->datatables->where('tbl_pkp.id_user',$id);
        $this->datatables->where('tbl_pkp.tahun',$this->ta);

        $this->db->order_by('tbl_bln.id_bln', 'asc');
        $this->datatables->from('tbl_pkp');
        return $this->datatables->generate();
    }

    public function json_nilai_pkp()
    {
        $this->datatables->select('tbl_user.nama, 
        tbl_user.id_user, 
        tbl_user.urut_user, 
        tbl_jabatan.nm_jbt, 
        tbl_user.username');
        $this->datatables->join('tbl_jabatan', 'tbl_user.id_jbt = tbl_jabatan.id_jbt', 'left');
        $this->datatables->where('id_penilai', $this->ses_id);
        //$this->datatables->where('tbl_pkp.tahun',$this->ta);

        $this->datatables->from('tbl_user');
        return $this->datatables->generate();
    }

    public function get_json_catatan($idbln, $user)
    {
        $this->datatables->select('*');
        $this->datatables->join('tbl_user', 'tbl_catatan_pkp.id_penulis = tbl_user.id_user', 'left');
        $this->datatables->where('tbl_catatan_pkp.id_bln', $idbln);
        $this->datatables->where('tbl_catatan_pkp.id_user', $user);
        $this->datatables->where('tbl_catatan_pkp.tahun',$this->ta);

        $this->datatables->from('tbl_catatan_pkp');
        return $this->datatables->generate();
    }

    function update($data, $id, $idbln)
    {
        $this->db->where('id_user', $id);
        $this->db->where('id_bln', $idbln);
        $this->datatables->where('tbl_pkp.tahun',$this->ta);
        $result = $this->db->update('tbl_pkp', $data);
        return $result;
    }

    function update_stts($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->datatables->where('tbl_stts_pkp.tahun',$this->ta);

        $result = $this->db->update('tbl_stts_pkp', $data);
        return $result;
    }

    function update_skor($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->datatables->where('tbl_skor_pkp.tahun',$this->ta);

        $result = $this->db->update('tbl_skor_pkp', $data);
        return $result;
    }

    function update_nilai($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->datatables->where('tbl_nilai_pkp.tahun',$this->ta);

        $result = $this->db->update('tbl_nilai_pkp', $data);
        return $result;
    }

    function update_doc($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->datatables->where('tbl_doc_pkp.tahun',$this->ta);

        $result = $this->db->update('tbl_doc_pkp', $data);
        return $result;
    }

    public function insert_catatan($data2)
    {
        return $this->db->insert('tbl_catatan_pkp', $data2);
    }

    public function json_stts_pkp($id)
    {
        $this->datatables->select('*');
        $this->datatables->join('tbl_user', 'tbl_stts_pkp.id_user = tbl_user.id_user', 'left');
        $this->datatables->from('tbl_stts_pkp');
        $this->db->where('tbl_user.id_penilai', $id);
        $this->db->where('tbl_stts_pkp.tahun', $this->ta);
        return $this->datatables->generate();
    }
    public function json_skor_pkp($id)
    {
        $this->datatables->select('*');
        $this->datatables->join('tbl_user', 'tbl_skor_pkp.id_user = tbl_user.id_user', 'left');
        $this->datatables->from('tbl_skor_pkp');
        $this->db->where('tbl_user.id_penilai', $id);
        $this->db->where('tbl_skor_pkp.tahun', $this->ta);

        return $this->datatables->generate();
    }
    public function json_nilai_pkp_filter($id)
    {
        $this->datatables->select('*');
        $this->datatables->join('tbl_user', 'tbl_nilai_pkp.id_user = tbl_user.id_user', 'left');
        $this->datatables->from('tbl_nilai_pkp');
        $this->db->where('tbl_user.id_penilai', $id);
        $this->db->where('tbl_nilai_pkp.tahun', $this->ta);

        return $this->datatables->generate();
    }
    public function json_dokumen_pkp($id)
    {
        $this->datatables->select('*');
        $this->datatables->join('tbl_user', 'tbl_doc_pkp.id_user = tbl_user.id_user', 'left');
        $this->datatables->from('tbl_doc_pkp');
        $this->db->where('tbl_user.id_penilai', $id);
        $this->db->where('tbl_doc_pkp.tahun', $this->ta);

        return $this->datatables->generate();
    }
}
