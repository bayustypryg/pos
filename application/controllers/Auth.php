<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function login()
	{
        cek_udah_login();
		$this->load->view('login');
    }
    
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('m_user');
            $query = $this->m_user->login($post);
            if ($query->num_rows() > 0) {
                $row =$query->row();
                $params = array(
                    'userid' => $row->user_id,
                    'level'  => $row->level
                );
                $this->session->set_userdata($params);
                echo "<script>
                        alert('Login Berhasil!');
                        window.location='".site_url('dashboard')."';
                </script>";
            }else {
                echo "<script>
                        alert('Login Gagal! Username atau Password Salah!');
                        window.location='".site_url('auth/login')."';
                </script>";
            
            }  
        }
    }

    public function logout()
    {
        $params = array('userid', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
