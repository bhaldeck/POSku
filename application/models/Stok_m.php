<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_m extends CI_Model {

    public function get($id = null)
    {
        // $this->db->select('*');
        $this->db->from('stok');
        if($id != null) {
            $this->db->where('stok_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_stok_in()
    {
        $this->db->select('stok.stok_id, barang.barcode, barang.barang_nama, qty, 
                            tanggal, detail, supplier.supplier_nama, barang.barang_id');
        $this->db->from('stok');
        $this->db->join('barang','stok.barang_id = barang.barang_id');
        $this->db->join('supplier','stok.supplier_id = supplier.supplier_id','LEFT');
        $this->db->where('tipe', 'in');
        $this->db->order_by('stok_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add_stok_in($post)
    {
        $params = [
            'barang_id' => $post['barang_id'],
            'tipe' => 'in',
            'detail' => $post['detail'],
            'supplier_id' => $post['supplier_id'] == '' ? null : $post['supplier_id'],
            'qty' => $post['qty'],
            'tanggal' => $post['tanggal'],
            'user_id' => $this->session->userdata('userid')

        ];
        $this->db->insert('stok',$params);
    }

    public function get_stok_out()
    {
        $this->db->select('stok.stok_id, barang.barcode, barang.barang_nama, qty, 
                            tanggal, detail, barang.barang_id');
        $this->db->from('stok');
        $this->db->join('barang','stok.barang_id = barang.barang_id');
        $this->db->where('tipe', 'out');
        $this->db->order_by('stok_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add_stok_out($post)
    {
        $params = [
            'barang_id' => $post['barang_id'],
            'tipe' => 'out',
            'detail' => $post['detail'],
            'qty' => $post['qty'],
            'tanggal' => $post['tanggal'],
            'user_id' => $this->session->userdata('userid')

        ];
        $this->db->insert('stok',$params);
    }
    

    public function del($id)
	{
        $this->db->where('stok_id', $id);
		$this->db->delete('stok');
    }
}