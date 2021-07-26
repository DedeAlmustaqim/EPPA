<?php
class M_pkp extends CI_Model
{


    function __construct()
    {
        parent::__construct();
        $this->ses_id = $this->session->userdata('ses_id');
        $this->ta = $this->session->userdata('ta');
    }



    public function json_pkp($id_bln)
    {
        $this->datatables->select('tbl_bln.id_bln, 
        tbl_bln.nm_bln, 
        tbl_pkp.id_pkp, 
        tbl_pkp.id_user, 
        tbl_pkp.nilai_pkp, 
        tbl_pkp.stts_pkp, 
       
        tbl_indikator.id_indikator, 
        tbl_indikator.indikator, 
        tbl_indikator.stts_indikator, 
        tbl_indikator.jmlh_keg, 
        tbl_indikator.nilai as nilai_indikator');
        //$this->datatables->select('sum(tbl_indikator.nilai)/count(tbl_indikator.id_indikator) as nilai_pkp');
        $this->datatables->select('DATE_FORMAT(tgl_awal, "%d-%m -%Y") as tgl1');
        $this->datatables->select('DATE_FORMAT(tgl_akhir, "%d-%m -%Y") as tgl2');
        $this->datatables->select('case when tgl_awal < CURRENT_TIMESTAMP() AND CURRENT_TIMESTAMP()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->datatables->join('tbl_bln', 'tbl_pkp.id_bln = tbl_bln.id_bln', 'left');
        $this->datatables->join('tbl_indikator', 'tbl_pkp.id_pkp = tbl_indikator.id_pkp', 'left');
        $this->datatables->where('tbl_pkp.id_user', $this->ses_id);
        $this->datatables->where('tbl_pkp.tahun', $this->ta);

        if ($id_bln == 0) {
        } else {
            $this->datatables->where('tbl_pkp.id_bln', $id_bln);
        }

        $this->db->order_by('tbl_indikator.urut', 'asc');
        $this->datatables->from('tbl_pkp');
        return $this->datatables->generate();
    }

    public function json_pkp_tabel_peg($id_bln, $id)
    {
        $this->datatables->select('tbl_bln.id_bln, 
        tbl_bln.nm_bln, 
        tbl_pkp.id_pkp, 
        tbl_pkp.stts_pkp, 
        tbl_pkp.id_user, 
        tbl_pkp.nilai_pkp, 
       
        tbl_indikator.id_indikator, 
        tbl_indikator.indikator, 
        tbl_indikator.stts_indikator, 
        tbl_indikator.jmlh_keg, 
        tbl_indikator.nilai as nilai_indikator');
        //$this->datatables->select('sum(tbl_indikator.nilai)/count(tbl_indikator.id_indikator) as nilai_pkp');
        $this->datatables->select('DATE_FORMAT(tgl_awal, "%d-%m -%Y") as tgl1');
        $this->datatables->select('DATE_FORMAT(tgl_akhir, "%d-%m -%Y") as tgl2');
        $this->datatables->select('case when tgl_awal < CURRENT_TIMESTAMP() AND CURRENT_TIMESTAMP()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->datatables->join('tbl_bln', 'tbl_pkp.id_bln = tbl_bln.id_bln', 'left');
        $this->datatables->join('tbl_indikator', 'tbl_pkp.id_pkp = tbl_indikator.id_pkp', 'left');
        $this->datatables->where('tbl_pkp.id_user', $id);
        $this->datatables->where('tbl_pkp.tahun', $this->ta);

        if ($id_bln == 0) {
        } else {
            $this->datatables->where('tbl_pkp.id_bln', $id_bln);
        }

        $this->db->order_by('tbl_indikator.urut', 'asc');
        $this->datatables->from('tbl_pkp');
        return $this->datatables->generate();
    }

    public function json_keg($id)
    {
        $this->datatables->select('*');
        $this->datatables->select('case when tgl_awal_verif < CURRENT_TIMESTAMP() AND CURRENT_TIMESTAMP()  < tgl_akhir_verif then "1" else "0"
        end as kunci_verif');
        $this->datatables->select('case when tgl_awal < CURRENT_TIMESTAMP() AND CURRENT_TIMESTAMP()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->datatables->where('tbl_keg.id_indikator', $id);
        $this->datatables->join('tbl_bln', 'tbl_keg.id_bln = tbl_bln.id_bln', 'left');

        $this->db->order_by('tbl_keg.urut_keg', 'asc');
        $this->datatables->from('tbl_keg');
        return $this->datatables->generate();
    }

    public function json_pkp_peg()
    {
        $this->datatables->select('tbl_user.nama, 
        tbl_user.urut_user,
        tbl_nilai_pkp.jan, 
        tbl_nilai_pkp.feb, 
        tbl_nilai_pkp.mar, 
        tbl_nilai_pkp.apr, 
        tbl_nilai_pkp.mei, 
        tbl_nilai_pkp.jun, 
        tbl_nilai_pkp.jul, 
        tbl_nilai_pkp.ags, 
        tbl_nilai_pkp.sep, 
        tbl_nilai_pkp.okt, 
        tbl_nilai_pkp.nov, 
        tbl_nilai_pkp.des, 
        tbl_user.id_user');

        $this->datatables->from('tbl_user');
        if ($this->ses_id == 2) {
            $this->db->where('tbl_user.id_penilai', $this->ses_id);
        }
        $this->datatables->join('tbl_nilai_pkp', 'tbl_user.id_user = tbl_nilai_pkp.id_user', 'left');
        //$this->db->group_by('tbl_user.nama');
        return $this->datatables->generate();
    }




    public function insert_indikator($data)
    {
        return $this->db->insert('tbl_indikator', $data);
    }

    function update_indikator($data, $id_indikator)
    {
        $this->db->where('id_indikator', $id_indikator);
        $result = $this->db->update('tbl_indikator', $data);
        return $result;
    }

    function update_pkp($data, $id)
    {
        $this->db->where('id_pkp', $id);
        $result = $this->db->update('tbl_pkp', $data);
        return $result;
    }

    function update_nilai_pkp($data2)
    {
        $this->db->where('id_user', $this->ses_id);
        $result = $this->db->update('tbl_nilai_pkp', $data2);
        return $result;
    }

    public function insert_keg($data)
    {
        return $this->db->insert('tbl_keg', $data);
    }

    function update_keg($data, $id)
    {
        $this->db->where('id_keg', $id);
        $result = $this->db->update('tbl_keg', $data);
        return $result;
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
        $this->datatables->select('case when tgl_awal < CURRENT_TIMESTAMP() AND CURRENT_TIMESTAMP()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->datatables->join('tbl_bln', 'tbl_pkp.id_bln = tbl_bln.id_bln', 'left');
        $this->datatables->join('tbl_user', 'tbl_pkp.id_user = tbl_user.id_user', 'left');
        $this->datatables->where('tbl_pkp.id_user', $id);
        $this->datatables->where('tbl_pkp.tahun', $this->ta);

        $this->db->order_by('tbl_bln.id_bln', 'asc');
        $this->datatables->from('tbl_pkp');
        return $this->datatables->generate();
    }

    public function json_get_keg($id)
    {
        $this->db->select('*');
        $this->db->where('tbl_keg.id_keg', $id);
        $this->db->from('tbl_keg');
        return $this->db->get('tbl_user')->row();
    }


    public function get_bln($bln)
    {
        $this->datatables->select('*');
        $this->datatables->from('tbl_bln');
        $this->datatables->where('tbl_bln.id_bln', $bln);
        return $this->db->get('tbl_bln')->row();
    }

    public function get_indikator_row($id)
    {
        $this->datatables->select('*');
        $this->datatables->from('tbl_indikator');
        $this->datatables->where('tbl_indikator.id_indikator', $id);
        return $this->db->get('tbl_indikator')->row();
    }

    public function get_indikator($id)
    {
        $this->datatables->select('*');
        $this->datatables->from('tbl_indikator');
        //$this->datatables->join('tbl_keg', 'tbl_keg.id_indikator = tbl_keg.id_indikator', 'left');

        $this->datatables->where('tbl_indikator.id_pkp', $id);
        return $this->db->get('tbl_indikator')->result_array();
    }





    public function get_keg($id)
    {
        $this->db->select('*');
        $this->db->where('tbl_keg.id_indikator', $id);
        return $this->db->get('tbl_keg')->result_array();
    }

    function cek_stts_pkp($id)
    {
        $this->db->select('
        sum(tbl_keg.stts_keg) as count_keg,
        count(tbl_keg.stts_keg) as jmlh_keg
        ');
        $this->db->join('tbl_indikator', 'tbl_pkp.id_pkp = tbl_indikator.id_pkp', 'left');
        $this->db->join('tbl_keg', 'tbl_indikator.id_indikator = tbl_keg.id_indikator', 'left');
        $this->db->where('tbl_pkp.id_pkp', $id);
        return $this->db->get('tbl_pkp')->row();
    }


    public function get_knc($knc)
    {
        $this->datatables->select('case when tgl_awal < CURRENT_TIMESTAMP() AND CURRENT_TIMESTAMP()  < tgl_akhir then "1" else "0"
        end as kunci_bln');
        $this->db->join('tbl_bln', 'tbl_pkp.id_bln = tbl_bln.id_bln', 'left');

        $this->db->where('tbl_bln.id_bln', $knc);
        $this->db->where('tbl_pkp.tahun', $this->ta);
        //$this->db->from('tbl_pkp');
        return $this->db->get('tbl_pkp')->row();
    }
}
