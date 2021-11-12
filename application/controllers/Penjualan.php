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
		$cart = $this->penjualan_m->get_cart();
		$data = array(
			'pelanggan' => $pelanggan,
			'barang' => $barang,
			'cart' => $cart,
			'invoice' => $this->penjualan_m->invoice_no()
		);
		$this->template->load('template', 'transaksi/penjualan/penjualan_form', $data);
	}
	public function process()
	{
		$data = $this->input->post(null, TRUE);
		
		if(isset($_POST['add_cart'])) {
			$barang_id = $this->input->post('barang_id');
			$check_cart = $this->penjualan_m->get_cart(['cart.barang_id' => $barang_id])->num_rows();
			if ($check_cart > 0) {
				$this->penjualan_m->update_cart_qty($data);
			} else {
				$this->penjualan_m->add_cart($data);
			}

			if($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}
		if(isset($_POST['edit_cart'])) {
			$this->penjualan_m->edit_cart($data);

			if($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

	}

	function cart_data() {
		$cart = $this->penjualan_m->get_cart();
		$data['cart'] = $cart;
		$this->load->view('transaksi/penjualan/data_keranjang', $data);
	}

	public function cart_del()
	{
		$cart_id = $this->input->post('cart_id');
		$this->penjualan_m->del_cart(['cart_id' => $cart_id]);

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}
}
