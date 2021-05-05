<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_belum_login();
        $this->load->model(['M_item', 'M_category', 'M_unit']);
    }
	
	public function index()
	{
		$data['row'] = $this->M_item->get();
		$this->template->load('template', 'product/item/item_data', $data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->item_id = null;
		$item->barcode = null;
		$item->name = null;
        $item->category_id = null;
        $item->price = null;
        
        $category = $this->M_category->get();

        $query_unit = $this->M_unit->get();
        $unit[null] = '- Pilih -';
        foreach ($query_unit->result() as $unt) {
            $unit[$unt->unit_id] = $unt->name;
        }

		$data = array(
			'page' => 'add',
			'row' => $item,
			'category' => $category,
            'unit' => $unit, 
            'selectedunit' =>null,
		);
		$this->template->load('template', 'product/item/item_add', $data);
	}

	public function edit($id)
	{
		$query = $this->M_item->get($id);
		if ($query->num_rows() > 0) {
			$item = $query->row();
            $category = $this->M_category->get();

            $query_unit = $this->M_unit->get();
            $unit[null] = '- Pilih -';
            foreach ($query_unit->result() as $unt) {
                $unit[$unt->unit_id] = $unt->name;
            }
    
            $data = array(
                'page' => 'edit',
                'row' => $item,
                'category' => $category,
                'unit' => $unit, 
                'selectedunit' => $item->unit_id,
    
			);
			$this->template->load('template', 'product/item/item_add', $data);
		} else {
			echo "<script>
			alert('Data tidak ditemukan!');
		</script>";
		echo "<script>
            window.location='".site_url('item')."';
        </script>";
		}
	}

	public function process()
	{
		$config['upload_path']		= './uploads/product/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 2048;
		$config['file_name']		= 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			if ($this->M_item->cek_barcode($post['barcode'])->num_rows() > 0) {
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain!");
				redirect('item/add');
				
			} else {
				

				if (@$_FILES['image']['name'] != null) {
					if ($this->upload->do_upload('image')) {
						$post['image'] = $this->upload->data('file_name');
						$this->M_item->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan!');
						}
						
						redirect('item');
					}else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						
						redirect('item/add');
						
					}
					
				}else {
					$post['image'] = null;
						$this->M_item->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan!');
						}
						
						redirect('item');
				}
				
			}
		}elseif (isset($_POST['edit'])) {
			if ($this->M_item->cek_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain!");
				redirect('item/edit/'.$post['id']);
				
			} else {
				if (@$_FILES['image']['name'] != null) {
					if ($this->upload->do_upload('image')) {

						$item = $this->M_item->get($post['id'])->row();
						if ($item->image != null) {
							$target_file = './uploads/product/'.$item->image;
							unlink($target_file);
						}

						$post['image'] = $this->upload->data('file_name');
						$this->M_item->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan!');
						}
						
						redirect('item');
					}else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						
						redirect('item/add');
						
					}
					
				}else {
					$post['image'] = null;
						$this->M_item->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan!');
						}
						
						redirect('item');
				}
			}
		}


		if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        }
        
		redirect('item');
		
	}

	public function delete($id)
	{
		$item = $this->M_item->get($id)->row();
			if ($item->image != null) {
				$target_file = './uploads/product/'.$item->image;
				unlink($target_file);
			}
			
		$this->M_item->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus!');
        }
        redirect('item');
	}

	public function barcode_qrcode($id)
	{
		$data['row'] = $this->M_item->get($id)->row();
		$this->template->load('template', 'product/item/barcode_qrcode', $data);
	}
	public function barcode_print($id)
	{
		$data['row'] = $this->M_item->get($id)->row();
		$html = $this->load->view('product/item/barcode_print', $data, true);
		$this->fungsi->Pdfgenerator($html, 'barcode-'.$data['row']->barcode, 'A4', 'landscape');
	}
}
