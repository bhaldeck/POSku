<section class="content-header">
	<h1>Penjualan
		<small>Penjualan Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?=site_url('dashboard') ?>">
			<i class="fa fa-dashboard"></i></a>
		</li>
        <li>Transaksi</li>
		<li class="active">Penjualan</li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="tanggal">Tanggal</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" name="tanggal" id="tanggal" value="<?=date('Y-m-d')?>" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="user">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="user" id="user" value="<?=$this->fungsi->user_login()->nama?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="pelanggan">Customer</label>
                            </td>
                            <td>
                                <div>
                                    <select name="pelanggan" id="pelanggan" class="form-control">
                                        <option value="">Umum</option>
                                        <?php foreach($pelanggan as $row => $value): ?>
                                         <option value="<?=$value->pelanggan_id?>"><?=$value->pelanggan_nama?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <form action="<?=site_url('penjualan/add_to_cart') ?>" method="post">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="barcode">Barcode</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="barang_id" name="barang_id">
                                    <input type="hidden" id="barang_nama">
                                    <input type="hidden" id="harga" name="harga">
                                    <input type="hidden" id="stok">
                                    <input type="hidden" id="diskon" value="0" min="0">
                                    <input type="text" id="barcode" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="qty">Qty</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="qty" name="qty" value="1" min="1" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <button type="submit" name="add_cart" class="btn btn-primary">
                                        <i class="fa fa-cart-plus"></i> Tambah
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <div align="right">
                        <h4>Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
                        <h1><b><span id="grand_total2" style="font-size:50pt"><?=str_replace(".00", "", $this->cart->format_number($this->cart->total()));?></span></b></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Produk Barang</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th width="10%">Diskon</th>
                                <th width="15%">Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                        <?php $i = 1; ?>
                        <?php foreach ($this->cart->contents() as $items): ?>
                        <?php echo form_hidden([
                            $i.'[rowid]' => $items['rowid'],
                            'barang_id' => $items['id']
                            ]); ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$items['barcode'];?></td>
                            <td><?=$items['name'];?></td>
                            <td style="text-align:right;"><?php echo $items['price'];?></td>
                            <td style="text-align:center;"><?php echo $items['qty'];?></td>
                            <td style="text-align:right;"><?php echo $items['disc'];?></td>
                            <td style="text-align:right;"><?php echo $items['subtotal'];?></td>
                            
                            <td style="text-align:center;">
                                <div class="form-group">
                                    <a href="" class="btn btn-default btn-xs"><span class="fa fa-pencil"></span> Update</a>
                                    <a href="<?php echo base_url().'penjualan/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a>
                                </div>
                            </td>
                        </tr>
                        
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="subtotal" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="diskon">Diskon</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="diskon" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="grandtotal">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grandtotal" value="<?=rupiah($this->cart->total())?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="cash">Tunai</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="cash" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="change">Kembali</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="change" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="note">Catatan</label>
                            </td>
                            <td>
                                <div >
                                    <textarea  id="note" rows="3" class="form-control"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div>
                <button id="cancel_payment" class="btn btn-flat btn-warning">
                    <i class="fa fa-refresh"></i> Batal
                </button><br><br>
                <button id="process_payment" class="btn btn-flat btn-lg btn-success">
                    <i class="fa fa-paper-plane-o"></i> Proses Pembayaran
                </button>
            </div>
        </div>
    </div>

</section>

<div class="modal fade in" id="modal-item" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Produk Barang</h4>
            </div>
            <div class="modal-body table-responsive">
                <table id="tabel1" class="table table-bordered table-striped" >
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Nama</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($barang as $row => $data) { ?>
                        <tr>
                            <td><?=$data->barcode?></td>
                            <td><?=$data->barang_nama?></td>
                            <td><?=$data->satuan_nama?></td>
                            <td class="text-right"><?=$data->harga?></td>
                            <td class="text-right"><?=$data->stok?></td>
                            <td class="text-right">
                                <button class="btn btn-info btn-flat btn-xs" id="pilih"
                                    data-id="<?=$data->barang_id?>"
                                    data-barcode="<?=$data->barcode?>"
                                    data-nama="<?=$data->barang_nama?>"
                                    data-harga="<?=$data->harga?>"
                                    data-stok="<?=$data->stok?>">
                                    <i class="fa fa-check">Pilih</i>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>    
                    </tbody>
                </table>
            </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
$(document).ready(function(){
    $(document).on('click', '#pilih', function(){
        var barang_id = $(this).data('id');
        var barcode = $(this).data('barcode');
        var barang_nama = $(this).data('nama');
        var harga = $(this).data('harga');
        var stok = $(this).data('stok');
        $('#barang_id').val(barang_id);
        $('#barcode').val(barcode);
        $('#barang_nama').val(barang_nama);
        $('#harga').val(harga);
        $('#stok').val(stok);
        $('#modal-item').modal('hide');
    })
})
</script>