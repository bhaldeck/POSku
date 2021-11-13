<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('penjualan_m','penjualan');
        // $this->load->library('form_validation');
    }

	public function penjualan()
	{
		$data['row'] = $this->penjualan->get_sale();
		$this->template->load('template', 'laporan/laporan_penjualan', $data);
	}
}
