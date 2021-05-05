<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_belum_login();
        $this->load->model('M_sale', 'sale');
        
    }

    public function sale()
    {
        $data['row'] = $this->sale->get_sale();
        $this->template->load('template', 'report/sale_report', $data);
    }

    public function sale_product($sale_id = null)
    {
        $detail = $this->sale->get_sale_detail($sale_id)->result();
        echo json_encode($detail);
    }

}