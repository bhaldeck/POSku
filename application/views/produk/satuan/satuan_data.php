<section class="content-header">
	<h1>
		Satuan
		<small>Satuan Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard"></i></a>
		</li>
		<li class="active">Satuans</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Satuan</h3>
              <div>
                <a href="<?=site_url('satuan/add') ?>" class="btn btn-success btn-flat">
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
                        <th>Nama satuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?> 
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data->satuan_nama?></td>
                        <td class="text-center" width="160px">
                            <a href="<?=site_url('satuan/edit/'.$data->satuan_id) ?>" class="btn btn-warning btn-xs">
                                <i class="fa fa-pencil-square-o"></i>Edit
                            </a>
                            <a href="<?=site_url('satuan/del/'.$data->satuan_id) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash-o"></i>Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>              
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div> -->
    </div>
	
</section>