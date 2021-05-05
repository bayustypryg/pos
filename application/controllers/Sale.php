<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_belum_login();
        $this->load->model('M_sale');
        $this->load->model(['M_customer', 'M_item']);
        
    }

    public function index()
    {
        $customer = $this->M_customer->get()->result();
        $item = $this->M_item->get()->result();
        $cart = $this->M_sale->get_cart();
        $data = array(
            'customer' => $customer,
            'item' => $item,
            'cart' => $cart,
            'invoice' => $this->M_sale->invoice_no(),
        );   
        $this->template->load('template', 'transaksi/sale/sale_form', $data);
    }

    public function get_item()
    {
        $barcode = $this->input->post('barcode');
        $item = $this->M_item->get_barcode($barcode)->row();
        if ($this->db->affected_rows() > 0) {
            $params = array("success" => true, "item" => $item);
        }else {
            $params = array("success" => false);
        }
        echo json_encode($params);
    }

    public function process()
    {
        $data = $this->input->post(null, TRUE);

        if (isset($_POST['add_cart'])) {

            $item_id = $this->input->post('item_id');
            $check_cart = $this->M_sale->get_cart(['t_cart.item_id' => $item_id])->num_rows();
            if ($check_cart > 0) {
                $this->M_sale->update_cart_qty($data);
            }else {
                $this->M_sale->add_cart($data);
            }

            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            }else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if(isset($_POST['edit_cart'])) {
            $this->M_sale->edit_cart($data);
            
            if ($this->db->affected_rows() > 0) {
                $params = array("success" => true);
            }else {
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['process_payment'])) {
            $sale_id = $this->M_sale->add_sale($data);
            $cart = $this->M_sale->get_cart()->result();
            $row = [];
            foreach($cart as $c => $value) {
                array_push($row, array(
                    'sale_id' => $sale_id,
                    'item_id' => $value->item_id,
                    'price' => $value->price,
                    'qty' => $value->qty,
                    'discount_item' => $value->discount_item,
                    'total' => $value->total,
                    )
                );
            }
            $this->M_sale->add_sale_detail($row);
            $this->M_sale->del_cart(['user_id' => $this->session->userdata('userid')]);
                
                if ($this->db->affected_rows() > 0) {
                    $params = array("success" => true, "sale_id" => $sale_id);
                }else {
                    $params = array("success" => false);
                }
                echo json_encode($params);
            }
        }


    function cart_data(){
        $cart = $this->M_sale->get_cart();
        $data['cart'] = $cart;
        $this->load->view('transaksi/sale/cart_data', $data);
    }

    public function cart_del()
    {
        if (isset($_POST['cancel_payment'])) {
            $this->M_sale->del_cart(['user_id' => $this->session->userdata('userid')]);
        } else {
            $cart_id = $this->input->post('cart_id');
            $this->M_sale->del_cart(['cart_id' => $cart_id]);
        }

        if ($this->db->affected_rows() > 0) {
            $params = array("success" => true);
        }else {
            $params = array("success" => false);
        }
        echo json_encode($params);
    }

    public function cetak($id)
    {
        $data = array(
            'sale' => $this->M_sale->get_sale($id)->row(),
            'sale_detail' => $this->M_sale->get_sale_detail($id)->result(),
        );
        $this->load->view('transaksi/sale/struk_print', $data);
    }

    public function del($id)
    {
        $this->M_sale->del_sale($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data penjualan berhasil dihapus');
            window.location='".site_url('report/sale')."'</script>";
        }else {
            echo "<script>alert('Data penjualan gagal dihapus');
            window.location='".site_url('report/sale')."'</script>";
        }
    }
}