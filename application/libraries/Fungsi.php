<?php

class Fungsi
{
    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('M_user');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->M_user->get($user_id)->row();
        return $user_data;
    }

    function Pdfgenerator($html, $filename, $paper, $orientasi){
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientasi);
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment' => 0));
    }

    public function count_item()
    {
        $this->ci->load->model('M_item');
        return $this->ci->M_item->get()->num_rows();
    }
    public function count_supplier()
    {
        $this->ci->load->model('M_supplier');
        return $this->ci->M_supplier->get()->num_rows();
    }
    public function count_customer()
    {
        $this->ci->load->model('M_customer');
        return $this->ci->M_customer->get()->num_rows();
    }
    public function count_user()
    {
        $this->ci->load->model('M_user');
        return $this->ci->M_user->get()->num_rows();
    }
}
