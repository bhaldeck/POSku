<?php defined('BASEPATH') OR exit('No direct script access allowed');

class satuan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('satuan_m');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['title'] = 'Satuan';
		$data['row'] = $this->satuan_m->get();
		$this->template->load('template', 'produk/satuan/satuan_data', $data);
	}
	
	public function add()
	{
		$satuan = new stdClass();
		$satuan->satuan_id = null;
		$satuan->satuan_nama = null;
		$data = array(
			'title' => 'Tambah Satuan',
			'page' => 'tambah',
			'row' => $satuan
		);
		$this->template->load('template', 'produk/satuan/satuan_form',$data);
		
	}
	
	public function edit($id)
	{
		$query = $this->satuan_m->get($id);
		$this->satuan_m->get($id);
		if ($query->num_rows() > 0) {
			$satuan = $query->row();
			$data = array(
				'title' => 'Edit Satuan',
				'page' => 'edit',
				'row' => $satuan
			);
			$this->template->load('template', 'produk/satuan/satuan_form',$data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('satuan')."';</script>";
		}
	}
	
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['tambah'])) {
			$this->satuan_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->satuan_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			echo $this->db->affected_rows();
            echo "<script>alert('Data berhasil disimpan')</script>";
        }
        echo "<script>window.location='".site_url('satuan')."'</script>";
	}

	public function del($id)
	{
        $this->satuan_m->del($id);
        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus')</script>";
        }
        echo "<script>window.location='".site_url('satuan')."'</script>";
    }
}
