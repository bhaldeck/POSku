<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['barang_m', 'penjualan_m', 'pelanggan_m']);
        $this->load->library('form_validation');
    }

	public function index()
	{
		$barang = $this->barang_m->get()->result();
		$pelanggan = $this->pelanggan_m->get()->result();
		$data = array(
			'barang' => $barang,
			'pelanggan' => $pelanggan,
			'invoice' => $this->penjualan_m->invoice_no()
		);
		$this->template->load('template', 'transaksi/penjualan/penjualan_form', $data);
	}

	public function barcode_list(){
		// POST data
		$postData = $this->input->post();
	
		// Get data
		$data = $this->barang_m->get_barcode($postData);
	
		echo json_encode($data);
	  }
}
