<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_m extends CI_Model {

    public function get($id = null)
    {
        // $this->db->select('*');
        $this->db->from('kategori');
        if($id != null) {
            $this->db->where('kategori_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {
        $params = [
            'kategori_nama' => $post['nama_kat']
        ];
        $this->db->insert('kategori',$params);
    }
    
    public function edit($post)
    {
        $params = [
            'kategori_nama' => $post['nama_kat'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('kategori_id', $post['id']);
        $this->db->update('kategori',$params);
    }

    public function del($id)
	{
        $this->db->where('kategori_id', $id);
		$this->db->delete('kategori');
    }
}