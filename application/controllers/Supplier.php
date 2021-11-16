<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('supplier_m');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['title'] = 'Supplier';
		$data['row'] = $this->supplier_m->get();
		$this->template->load('template', 'supplier/supplier_data', $data);
	}
	
	public function add()
	{
		$supplier = new stdClass();
		$supplier->supplier_id = null;
		$supplier->supplier_nama = null;
		$supplier->kontak_person = null;
		$supplier->alamat = null;
		$supplier->telepon = null;
		$supplier->keterangan = null;
		$data = array(
			'title' => 'Tambah Supplier',
			'page' => 'tambah',
			'row' => $supplier
		);
		$this->template->load('template', 'supplier/supplier_form',$data);
		
	}
	
	public function edit($id)
	{
		$query = $this->supplier_m->get($id);
		$this->supplier_m->get($id);
		if ($query->num_rows() > 0) {
			$supplier = $query->row();
			$data = array(
				'title' => 'Edit Supplier',
				'page' => 'edit',
				'row' => $supplier
			);
			$this->template->load('template', 'supplier/supplier_form',$data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('supplier')."';</script>";
		}
	}
	
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['tambah'])) {
			$this->supplier_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->supplier_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			echo $this->db->affected_rows();
            echo "<script>alert('Data berhasil disimpan')</script>";
        }
        echo "<script>window.location='".site_url('supplier')."'</script>";
	}

	public function del($id)
	{
        $this->supplier_m->del($id);
		$error = $this->db->error();
		if($error['code'] != 0){
			echo "<script>alert('Data tidak bisa dihapus (sudah berelasi)')</script>";
		} else {
            echo "<script>alert('Data berhasil dihapus')</script>";
        }
        echo "<script>window.location='".site_url('supplier')."'</script>";
    }
}
