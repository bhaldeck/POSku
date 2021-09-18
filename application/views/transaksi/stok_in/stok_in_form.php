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

	<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Stok Masuk </h3>
            <div class="pull-right">
            <a href="<?=site_url('stok/in') ?>" class="btn btn-success btn-flat">
                <i class="fa fa-undo"></i> Kembali
            </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <form action="<?=site_url('stok/process') ?>" method="post">
                        <div class="form-group">
                            <label>Tanggal*</label>
                            <input type="date" name="tanggal" value="<?=date('Y-m-d') ?>" class="form-control" required >
                        </div>
                        <div>
                            <label for="barcode">Barcode*</label>
                        </div>
                        <div class="form-group input-group">
                            <input type="hidden" name="barang_id" id="barang_id">
                            <input type="text" name="barcode" id="barcode" class="form-control" autocomplete="off" required autofocus>
                            <span class="input-group-btn">
                                <button type="button"  class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="barang_nama">Nama Barang</label>
                            <input type="text" name="barang_nama" id="barang_nama" class="form-control" readonly >
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="satuan_nama">Nama Satuan</label>
                                    <input type="text" name="satuan_nama" id="satuan_nama" value="-" class="form-control" readonly >
                                </div>
                                <div class="col-md-4">
                                    <label for="stok">Stok Awal</label>
                                    <input type="text" name="stok" id="stok" value="-" class="form-control" readonly >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="detail">Detail</label>
                            <input type="text" name="detail" id="detail" class="form-control" placeholder="Tambahan / Kulakan / dsb" required >
                        </div>
                        <div class="form-group">
                            <label for="supplier">Supplier</label>
                            <select name="supplier_id" id="supplier" class="form-control">
                              <option value="">-Pilih-</option>
                              <?php foreach ($supplier as $row){
                                  echo '<option value="'.$row->supplier_id.'">'.$row->supplier_nama.'</option>';
                              } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qty">Jumlah</label>
                            <input type="number" name="qty" id="qty" class="form-control"  required >
                        </div>
                        <div class="form-group">
                            <button type="submit" name="in_add" class="btn btn-primary btn-flat">Simpan</button>
                            <button type="reset" class="btn btn-default btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
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
        var satuan_nama = $(this).data('satuan');
        var stok = $(this).data('stok');
        $('#barang_id').val(barang_id);
        $('#barcode').val(barcode);
        $('#barang_nama').val(barang_nama);
        $('#satuan_nama').val(satuan_nama);
        $('#stok').val(stok);
        $('#modal-item').modal('hide');
    })
})
</script>