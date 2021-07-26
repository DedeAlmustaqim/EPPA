<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('Captcha');
    }

    function index()
    {
        if ($this->session->userdata('masuk', true)) {
            redirect('dashboard');
        }
        $options = array(
            'img_path' => './captcha/', #folder captcha yg sudah dibuat tadi
            'img_url' => base_url('captcha'), #ini arahnya juga ke folder captcha
            'img_width' => '176', #lebar image captcha
            'img_height' => '45', #tinggi image captcha
            'expiration' => 7200, #waktu expired
            'font_path' => FCPATH . 'assets/font/coolvetica.ttf', #load font jika mau ganti fontnya
            'pool' => '0123456789', #tipe captcha (angka/huruf, atau kombinasi dari keduanya)

            # atur warna captcha-nya di sini ya.. gunakan kode RGB
            'colors' => array(
                'background' => array(242, 242, 242),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );
        $cap = create_captcha($options);
        $data['image'] = $cap['image'];
        $this->session->set_userdata('mycaptcha', $cap['word']);
        $data['word'] = $this->session->userdata('mycaptcha');
        $data['judul'] = "Login";
        //$data['captcha'] = $this->recaptcha->getWidget();
        //$data['script_captcha'] = $this->recaptcha->getScriptTag();
        $this->load->view('login', $data);
    }

    private function validasi_login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        return $this->form_validation->run();
    }
    function auth()
    {
        $captcha = $this->input->post('captcha_kode'); #mengambil value inputan pengguna
		$word = $this->session->userdata('mycaptcha'); #mengambil value captcha
		if (isset($captcha)) { #cek variabel $captcha kosong/tidak
			if (strtoupper($captcha) == strtoupper($word)) { #proses pencocokan captcha
				if ($this->validasi_login()) {
                    $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
                    $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);
                    $ta = $this->input->post('ta');

                    $cek_admin = $this->login_model->auth_admin($username, $password);

                    if ($cek_admin->num_rows() > 0) { //jika login sebagai dosen
                        $data = $cek_admin->row_array();
                        $this->db->where('id_user', $data['id_user']);
                        $this->db->update('admin', array('last_login' => date('Y-m-d H:i:s')));
                        $this->session->set_userdata('masuk', true);
                        if ($data['id_akses'] == '1') { //Akses admin
                            $this->session->set_userdata('akses', '1');
                            $this->session->set_userdata('hak_akses', 'Super Administrator');
                            $this->session->set_userdata('ses_id', $data['id_user']);
                            $this->session->set_userdata('ses_user', $data['username']);
                            $this->session->set_userdata('ses_nm', $data['nama']);
                            $this->session->set_userdata('ta', $ta);
                            redirect('admin/dashboard');
                        } else if ($data['id_akses'] == '2') { //
                            $this->session->set_userdata('akses', '2');
                            $this->session->set_userdata('hak_akses', 'Administrator');
                            $this->session->set_userdata('ses_id', $data['id_user']);
                            $this->session->set_userdata('ses_user', $data['username']);
                            $this->session->set_userdata('ses_nm', $data['nama']);
                            $this->session->set_userdata('ta', $ta);

                            redirect('admin/dashboard');
                        } 
                    } else {
                        $cek_user = $this->login_model->auth_user($username, $password);
                        if ($cek_user->num_rows() > 0) {
                            $data = $cek_user->row_array();
                            $this->db->where('id_user', $data['id_user']);
                            $this->db->update('tbl_user', array('last_login' => date('Y-m-d H:i:s')));
                            $this->session->set_userdata('akses', '3');
                            $this->session->set_userdata('hak_akses', 'User');
                            $this->session->set_userdata('ses_id', $data['id_user']);
                            $this->session->set_userdata('ses_id_unit', $data['id_unit']);
                            $this->session->set_userdata('ses_nm_unit', $data['nm_unit']);
                            $this->session->set_userdata('ses_user', $data['username']);
                            $this->session->set_userdata('ses_nm', $data['nama']);
                            $this->session->set_userdata('ta', $ta);

                            echo $this->session->set_flashdata('msg', 'Selamat Datang');
                            redirect('dashboard');
                        } else {
                            $this->session->set_flashdata('no_user', 'Username / Password Salah ');
                            redirect('login');
                        }
                    }  
                }
			} else {
				$this->session->set_flashdata('cap_error', 'Kode Captcha Salah ');
				redirect('login');
			}
		}
    }

    function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('login');
        redirect($url);
    }
}
