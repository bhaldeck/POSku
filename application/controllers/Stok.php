<?php defined('BASEPATH') OR exit('No direct script access allowed');

class stok extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->library('form_validation');
        $this->load->model(['barang_m', 'supplier_m', 'stok_m']);
        date_default_timezone_set('Asia/Jakarta');
    }

    public function stock_in_index()
    {
        $this->template->load('template', 'transaksi/stok_in/stok_in_data');
    }
    
    public function stock_in_add()
    {
        $barang = $this->barang_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        $data = ['barang' => $barang, 'supplier' => $supplier];
        $this->template->load('template', 'transaksi/stok_in/stok_in_form', $data);
    }

    public function process()
    {
        if(isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stok_m->add_stok_in($post);
            $this->barang_m->update_stok_in($post);

            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stok-in berhasil disimpan');
            }
            redirect('stok/in');
        }
    }
}