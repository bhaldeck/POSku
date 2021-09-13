<section class="content-header">
	<h1>
		Barang
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard"></i></a>
		</li>
		<li class="active">Barang</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Barang</h3>
              <div>
                <a href="<?=site_url('barang/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Tambah
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
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Stok</th>
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
                        <td><?=$data->kategori_nama?></td>
                        <td><?=$data->satuan_nama?></td>
                        <td><?=$data->harga?></td>
                        <td><?=$data->stok?></td>
                        <td class="text-center" width="160px">
                            <a href="<?=site_url('barang/edit/'.$data->barang_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil-square-o"></i>Edit
                            </a>
                            <a href="<?=site_url('barang/del/'.$data->barang_id) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash-o"></i>Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>              
                </tbody>
              </table>
            </div>
    </div>
	
</section>