<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_m extends CI_Model {

    public function get($id = null)
    {
        // $this->db->select('*');
        $this->db->from('pelanggan');
        if($id != null) {
            $this->db->where('pelanggan_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'pelanggan_nama' => $post['nama_pel'],
            'jenis_kel' => $post['gender'],
            'alamat' => $post['alamat'],
            'telepon' => $post['telepon']
        ];
        $this->db->insert('pelanggan',$params);
    }
    
    public function edit($post)
    {
        $params = [
            'pelanggan_nama' => $post['nama_pel'],
            'jenis_kel' => $post['gender'],
            'alamat' => $post['alamat'],
            'telepon' => $post['telepon'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('pelanggan_id', $post['id']);
        $this->db->update('pelanggan',$params);
    }

    public function del($id)
	{
        $this->db->where('pelanggan_id', $id);
		$this->db->delete('pelanggan');
    }
}