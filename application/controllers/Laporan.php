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
        $this->load->model('pelanggan_m');
        $this->load->library('pagination');

        if(isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if(isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }

        $config['base_url'] = site_url('laporan/penjualan');
        $config['total_rows'] = $this->penjualan->get_sale_pagination()->num_rows();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['customer'] = $this->pelanggan_m->get()->result();
		$data['row'] = $this->penjualan->get_sale_pagination($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $data['title'] = 'Laporan Penjualan';
		$this->template->load('template', 'laporan/laporan_penjualan', $data);
	}

    public function produk_penjualan($sale_id = null)
    {
        $detail = $this->penjualan->get_sale_detail($sale_id)->result();
        echo json_encode($detail);
    }

    public function stokin()
    {
        $this->load->model(['stok_m', 'supplier_m']);

        if(isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if(isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }
        
        $data = [ 
            'title' => 'Laporan Stok Masuk',
            'supplier' =>$this->supplier_m->get()->result(),
            'post' => $post,
            'row' => $this->stok_m->get_stokin_filter()
        ];
        $this->template->load('template', 'laporan/laporan_stokin', $data);
    }
}
