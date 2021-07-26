<?php
class M_Admin extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->ses_id = $this->session->userdata('ses_id');
        $this->ta = $this->session->userdata('ta');
    }

    public function json_stts_pkp()
    {
        $this->datatables->select('*');
        $this->datatables->join('tbl_user', 'tbl_stts_pkp.id_user = tbl_user.id_user', 'left');
        $this->datatables->from('tbl_stts_pkp');
        $this->db->where('tbl_stts_pkp.tahun', $this->ta);
        return $this->datatables->generate();
    }
    public function json_skor_pkp()
    {
        $this->datatables->select('*');
        $this->datatables->join('tbl_user', 'tbl_skor_pkp.id_user = tbl_user.id_user', 'left');
        $this->datatables->from('tbl_skor_pkp');
        $this->db->where('tbl_skor_pkp.tahun', $this->ta);
        return $this->datatables->generate();
    }
    public function json_nilai_pkp_filter()
    {
        $this->datatables->select('*');
        $this->datatables->join('tbl_user', 'tbl_nilai_pkp.id_user = tbl_user.id_user', 'left');
        $this->datatables->from('tbl_nilai_pkp');
        $this->db->where('tbl_nilai_pkp.tahun', $this->ta);
        return $this->datatables->generate();
    }
    public function json_dokumen_pkp()
    {
        $this->datatables->select('*');
        $this->datatables->join('tbl_user', 'tbl_doc_pkp.id_user = tbl_user.id_user', 'left');
        $this->datatables->from('tbl_doc_pkp');
        $this->db->where('tbl_doc_pkp.tahun', $this->ta);
        return $this->datatables->generate();
    }
}
