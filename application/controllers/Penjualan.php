<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['penjualan_m', 'pelanggan_m','barang_m']);
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

	function add_to_cart(){
		
		if (isset($_POST['add_cart'])) {
			$id=$this->input->post('barang_id');
			$barang = $this->barang_m->get($id)->row_array();
			$data = array(
				'id'       => $barang['barang_id'],
				'barcode'  => $barang['barcode'],
				'name'     => $barang['barang_nama'],
				'price'    => str_replace(",", "", $this->input->post('harga')),
				'disc'     => $this->input->post('diskon'),
				'qty'      => $this->input->post('qty')
			);
			if(!empty($this->cart->total_items())){
				foreach ($this->cart->contents() as $items){
					$id=$items['id'];
					$qtylama=$items['qty'];
					$rowid=$items['rowid'];
					$kobar=$this->input->post('barang_id');
					$qty=$this->input->post('qty');
					if($id==$kobar){
						$up=array(
							'rowid'=> $rowid,
							'qty'=>$qtylama+$qty
							);
						$this->cart->update($up);
					}else{
						$this->cart->insert($data);
					}
				}
			}else{
				$this->cart->insert($data);
			}
			redirect('penjualan');
		}else{
			echo "Halaman tidak ditemukan";
		}
	}

	function remove(){
		$row_id=$this->uri->segment(3);
		$this->cart->update(array(
			'rowid'      => $row_id,
			'qty'     => 0
			));
		redirect('penjualan');
	}
}

