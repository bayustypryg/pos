<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        cek_belum_login();
        check_admin();
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }
    

	
	public function index()
	{
        $data['row'] = $this->M_user->get();
		$this->template->load('template', 'user/user_data', $data);
    }
    
    public function add()
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('confpassword', 'Konfirmasi Password', 'required|min_length[5]|matches[password]', array('matches' => '%s Harus Sama Dengan Password Sebelumnya'));
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s Tidak Boleh Kosong!');
        $this->form_validation->set_message('min_length', '%s Minimal 5 Karakter!');
        $this->form_validation->set_message('is_unique', '%s Ini Sudah Terpakai! Silahkan Ganti!');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'user/user_add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->M_user->add($post);
            if ($this->db->affected_rows()) {
                echo "<script>
                    alert('Data Berhasil disimpan!')
                </script>";

                echo "<script>
                window.location='".site_url('user')."';
                </script>";

            }
        }
        
    }

    public function edit($id)
    {
        
        

        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        
        if ($this->input->post('password')) {     
            $this->form_validation->set_rules('password', 'Password', '|min_length[5]');
            $this->form_validation->set_rules('confpassword', 'Konfirmasi Password', 'min_length[5]|matches[password]');
        }
        
        if ($this->input->post('confpassword')) {
            $this->form_validation->set_rules('confpassword', 'Konfirmasi Password', 'min_length[5]|matches[password]', array('matches' => '%s Harus Sama Dengan Password Sebelumnya'));
        }
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s Tidak Boleh Kosong!');
        $this->form_validation->set_message('min_length', '%s Minimal 5 Karakter!');
        $this->form_validation->set_message('is_unique', '%s Ini Sudah Terpakai! Silahkan Ganti!');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->M_user->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'user/user_edit', $data);
            }else {
                echo "<script>alert('Data tidak ditemukan!');";
                echo "window.location='".site_url('user')."';</script>";
            }
            
        } else {
            $post = $this->input->post(null, TRUE);
            $this->M_user->edit($post);
            if ($this->db->affected_rows()) {
                echo "<script>
                    alert('Data Berhasil disimpan!')
                </script>";

                echo "<script>
                window.location='".site_url('user')."';
                </script>";

            }
        }
        
    }

    public function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} ini sudah dipakai! Silahkan ganti!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function del()
    {
        $id = $this->input->post('user_id');
        $this->M_user->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
            </script>";
        }
        echo "<script>
            window.location='".site_url('user')."';
        </script>";

    }
}
