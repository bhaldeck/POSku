<?php defined('BASEPATH') OR exit('No direct script access allowed');

class barang_m extends CI_Model {

    public function get($id = null)
    {
        // $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori','barang.kategori_id = kategori.kategori_id');
        $this->db->join('satuan','barang.satuan_id = satuan.satuan_id','LEFT');
        $this->db->order_by('barcode asc, barang_nama asc');
        if($id != null) {
            $this->db->where('barang_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $data['barcode'] = $post['barcode'];
        $data['barang_nama'] = $post['nama_brg'];
        $data['kategori_id'] = $post['kategori_id'];
        $data['satuan_id'] = $post['satuan_id'];
        $data['harga'] = $post['harga'];
        $this->db->insert('barang',$data);
    }
    
    public function edit($post)
    {
        $data = [
            'barcode' => $post['barcode'],
            'barang_nama' => $post['nama_brg'],
            'kategori_id' => $post['kategori_id'],
            'satuan_id' => $post['satuan_id'],
            'harga' => $post['harga'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('barang_id', $post['barang_id']);
        $this->db->update('barang',$data);
    }

    public function del($id)
	{
        $this->db->where('barang_id', $id);
		$this->db->delete('barang');
    }
}