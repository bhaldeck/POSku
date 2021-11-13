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
            <h3 class="box-title">Data Laporan</h3>
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
                <?php $no = 1;
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
                        <button class="btn btn-default btn-xs"><i class="fa fa-info-circle"></i> Detail</button>
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
    </div>
	
</section>