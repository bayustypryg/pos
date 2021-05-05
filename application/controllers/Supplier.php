<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_belum_login();
        $this->load->model('M_supplier');
    }
	
	public function index()
	{
		$data['row'] = $this->M_supplier->get();
		$this->template->load('template', 'supplier/supplier_data', $data);
	}

	public function add()
	{
		$supplier = new stdClass();
		$supplier->supplier_id = null;
		$supplier->name = null;
		$supplier->phone = null;
		$supplier->address = null;
		$supplier->description = null;
		$data = array(
			'page' => 'add',
			'row' => $supplier
		);
		$this->template->load('template', 'supplier/supplier_add', $data);
	}

	public function edit($id)
	{
		$query = $this->M_supplier->get($id);
		if ($query->num_rows() > 0) {
			$supplier = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $supplier
			);
			$this->template->load('template', 'supplier/supplier_add', $data);
		} else {
			echo "<script>
			alert('Data tidak ditemukan!');
		</script>";
		echo "<script>
            window.location='".site_url('supplier')."';
        </script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->M_supplier->add($post);
		}elseif (isset($_POST['edit'])) {
			$this->M_supplier->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
            echo "<script>
                alert('Data berhasil disimpan');
            </script>";
        }
        echo "<script>
            window.location='".site_url('supplier')."';
        </script>";
	}

	public function delete($id)
	{
		$this->M_supplier->delete($id);
		if ($this->db->affected_rows() > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
            </script>";
        }
        echo "<script>
            window.location='".site_url('supplier')."';
        </script>";
	}
}
