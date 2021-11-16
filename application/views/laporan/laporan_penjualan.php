<section class="content-header">
	<h1>
		Laporan Penjualan
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard"></i></a>
		</li>
		<li><a href="#">Laporan</a></li>
		<li class="active">Penjualan</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Filter Data</h3>
        </div>
        <div class="box-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tgl</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date1" id="date1" value="<?=@$post['date1']?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">s/d</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date2" id="date2" value="<?=@$post['date2']?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Pelanggan</label>
                                <div class="col-sm-9">
                                    <select name="customer" class="form-control">
                                        <option value="">- Semua -</option>
                                        <option value="null" <?=@$post['customer'] == 'null' ? 'selected' : '' ?>>Umum</option>
                                        <?php foreach($customer as $cst => $data) { ?>
                                            <option value="<?=$data->pelanggan_id?>" <?=@$post['customer'] == $data->pelanggan_id ? 'selected' : ''?>><?=$data->pelanggan_nama?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nota</label>
                                <div class="col-sm-9">
                                    <input type="text" name="invoice" value="<?=@$post['invoice']?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" name="reset" class="btn btn-flat">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                            <button type="submit" name="filter" id="filter" class="btn btn-info btn-flat">
                                <i class="fa fa-search"></i> Filter
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

	<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Penjualan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th style='width:20px'>#</th>
                        <th>Nota</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Diskon</th>
                        <th>Grandtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = $this->uri->segment(3) ? $this->uri->segment(3) +1 : 1 ;
                    foreach($row->result() as $key => $data) { ?> 
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data->invoice?></td>
                        <td><?=local_date($data->tanggal)?></td>
                        <td><?=$data->pelanggan_id == null ? "Umum" : $data->pelanggan_nama ?></td>
                        <td><?=rupiah($data->total_harga)?></td>
                        <td><?=rupiah($data->diskon)?></td>
                        <td><?=rupiah($data->harga_final)?></td>
                        <td class="text-center" width="200px">
                            <button id="detail" data-target="#modal-detail" data-toggle="modal" class="btn btn-default btn-xs"
                            data-invoice="<?=$data->invoice?>"
                            data-date="<?=local_date($data->tanggal)?>"
                            data-time="<?=substr($data->penjualan_created, 11, 5)?>"
                            data-customer="<?=$data->pelanggan_id == null ? "Umum" : $data->pelanggan_nama?>"
                            data-total="<?=rupiah($data->total_harga)?>"
                            data-discount="<?=rupiah($data->diskon)?>"
                            data-grandtotal="<?=rupiah($data->harga_final)?>"
                            data-cash="<?=rupiah($data->tunai)?>"
                            data-remaining="<?=rupiah($data->kembali)?>"
                            data-note="<?=$data->keterangan?>"
                            data-cashier="<?=ucfirst($data->user_name)?>"
                            data-saleid="<?=$data->penjualan_id?>">
                            <i class="ion ion-ios-information-outline"></i> Detail</button>
                            <a href="<?=site_url('penjualan/cetak/'.$data->penjualan_id) ?>" target="_blank" class="btn btn-info btn-xs">
                                <i class="fa fa-print"></i> Print
                            </a>
                            <a href="<?=site_url('penjualan/del/'.$data->penjualan_id) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash-o"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>              
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <?=$pagination?>
            </ul>
        </div>
    </div>
	
</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Laporan Penjualan</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width:20%">Nota</th>
                            <td style="width:30%"><span id="invoice"></span></td>
                            <th style="width:20%">Pelanggan</th>
                            <td style="width:30%"><span id="cust"></span></td>
                        </tr>
                        <tr>
                            <th>Waktu</th>
                            <td><span id="datetime"></span></td>
                            <th>Kasir</th>
                            <td><span id="cashier"></span></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td><span id="total"></alspan></td>
                            <th>Tunai</th>
                            <td><span id="cash"></span></td>
                        </tr>
                        <tr>
                            <th>Diskon</th>
                            <td><span id="diskon"></span></td>
                            <th>Kembalian</th>
                            <td><span id="change"></span></td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td><span id="grandtotal"></span></td>
                            <th>Note</th>
                            <td><span id="note"></span></td>
                        </tr>
                        <tr>
                            <th>Produk</th>
                            <td colspan="3"><span id="product"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).on('click', '#filter', function () {
    var date1 = $('#date1').val()
    var date2 = $('#date2').val()

    if(!date1 && date2){
        alert('Pilih tanggal awal')
    } 
    if(date1 && !date2){
        alert('Pilih tanggal akhir')
    } 
})

$(document).on('click', '#detail', function() {
    $('#invoice').text($(this).data('invoice'))
    $('#cust').text($(this).data('customer'))
    $('#datetime').text($(this).data('date') + ' ' + $(this).data('time'))
    $('#total').text($(this).data('total'))
    $('#discount').text($(this).data('discount'))
    $('#cash').text($(this).data('cash'))
    $('#change').text($(this).data('remaining'))
    $('#grandtotal').text($(this).data('grandtotal'))
    $('#note').text($(this).data('note'))
    $('#cashier').text($(this).data('cashier'))
 
    var produk = '<table class="table no-margin">'
    produk += '<tr><th>Item</th><th>Harga</th><th>Qty</th><th>Diskon</th><th>Total</th></tr>'
    $.getJSON('<?=site_url('laporan/produk_penjualan/')?>'+$(this).data('saleid'), function(data) {
        $.each(data, function(key, val) {
            produk += '<tr><td>'+val.barang_nama+'</td><td>'+val.detail_harga+'</td><td>'+val.qty+'</td><td>'+val.barang_disc+'</td><td>'+val.total+'</td></tr>'
        })
        produk += '</table>'
        $('#product').html(produk)
    })
})
</script>