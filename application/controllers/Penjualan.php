<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['penjualan_m', 'pelanggan_m']);
        $this->load->library('form_validation');
    }

	public function index()
	{
		$pelanggan = $this->pelanggan_m->get()->result();
		$data = array(
			'pelanggan' => $pelanggan,
			'invoice' => $this->penjualan_m->invoice_no()
		);
		$this->template->load('template', 'transaksi/penjualan/penjualan_form', $data);
	}
}
