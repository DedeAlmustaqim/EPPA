<?php
class M_pegawai extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->ses_id = $this->session->userdata('ses_id');
    }

   

    public function json_pegawai()
    {
        $this->datatables->select('tbl_user.username, 
        tbl_user.id_user, 
        tbl_user.nama, 
        tbl_user.penilai, 
        tbl_user.pangkat_gol, 
        tbl_user.img, 
        tbl_jabatan.no_urut_jbt,
        tbl_jabatan.nm_jbt');
        $this->datatables->join('tbl_jabatan', 'tbl_user.id_jbt = tbl_jabatan.id_jbt', 'left');
        $this->db->order_by('tbl_jabatan.id_jbt', 'asc');
        $this->datatables->from('tbl_user');
        return $this->datatables->generate();
    }

    function jabatan()
    {
        $this->datatables->select('*');
        $this->datatables->from('tbl_jabatan');
        return $this->db->get('tbl_jabatan')->result();
    }
    function user()
    {
        $this->datatables->select('*');
        $this->datatables->from('tbl_user');
        return $this->db->get('tbl_user')->result();
    }

    function insert_peg($data){
        return $this->db->insert('tbl_user', $data);
    }

    function get_pegawai($id)
	{
        $this->datatables->select('*');
        $this->datatables->join('tbl_jabatan', 'tbl_user.id_jbt = tbl_jabatan.id_jbt', 'left');
        $this->datatables->where('id_user', $id);
        $this->datatables->from('tbl_user');
        return $this->db->get('tbl_user')->row();
	}

    function update_peg($data, $id)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->update('tbl_user', $data);
        return $result;
    }

    function update_peg_del($data, $id)
    {
        $this->db->where('id_penilai', $id);
        $result = $this->db->update('tbl_user', $data);
        return $result;
    }

    function del_peg($id)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->delete('tbl_user');
        return $result;
    }
    function del_pkp($id)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->delete('tbl_pkp');
        return $result;
    }
}
