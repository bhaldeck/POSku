<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['penjualan_m', 'pelanggan_m','barang_m']);
        $this->load->library('form_validation');
    }

	public function index()
	{
		$pelanggan = $this->pelanggan_m->get()->result();
		$barang = $this->barang_m->get()->result();
		$data = array(
			'pelanggan' => $pelanggan,
			'barang' => $barang,
			'invoice' => $this->penjualan_m->invoice_no()
		);
		$this->template->load('template', 'transaksi/penjualan/penjualan_form', $data);
	}
	public function process()
	{
		$data = $this->input->post(null, TRUE);
		if(isset($_POST['add_cart'])) {
			$this->penjualan_m->add_cart($data);
		}

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
