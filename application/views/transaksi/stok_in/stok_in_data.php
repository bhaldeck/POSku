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
              <h3 class="box-title">Data Stok Masuk</h3>
              <div>
                <a href="<?=site_url('stok/in/add') ?>" class="btn btn-success btn-flat">
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
                        <th>Nama kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    // foreach($row->result() as $key => $data) { ?> 
                    <tr>
                        <td><?=$no++?></td>
                        <td></td>
                        <td class="text-center" width="160px">
                            <a href="" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil-square-o"></i>Edit
                            </a>
                            <a href="" onclick="return confirm('Apakah Anda yakin ingin menghapus?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash-o"></i>Hapus
                            </a>
                        </td>
                    </tr>
                                
                </tbody>
              </table>
            </div>
    </div>
	
</section>