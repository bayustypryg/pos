<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_belum_login();
        $this->load->model('M_customer');
    }
	
	public function index()
	{
		$data['row'] = $this->M_customer->get();
		$this->template->load('template', 'customer/customer_data', $data);
	}

	public function add()
	{
		$customer = new stdClass();
		$customer->customer_id = null;
		$customer->name = null;
		$customer->gender = null;
		$customer->phone = null;
		$customer->address = null;
		$data = array(
			'page' => 'add',
			'row' => $customer
		);
		$this->template->load('template', 'customer/customer_add', $data);
	}

	public function edit($id)
	{
		$query = $this->M_customer->get($id);
		if ($query->num_rows() > 0) {
			$customer = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $customer
			);
			$this->template->load('template', 'customer/customer_add', $data);
		} else {
			echo "<script>
			alert('Data tidak ditemukan!');
		</script>";
		echo "<script>
            window.location='".site_url('customer')."';
        </script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->M_customer->add($post);
		}elseif (isset($_POST['edit'])) {
			$this->M_customer->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
            echo "<script>
                alert('Data berhasil disimpan');
            </script>";
        }
        echo "<script>
            window.location='".site_url('customer')."';
        </script>";
	}

	public function delete($id)
	{
		$this->M_customer->delete($id);
		if ($this->db->affected_rows() > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
            </script>";
        }
        echo "<script>
            window.location='".site_url('customer')."';
        </script>";
	}
}
