<!-- jQuery UI CSS -->
<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/jquery-ui/themes/smoothness/jquery-ui.css">
<!-- jQuery UI -->
<script src="<?=base_url()?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

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
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="barcode">Barcode</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="barcode" class="form-control" autofocus>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="qty">Qty</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <button type="button" id="add_cart" class="btn btn-primary">
                                        <i class="fa fa-cart-plus"></i> Tambah
                                    </button>
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
                    <div align="right">
                        <h4>Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
                        <h1><b><span id="grand_total2" style="font-size:50pt">0</span></b></h1>
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
                            <tr>
                                <td colspan="9" class="text-center">Tidak Ada Item</td>
                            </tr>
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
                                    <input type="number" id="grandtotal" value="" class="form-control" readonly>
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
                            <td class="text-right"><?=rupiah($data->harga)?></td>
                            <td class="text-right"><?=$data->stok?></td>
                            <td class="text-right">
                                <button class="btn btn-info btn-flat btn-xs" id="pilih"
                                    data-id="<?=$data->barang_id?>"
                                    data-barcode="<?=$data->barcode?>"
                                    data-nama="<?=$data->barang_nama?>"
                                    data-satuan="<?=$data->satuan_nama?>"
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

<script type='text/javascript'>
		$(document).ready(function(){
			$( '#barcode' ).autocomplete({
				source: function( request, response ) {
				// Fetch data
				$.ajax({
					url: "<?=site_url()?>penjualan/barcode_list",
					type: 'post',
					dataType: "json",
					data: {
					search: request.term
					},
					success: function( data ) {
					response( data );
					}
				});
				},
				select: function (event, ui) {
				// Set selection
				$('#barcode').val(ui.item.label); // display the selected text
				return false;
				}
			});

		})
	</script>
<script>
$(document).ready(function(){
    $(document).on('click', '#pilih', function(){
        var barang_id = $(this).data('id');
        var barcode = $(this).data('barcode');
        var barang_nama = $(this).data('nama');
        var satuan_nama = $(this).data('satuan');
        var harga = $(this).data('harga');
        var stok = $(this).data('stok');
        $('#barang_id').val(barang_id);
        $('#barcode').val(barcode);
        $('#barang_nama').val(barang_nama);
        $('#satuan_nama').val(satuan_nama);
        $('#harga').val(harga);
        $('#stok').val(stok);
        $('#modal-item').modal('hide');
    })

    
})
</script>
