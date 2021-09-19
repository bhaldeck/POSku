<section class="content-header">
	<h1>
		Stok In
		<small>Barang Masuk / Pembelian</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard"></i></a>
		</li>
        <li>Transaksi</li>
		<li class="active">Stok In</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('message');?>
	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Stok Masuk</h3>
              <div>
                <a href="<?=site_url('stok/in/add') ?>" class="btn btn-success btn-flat">
                    <i class="fa fa-user-plus"></i> Tambah Stok Masuk
                </a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="tabel1" class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th style='width:20px'>#</th>
                        <th>Barcode</th>
                        <th>Nama Produk</th>
                        <th style="width: 50px;">Qty</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?> 
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data->barcode?></td>
                        <td><?=$data->barang_nama?></td>
                        <td class="text-right"><?=$data->qty?></td>
                        <td class="text-center"><?=local_date($data->tanggal)?></td>
                        <td class="text-center" width="160px">
                            <a id="setdetail" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-detail"
                                data-barcode="<?=$data->barcode?>"
                                data-barang_nama="<?=$data->barang_nama?>"
                                data-detail="<?=$data->detail?>"
                                data-supplier_nama="<?=$data->supplier_nama?>"
                                data-qty="<?=$data->qty?>"
                                data-tanggal="<?=local_date($data->tanggal)?>">
                                <i class="fa fa-eye"></i> Detail
                            </a>
                            <a href="<?=site_url('stok/in/del/'.$data->stok_id.'/'.$data->barang_id) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash-o"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>        
                </tbody>
              </table>
            </div>
    </div>
	
</section>

<div class="modal fade in" id="modal-detail" >
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Stok In Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <th style="width :35%">Barcode</th>
                                <td><span id="barcode"></span></td>
                            </tr>
                            <tr>
                                <th>Nama Produk</th>
                                <td><span id="barangnama"></span></td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td><span id="detail"></span></td>
                            </tr>
                            <tr>
                                <th>Supplier</th>
                                <td><span id="suppliernama"></span></td>
                            </tr>
                            <tr>
                                <th>Qty</th>
                                <td><span id="qty"></span></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td><span id="tanggal"></span></td>
                            </tr>
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
    $(document).on('click', '#setdetail', function(){
        var barcode = $(this).data('barcode');
        var barang_nama = $(this).data('barang_nama');
        var detail = $(this).data('detail');
        var supplier_nama = $(this).data('supplier_nama');
        var qty = $(this).data('qty');
        var tanggal = $(this).data('tanggal');
        $('#barcode').text(barcode);
        $('#barangnama').text(barang_nama);
        $('#detail').text(detail);
        $('#suppliernama').text(supplier_nama);
        $('#qty').text(qty);
        $('#tanggal').text(tanggal);
    })
})
</script>