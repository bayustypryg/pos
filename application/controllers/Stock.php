<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_belum_login();
        $this->load->model(['M_item', 'M_supplier', 'M_stock']);
        
    }

    public function stock_in_data()
    {
        $data['row'] = $this->M_stock->get_stock_in()->result();
        $this->template->load('template', 'transaksi/stock_in/stock_in_data', $data);
    }

    public function stock_in_add()
    {
        $item = $this->M_item->get()->result();
        $supplier = $this->M_supplier->get()->result();
        $data = ['item' => $item, 'supplier' => $supplier];
        $this->template->load('template', 'transaksi/stock_in/stock_in_add', $data);
    }

    public function stock_in_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->M_stock->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->M_item->update_stock_out($data);
        $this->M_stock->del($stock_id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock-in berhasil dihapus');
        }
        redirect('stock/in');
    }

    public function process()
    {
        if (isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->M_stock->add_stock_in($post);
            $this->M_item->update_stock_in($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock-in berhasil disimpan');
            }
            redirect('stock/in');
        } else if (isset($_POST['out_add'])) {
            $post = $this->input->post(null, TRUE);
            $row_item = $this->M_item->get($this->input->post('item_id'))->row();
            if ($row_item->stock < $this->input->post('qty')) {
                $this->session->set_flashdata('error', 'Qty melebihi stock barang!!');
                redirect('stock/out/add');
            } else {
                $this->M_stock->add_stock_out($post);
                $this->M_item->update_stock_out($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data Stock-in berhasil disimpan');
                }
                redirect('stock/out');
            }
        }
    }

    public function stock_out_data()
    {
        $data['row'] = $this->M_stock->get_stock_out()->result();
        $this->template->load('template', 'transaksi/stock_out/stock_out_data', $data);
    }

    public function stock_out_add()
    {
        $item = $this->M_item->get()->result();
        $data = ['item' => $item];
        $this->template->load('template', 'transaksi/stock_out/stock_out_add', $data);
    }

    public function stock_out_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->M_stock->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->M_item->update_stock_in($data);
        $this->M_stock->del($stock_id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock-out berhasil dihapus');
        }
        redirect('stock/out');
    }
}