<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_belum_login();
        $this->load->model('M_unit');
    }
	
	public function index()
	{
		$data['row'] = $this->M_unit->get();
		$this->template->load('template', 'product/unit/unit_data', $data);
	}

	public function add()
	{
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null;
		$data = array(
			'page' => 'add',
			'row' => $unit
		);
		$this->template->load('template', 'product/unit/unit_add', $data);
	}

	public function edit($id)
	{
		$query = $this->M_unit->get($id);
		if ($query->num_rows() > 0) {
			$unit = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $unit
			);
			$this->template->load('template', 'product/unit/unit_add', $data);
		} else {
			echo "<script>
			alert('Data tidak ditemukan!');
		</script>";
		echo "<script>
            window.location='".site_url('unit')."';
        </script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->M_unit->add($post);
		}elseif (isset($_POST['edit'])) {
			$this->M_unit->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        }
        
		redirect('unit');
		
	}

	public function delete($id)
	{
		$this->M_unit->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus!');
        }
        redirect('unit');
	}
}
