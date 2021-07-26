<?php
class M_dashboard extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->ses_id = $this->session->userdata('ses_id');
    }

   

    public function grafik_pkp()
    {
        $this->db->select('*');
        $this->db->where('tbl_nilai_pkp.id_user', $this->ses_id);
        //$this->db->from('tbl_nilai_pkp');
        return $this->db->get('tbl_nilai_pkp')->row();

    
    }

    
   
}
