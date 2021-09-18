<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_m extends CI_Model {

    public function get($id = null)
    {
        // $this->db->select('*');
        $this->db->from('satuan');
        if($id != null) {
            $this->db->where('satuan_id', $id);
        }
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
    
    public function edit($post)
    {
        $params = [
            'satuan_nama' => $post['nama_sat'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('satuan_id', $post['id']);
        $this->db->update('satuan',$params);
    }

    public function del($id)
	{
        $this->db->where('satuan_id', $id);
		$this->db->delete('satuan');
    }
}