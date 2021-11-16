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
        $data['title'] = 'Stok Barang Masuk';
        $data['row'] = $this->stok_m->get_stok_in();
        $this->template->load('template', 'transaksi/stok_in/stok_in_data', $data);
    }
    
    public function stock_in_add()
    {
        $barang = $this->barang_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        $data = [
            'title' => 'Tambah Stok Barang Masuk',
            'barang' => $barang, 
            'supplier' => $supplier
        ];
        $this->template->load('template', 'transaksi/stok_in/stok_in_form', $data);
    }

    public function stock_in_del()
    {
        $stok_id = $this->uri->segment(4);
        $barang_id = $this->uri->segment(5);
        $qty = $this->stok_m->get($stok_id)->row()->qty;
        $data = ['qty' => $qty, 'barang_id' => $barang_id];
        $this->barang_m->update_stok_out($data);
        $this->stok_m->del($stok_id);

        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stok-in berhasil dihapus');
        }
        redirect('stok/in');
    }

    public function stock_out_index()
    {
        $data['title'] = 'Stok Barang Keluar';
        $data['row'] = $this->stok_m->get_stok_out();
        $this->template->load('template', 'transaksi/stok_out/stok_out_data',$data);
    }
    
    public function stock_out_add()
    {
        $barang = $this->barang_m->get()->result();
        $data = [
            'title' => 'Tambah Stok Barang Keluar',
            'barang' => $barang
        ];
        $this->template->load('template', 'transaksi/stok_out/stok_out_form', $data);
    }

    public function stock_out_del()
    {
        $stok_id = $this->uri->segment(4);
        $barang_id = $this->uri->segment(5);
        $qty = $this->stok_m->get($stok_id)->row()->qty;
        $data = ['qty' => $qty, 'barang_id' => $barang_id];
        $this->barang_m->update_stok_in($data);
        $this->stok_m->del($stok_id);

        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stok-out berhasil dihapus');
        }
        redirect('stok/out');
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['in_add'])) {
            $this->stok_m->add_stok_in($post);
            $this->barang_m->update_stok_in($post);

            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stok-in berhasil disimpan');
            }
            redirect('stok/in');
        } else if(isset($_POST['out_add'])) {
            $qty_stok = $this->barang_m->get()->row()->stok;
            if ($post['qty'] > $qty_stok) {
                $this->session->set_flashdata('error', 'Qty melebihi stok barang');
                redirect('stok/out/add');
            } else {
                $this->stok_m->add_stok_out($post);
                $this->barang_m->update_stok_out($post);
    
                if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data Stok-out berhasil disimpan');
                }
                redirect('stok/out');
            }
            
        }
    }
}