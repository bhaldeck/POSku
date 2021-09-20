<section class="content-header">
	<h1>
		Stok out
		<small>Barang Keluar</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard"></i></a>
		</li>
    <li>Transaksi</li>
		<li class="active">Stok Out</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
  <?php $this->view('message');?>
	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Stok Keluar</h3>
              <div>
                <a href="<?=site_url('stok/out/add') ?>" class="btn btn-success btn-flat">
                    <i class="fa fa-user-plus"></i> Tambah Stok Keluar
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
                        <th>Info</th>
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
                        <td><?=$data->detail?></td>
                        <td class="text-center"><?=local_date($data->tanggal)?></td>
                        <td class="text-center" width="160px">
                            <a href="<?=site_url('stok/out/del/'.$data->stok_id.'/'.$data->barang_id) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')" class="btn btn-danger btn-xs">
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
