<?php defined('BASEPATH') OR exit('No direct script access allowed');

class barang_m extends CI_Model {

    public function get($id = null)
    {
        // $this->db->select('*');
        $this->db->from('barang');
        if($id != null) {
            $this->db->where('barang_id', $id);
        }
        $this->db->join('kategori','barang.kategori_id = kategori.kategori_id');
        $this->db->join('satuan','barang.satuan_id = satuan.satuan_id');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['barcode'] = $post['barcode'];
        $params['barang_nama'] = $post['nama_brg'];
        $params['kategori_id'] = $post['kategori'];
        $params['satuan_id'] = $post['satuan'];
        $params['harga'] = $post['harga'];
        $params['stok'] = $post['stok'];
        $this->db->insert('barang',$params);
    }
    
    public function edit($post)
    {
        $params['barcode'] = $post['barcode'];
        $params['barang_nama'] = $post['nama_brg'];
        $params['kategori_id'] = $post['kategori'];
        $params['satuan_id'] = $post['satuan'];
        $params['harga'] = $post['harga'];
        $params['stok'] = $post['stok'];
        $this->db->where('barang_id', $post['barang_id']);
        $this->db->update('barang',$params);
    }

    public function del($id)
	{
        $this->db->where('barang_id', $id);
		$this->db->delete('barang');
    }
}