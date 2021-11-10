<?php $no = 1;
if ($cart->num_rows()>0) {
    foreach ($cart->result() as $row => $data ) { ?>
        <tr>
            <td><?=$no++?></td>
            <td><?=$data->barcode?></td>
            <td><?=$data->barang_nama?></td>
            <td class="text-right"><?=$data->cart_harga?></td>
            <td class="text-center"><?=$data->qty?></td>
            <td class="text-right"><?=$data->barang_disc?></td>
            <td class="text-right" id="total"><?=$data->total?></td>
            <td class="text-center" width="160px">
                <button id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
                data-cartid="<?=$data->cart_id?>"
                data-barcode="<?=$data->barcode?>"
                data-produk="<?=$data->barang_nama?>"
                data-harga="<?=$data->cart_harga?>"
                data-qty="<?=$data->qty?>"
                data-diskkon="<?=$data->barang_disc?>"
                data-total="<?=$data->total?>"
                class="btn btn-xs btn-warning">
                    <i class="fa fa-pencil"></i> Update
                </button>
                <button id="del_cart" data-cartid="<?=$data->cart_id?>" class="btn btn-xs btn-danger">
                    <i class="fa fa-trash"></i> Delete
                </button>
            </td>
        </tr>
    <?php
    }
} else {
    echo '<tr>
        <td colspan="8" class="text-center">Tidak ada data</td>
    </tr>';
} ?>