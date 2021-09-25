<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('penjualan_m');
        $this->load->library('form_validation');
    }

	public function index()
	{
		check_not_login();
		$this->template->load('template', 'transaksi/penjualan/penjualan_form');
	}
}
