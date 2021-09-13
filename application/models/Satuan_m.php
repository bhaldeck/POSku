<?php defined('BASEPATH') OR exit('No direct script access allowed');

class satuan_m extends CI_Model {

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

    public function get_join($id = null)
	{
		if ($id) {
			$this->db->where('satuan_id', $id);
			return $this->db->get('satuan')->row_array();
		} else {
			return $this->db->get('satuan')->result();
		}
	}

    public function add($post)
    {
        $params = [
            'satuan_nama' => $post['nama_sat']
        ];
        $this->db->insert('satuan',$params);
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