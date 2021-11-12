<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_m extends CI_Model {

    public function invoice_no()
    {
        $sql = "SELECT MAX(MID(invoice,10,4)) AS invoice_no 
                FROM penjualan 
                WHERE MID(invoice,4,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $invoice = "PTU".date('ymd').$no;
        return $invoice;
    }

    public function get_cart($params = null)
    {
        $this->db->select('*, cart.harga as cart_harga');
        $this->db->from('cart');
        $this->db->join('barang', 'cart.barang_id = barang.barang_id');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('user_id', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($data)
    {
        $query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM cart");
        if($query->num_rows() > 0){
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'cart_id' => $car_no,
            'barang_id' => $data['barang_id'],
            'harga' => $data['harga'],
            'qty' => $data['qty'],
            'total' => ($data['harga'] * $data['qty']),
            'user_id' => $this->session->userdata('userid')
        );
        $this->db->insert('cart', $params);
    }

    function update_cart_qty($post) {
        $sql = "UPDATE cart SET harga = '$post[harga]',
                qty = qty + '$post[qty]',
                total = '$post[harga]' * qty
                WHERE barang_id = '$post[barang_id]'";
        $this->db->query($sql);
    }

    public function del_cart($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('cart');
    }

    public function edit_cart($post)
    {
        $params = array(
            'harga' => $post['harga'],
            'qty' => $post['qty'],
            'barang_disc' => $post['diskon_b'],
            'total' => $post['total']
        );
        $this->db->where('cart_id', $post['cart_id']);
        $this->db->update('cart', $params);
    }

    public function add_sale($post)
    {
        $params = array(
            'invoice' => $this->invoice_no(),
            'pelanggan_id' => $post['pelanggan_id'] == "" ? null : $post['pelanggan_id'],
            'total_harga' => $post['subtotal'],
            'diskon' => $post['diskon'],
            'harga_final' => $post['grandtotal'],
            'tunai' => $post['tunai'],
            'kembali' => $post['kembali'],
            'keterangan' => $post['note'],
            'tanggal' => $post['tanggal'],
            'user_id' => $this->session->userdata('userid')
        );
        $this->db->insert('penjualan', $params);
        // insert_id = autoincrement yg ditampung ke field penjualan_id
        return $this->db->insert_id();
    }

    public function add_sale_detail($params)
    {
        $this->db->insert_batch('penjualan_detail', $params);
    }
}