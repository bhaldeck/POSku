<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('pelanggan_m');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['title'] = 'Pelanggan';
		$data['row'] = $this->pelanggan_m->get();
		$this->template->load('template', 'pelanggan/pelanggan_data', $data);
	}
	
	public function add()
	{
		$pelanggan = new stdClass();
		$pelanggan->pelanggan_id = null;
		$pelanggan->pelanggan_nama = null;
		$pelanggan->jenis_kel = null;
		$pelanggan->alamat = null;
		$pelanggan->telepon = null;
		$data = array(
			'title' => 'Tambah Pelanggan',
			'page' => 'tambah',
			'row' => $pelanggan
		);
		$this->template->load('template', 'pelanggan/pelanggan_form',$data);
		
	}
	
	public function edit($id)
	{
		$query = $this->pelanggan_m->get($id);
		$this->pelanggan_m->get($id);
		if ($query->num_rows() > 0) {
			$pelanggan = $query->row();
			$data = array(
				'title' => 'Edit Pelanggan',
				'page' => 'edit',
				'row' => $pelanggan
			);
			$this->template->load('template', 'pelanggan/pelanggan_form',$data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('pelanggan')."';</script>";
		}
	}
	
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['tambah'])) {
			$this->pelanggan_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->pelanggan_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil disimpan')</script>";
        }
        echo "<script>window.location='".site_url('pelanggan')."'</script>";
	}

	public function del($id)
	{
        $this->pelanggan_m->del($id);
        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus')</script>";
        }
        echo "<script>window.location='".site_url('pelanggan')."'</script>";
    }
}
