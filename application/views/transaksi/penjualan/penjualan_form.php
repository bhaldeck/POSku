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
                                <div class="form-group input-group">
                                    <input type="hidden" id="barang_id">
                                    <input type="hidden" id="harga">
                                    <input type="hidden" id="stok">
                                    <input type="text" id="barcode" class="form-control" placeholder="Pilih-->" autofocus>
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
                        <h1><b><span id="grandtotal2" style="font-size:50pt"></span></b></h1>
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

                            <?php $this->view('transaksi/penjualan/data_keranjang');?>

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
                <button id="batal_bayar" class="btn btn-flat btn-warning">
                    <i class="fa fa-refresh"></i> Batal
                </button><br><br>
                <button id="proses_bayar" class="btn btn-flat btn-lg btn-success">
                    <i class="fa fa-paper-plane-o"></i> Proses Pembayaran
                </button>
            </div>
        </div>
    </div>
</section>

<!-- modal add item -->
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
<!-- end of add_modal_item -->

<!-- modal edit cart item -->
<div class="modal fade in" id="modal-item-edit" >
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Update Produk Barang</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cartid_barang">
                <div class="form-group">
                    <label for="produk_barang">Produk Barang</label>
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" id="barcode_barang" class="form-control" readonly>
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="produk_barang" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="harga_barang">Harga</label>
                    <input type="number" id="harga_barang" min="0" class="form-control">
                </div>
                <div class="form-group">
                    <label for="qty_barang">Qty</label>
                    <input type="number" id="qty_barang" min="1" class="form-control">
                </div>
                <div class="form-group">
                    <label for="total_sebelum">Total sebelum diskon</label>
                    <input type="number" id="total_sebelum" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="diskon_barang">Diskon per barang</label>
                    <input type="number" id="diskon_barang" min="0" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="total_setelah">Total setelah diskon</label>
                    <input type="number" id="total_barang" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button type="button" id="edit_cart" class="btn btn-flat btn-success">
                        <i class="fa fa-paper-plane"></i> Simpan</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end off modal edit cart item -->


<script>
$(document).on('click', '#pilih', function(){
    $('#barang_id').val($(this).data('id'));
    $('#barcode').val($(this).data('barcode'));
    $('#harga').val($(this).data('harga'));
    $('#stok').val($(this).data('stok'));
    $('#modal-item').modal('hide');
})

$(document).on('click', '#add_cart', function(){
    var barang_id = $('#barang_id').val()
    var harga = $('#harga').val()
    var stok = $('#stok').val()
    var qty = $('#qty').val()
    if (barang_id=='') {
        alert('Produk belum dipilih')
        $('#barcode').focus()
    } else if(stok < 1){
        alert('Stok tidak mencukupi')
        $('#barang_id').val('')
        $('#barcode').val('')
        $('#barcode').focus()
    } else if(qty < 1){
        alert('Qty tidak boleh kosong')
        $('#qty').val('')
        $('#qty').focus()
    } else {
        $.ajax({
            type: 'POST',
            url: '<?=site_url('penjualan/process')?>',
            data: {'add_cart' : true, 'barang_id' : barang_id, 'harga' : harga, 'qty' : qty},
            dataType: 'json',
            success: function(result){
                if(result.success == true){
                    $('#cart_table').load('<?=site_url('penjualan/cart_data')?>', function(){
                        calculate()
                    })
                    $('#barang_id').val('')
                    $('#barcode').val('')
                    $('#qty').val(1)
                    $('#barcode').focus()
                } else {
                    alert('Gagal tambah ke keranjang')
                }
            }
        })
    }
})

$(document).on('click', '#del_cart', function() {
    if(confirm('Apakah Anda yakin?')) {
        var cart_id = $(this).data('cartid')
        $.ajax({
            type : 'POST',
            url: '<?=site_url('penjualan/cart_del')?>',
            dataType: 'json',
            data: {'cart_id' : cart_id},
            success: function(result){
                if(result.success == true) {
                    $('#cart_table').load('<?=site_url('penjualan/cart_data')?>', function() {
                        calculate()
                    })
                } else {
                    alert('Gagal hapus item keranjang')
                }
            }
        })
    }
})

$(document).on('click', '#update_cart', function(){
    $('#cartid_barang').val($(this).data('cartid'));
    $('#barcode_barang').val($(this).data('barcode'));
    $('#produk_barang').val($(this).data('produk'));
    $('#harga_barang').val($(this).data('harga'));
    $('#qty_barang').val($(this).data('qty'));
    $('#total_sebelum').val($(this).data('harga') * $(this).data('qty'));
    $('#diskon_barang').val($(this).data('diskon'));
    $('#total_barang').val($(this).data('total'));
    $('#modal-item-edit').modal('hide');
})
function count_edit_modal() {
    var harga = $('#harga_barang').val()
    var qty = $('#qty_barang').val()
    var diskon = $('#diskon_barang').val()

    total_sebelum = harga * qty
    $('#total_sebelum').val(total_sebelum)

    total = (harga - diskon) * qty
    $('#total_barang').val(total)

    if(diskon == ''){
        $('#diskon_barang').val(0)
    }
}

$(document).on('keyup mouseup', '#harga_barang, #qty_barang, #diskon_barang', function() {
    count_edit_modal()
})

$(document).on('click', '#edit_cart', function(){
    var cart_id = $('#cartid_barang').val()
    var harga = $('#harga_barang').val()
    var qty = $('#qty_barang').val()
    var diskon_b = $('#diskon_barang').val()
    var total = $('#total_barang').val()
    if (harga=='' || harga < 1) {
        alert('Harga tidak boleh kosong')
        $('#harga_barang').focus()
    } else if(qty == '' || qty < 1){
        alert('Qty tidak boleh kosong')
        $('#qty_barang').focus()
    } else {
        $.ajax({
            type: 'POST',
            url: '<?=site_url('penjualan/process')?>',
            data: {'edit_cart' : true, 'cart_id' : cart_id, 'harga' : harga, 'qty' : qty, 'diskon_b' : diskon_b, 'total' : total },
            dataType: 'json',
            success: function(result){
                if(result.success == true){
                    $('#cart_table').load('<?=site_url('penjualan/cart_data')?>', function(){
                        calculate()
                    })
                    $('#modal-item-edit').modal('hide');
                } else {
                    alert('Gagal update data keranjang')
                }
            }
        })
    }
})

function calculate() {
    var subtotal = 0
    $('#cart_table tr').each(function() {
        subtotal += parseInt($(this).find('#total').text())
    })
    isNaN(subtotal) ? $('#subtotal').val(0) : $('#subtotal').val(subtotal)

    var diskon = $('#diskon').val()
    var grandtotal = subtotal - diskon
    if(isNaN(grandtotal)) {
        $('#grandtotal').val(0)
        $('#grandtotal2').text(0)
    } else {
        $('#grandtotal').val(grandtotal)
        $('#grandtotal2').text(grandtotal)
    }

    var tunai = $('#cash').val()
    tunai != 0 ? $('#change').val(tunai - grandtotal) : $('#change').val(0)

    if(diskon == ''){
        $('#diskon').val(0)
    }
}

$(document).on('keyup mouseup', '#diskon, #cash', function() {
    calculate()
})

$(document).ready(function() {
    calculate()
})

$(document).on('click', '#proses_bayar', function () {
    var pelanggan_id = $('#pelanggan').val()
    var subtotal = $('#subtotal').val()
    var diskon = $('#diskon').val()
    var grandtotal = $('#grandtotal').val()
    var tunai = $('#cash').val()
    var kembali = $('#change').val()
    var note = $('#note').val()
    var tanggal = $('#tanggal').val()
    if (subtotal < 1) {
        alert('Belum ada barang yang dipilih')
        $('#barcode').focus()
    } else if(tunai < 1) {
        alert('Jumlah uang tunai belum diinput')
        $('#cash').focus()
    } else {
        if (confirm('Proses transaksi?')) {
            $.ajax({
                type: 'POST',
                url: '<?=site_url('penjualan/process')?>',
                data: {'proses_bayar' : true, 'pelanggan_id' : pelanggan_id, 'subtotal' : subtotal,
                        'diskon' : diskon,'grandtotal' : grandtotal, 'tunai' : tunai, 'kembali' : kembali,
                        'note' : note, 'tanggal' : tanggal },
                dataType: 'json',
                success: function(result){
                    if(result.success == true){
                        alert('Transaksi berhasi')
                    } else {
                        alert('Transaksi gagal ke db')
                    }
                    location.href = '<?=site_url('penjualan')?>'
                }
            })
        } else {
            
        }
    }
})

</script>
