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

    // function get_barcode($postData){

    //     $response = array();
   
    //     if(isset($postData['search']) ){
    //         // Select record
    //         $this->db->select('*');
    //         $this->db->where("barcode like '%".$postData['search']."%' ");

    //         $records = $this->db->get('barang')->result();

    //         foreach($records as $row ){
    //             $response[] = array(
    //                 "barang_id"=>$row->barang_id,
    //                 "barcode"=>$row->barcode,
    //                 "barang_nama"=>$row->barang_nama,
    //                 "satuan_nama"=>$row->satuan_nama,
    //                 "harga"=>$row->harga,
    //                 "stok"=>$row->stok,
    //             );
    //         }
   
    //     }
    //     return $response;
    // }
   
}