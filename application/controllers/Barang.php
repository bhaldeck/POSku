<?php defined('BASEPATH') OR exit('No direct script access allowed');

class barang extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model(['barang_m','kategori_m','satuan_m']);
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
    }

	public function index()
	{
        $data['row'] = $this->barang_m->get();
		$this->template->load('template', 'produk/barang/barang_data', $data);
    }
    
    public function add0()
	{
        $this->rule();
        
		$data = array (
			'kategori' => $this->kategori_m->get(),
			'satuan' => $this->satuan_m->get(),
		);
		
        if ($this->form_validation->run() == FALSE) {
                $this->template->load('template', 'produk/barang/barang_add',$data);
            } else {
                $post = $this->input->post(null, TRUE);
                $this->barang_m->add($post);
                if($this->db->affected_rows() > 0) {
                    echo "<script>alert('Data berhasil disimpan')</script>";
                }
                echo "<script>window.location='".site_url('barang')."'</script>";
            }
    }

    public function edit0($id)
	{
        $this->rules();
        if ($this->form_validation->run() == FALSE) {
            $query = $this->barang_m->get($id);
            if ($query->num_rows() > 0) {
                //$query_kat = $this->kategori_m->get();
                $barang = $query->row();
                $data = array(
                    'page' => 'edit',
                    'barang' => $barang,
                    'kategori' => $this->kategori_m->get(),
                    'satuan' => $this->satuan_m->get()
                );
                $this->template->load('template','produk/barang/barang_edit',$data);
            } else {
                echo "<script>alert('Data tidak ditemukan');";
                echo "window.location='".site_url('barang')."';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->barang_m->edit($post);

            if($this->db->affected_rows() > 0) {
                echo "<script>alert('Perubahan data berhasil disimpan')</script>";
            }
            echo "<script>window.location='".site_url('barang')."'</script>";
        }
        
    }
    
    public function add()
	{
        $barang = new stdClass();
		$barang->barang_id = null;
		$barang->barcode = null;
		$barang->barang_nama = null; 
		$barang->kategori_id = null;
		$barang->satuan_id = null;
		$barang->harga = null;
		$data = array (
            'page' => 'tambah',
            'barang' => $barang,
			'kategori' => $this->kategori_m->get(),
			'satuan' => $this->satuan_m->get(),
		);
		$this->template->load('template', 'produk/barang/barang_form',$data);
    }
    
    public function edit($id)
	{
        // tulis error handling disini

        // end of set rules error
        $query = $this->barang_m->get($id);
        if ($query->num_rows() > 0) {
            //$query_kat = $this->kategori_m->get();
            $barang = $query->row();
            $data = array(
                'page' => 'edit',
                'barang' => $barang,
                'kategori' => $this->kategori_m->get(),
                'satuan' => $this->satuan_m->get()
            );
            $this->template->load('template','produk/barang/barang_form',$data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('barang')."';</script>";
        }
    }

	public function process($id=null)
	{ 
        $config['upload_path']      = './uploads/produk';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']         = 2048;
        $config['file_name']        = 'brg-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
		if(isset($_POST['tambah'])) {
            $this->rule();
            if ($this->form_validation->run() == FALSE) {
                    $this->add();
                } else {
                    if(@$_FILES['gambar']['name'] != null){
                        if ($this->upload->do_upload('gambar')) {
                            $post['gambar'] = $this->upload->data('file_name');
                            $this->barang_m->add($post);
                            if($this->db->affected_rows() > 0) {
                                echo "<script>alert('Data berhasil disimpan')</script>";
                                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                            }
                            echo "<script>window.location='".site_url('barang')."'</script>";
                        } else {
                            $error = $this->upload->display_errors();
                            $this->session->set_flashdata('error', $error);
                            redirect('barang/add');
                        }
                    } else {
                        $post['gambar'] = null;
                        $this->barang_m->add($post);
                        if($this->db->affected_rows() > 0) {
                            echo "<script>alert('Data berhasil disimpan')</script>";
                        }
                        echo "<script>window.location='".site_url('barang')."'</script>";
                    }
                    
                }
		} else if(isset($_POST['edit'])) {
            $this->rules();
            if ($this->form_validation->run() == FALSE) {
                $this->edit($id);
            } else {
                if(@$_FILES['gambar']['name'] != null){
                    if ($this->upload->do_upload('gambar')) {

                        $barang = $this->barang_m->get($post['barang_id'])->row();
                        if($barang->gambar != null){
                            $target_file = './uploads/produk/'.$barang->gambar;
                            unlink($target_file);
                        }

                        $post['gambar'] = $this->upload->data('file_name');
                        $this->barang_m->edit($post);
                        if($this->db->affected_rows() > 0) {
                            echo "<script>alert('Data berhasil disimpan')</script>";
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        echo "<script>window.location='".site_url('barang')."'</script>";
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('barang');
                    }
                } else {
                    $post['gambar'] = null;
                    $this->barang_m->edit($post);
                    if($this->db->affected_rows() > 0) {
                        echo "<script>alert('Data berhasil disimpan')</script>";
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    echo "<script>window.location='".site_url('barang')."'</script>";
                }
            }
		}
	}
        
    public function del($id)
	{
        $barang = $this->barang_m->get($id)->row();
        if($barang->gambar != null){
            $target_file = './uploads/produk/'.$barang->gambar;
            unlink($target_file);
        }
        
        $this->barang_m->del($id);
        
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('barang');
    }

    public function rule()
    {
        $this->form_validation->set_rules('barcode', 'barcode', 'trim|required|alpha_numeric|min_length[3]|is_unique[barang.barcode]');
        $this->form_validation->set_rules('nama_brg', 'Nama Barang', 'trim|required|alpha_numeric_spaces|is_unique[barang.barang_nama]');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
        $this->form_validation->set_rules('satuan_id', 'Satuan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|is_natural');

        $this->form_validation->set_message('required', '%s harus diisi.');
        $this->form_validation->set_message('min_length', '{field} minimal harus berisi {param} karakter.');
        $this->form_validation->set_message('is_unique', '{field} sudah ada. Silahkan ganti');
        $this->form_validation->set_message('alpha_numeric_spaces', '{field} tidak boleh diisi selain huruf');
        $this->form_validation->set_message('alpha_numeric', '{field} tidak boleh diisi selain angka dan huruf');
        $this->form_validation->set_message('is_natural', '{field} harus diisi angka');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    }

    public function rules()
    {
        $this->form_validation->set_rules('barcode', 'Barcode', 'trim|required|alpha_numeric|min_length[3]|callback_barcode_check');
        $this->form_validation->set_rules('nama_brg', 'Nama Barang', 'trim|required|alpha_numeric_spaces|callback_barangnama_check');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
        $this->form_validation->set_rules('satuan_id', 'Satuan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|is_natural');
        
        $this->form_validation->set_message('required', '%s harus diisi.');
        $this->form_validation->set_message('min_length', '{field} minimal harus berisi {param} karakter.');
        $this->form_validation->set_message('alpha_numeric_spaces', '{field} tidak boleh diisi selain huruf');
        $this->form_validation->set_message('alpha_numeric', '{field} tidak boleh diisi selain angka dan huruf');
        $this->form_validation->set_message('is_natural', '{field} harus diisi angka');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    }

    public function barangnama_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM barang WHERE barang_nama = '$post[nama_brg]' AND barang_id != '$post[barang_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('barangnama_check', "{field} $post[nama_brg] ini sudah ada. Silahkan ganti");
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function barcode_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM barang WHERE barcode = '$post[barcode]' AND barang_id != '$post[barang_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('barcode_check', "{field} $post[barcode] ini sudah ada. Silahkan ganti");
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
