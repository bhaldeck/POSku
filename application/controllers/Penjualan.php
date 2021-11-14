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
		if(isset($_POST['proses_bayar'])) {
			$penjualan_id = $this->penjualan_m->add_sale($data);
			$cart = $this->penjualan_m->get_cart()->result();
			$row = [];
			foreach($cart as $c => $value) {
				array_push($row, array(
					'penjualan_id' => $penjualan_id,
					'barang_id' => $value->barang_id,
					'barang_id' => $value->barang_id,
					'harga' => $value->cart_harga,
					'qty' => $value->qty,
					'barang_disc' => $value->barang_disc,
					'total' => $value->total
					)
				);
			}
			$this->penjualan_m->add_sale_detail($row);
			$this->penjualan_m->del_cart(['user_id' => $this->session->userdata('userid')]);

			if($this->db->affected_rows() > 0) {
				$params = array("success" => true, "penjualan_id" => $penjualan_id);
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
		if(isset($_POST['batal_bayar'])) {
			$this->penjualan_m->del_cart(['user_id' => $this->session->userdata('userid')]);
		} else {
			$cart_id = $this->input->post('cart_id');
			$this->penjualan_m->del_cart(['cart_id' => $cart_id]);
		}

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($id)
	{
		$data = array(
			'sale' => $this->penjualan_m->get_sale($id)->row(),
			'sale_detail' => $this->penjualan_m->get_sale_detail($id)->result()
		);
		$this->load->view('transaksi/penjualan/nota_print', $data);
	}

	public function del($id)
	{
		$this->penjualan_m->del_sale($id);
		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data penjualan berhasil dihapus');
			window.location='".site_url('laporan/penjualan')."';</script>";
		} else {
			echo "<script>alert('Data penjualan gagal dihapus');
			window.location='".site_url('laporan/penjualan')."';</script>";
		}

	}
}
