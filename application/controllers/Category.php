<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_belum_login();
        $this->load->model('M_category');
    }
	
	public function index()
	{
		$data['row'] = $this->M_category->get();
		$this->template->load('template', 'product/category/category_data', $data);
	}

	public function add()
	{
		$category = new stdClass();
		$category->category_id = null;
		$category->name = null;
		$data = array(
			'page' => 'add',
			'row' => $category
		);
		$this->template->load('template', 'product/category/category_add', $data);
	}

	public function edit($id)
	{
		$query = $this->M_category->get($id);
		if ($query->num_rows() > 0) {
			$category = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $category
			);
			$this->template->load('template', 'product/category/category_add', $data);
		} else {
			echo "<script>
			alert('Data tidak ditemukan!');
		</script>";
		echo "<script>
            window.location='".site_url('category')."';
        </script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->M_category->add($post);
		}elseif (isset($_POST['edit'])) {
			$this->M_category->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        }
        
		redirect('category');
		
	}

	public function delete($id)
	{
		$this->M_category->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus!');
        }
        redirect('category');
	}
}
