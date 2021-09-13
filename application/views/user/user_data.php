<section class="content-header">
	<h1>
		Users
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard"></i></a>
		</li>
		<li class="active">Users</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data User</h3>
              <div>
                <a href="<?=site_url('user/add') ?>" class="btn btn-primary btn-flat">
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
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) { ?> 
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data->username?></td>
                        <td><?=$data->nama?></td>
                        <td><?=$data->alamat?></td>
                        <td><?=$data->level?></td>
                        <td class="text-center" width="160px">
                            <form action="<?=site_url('user/del/') ?>" method="post">
                                <a href="<?=site_url('user/edit/'.$data->user_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil-square-o"></i>Edit
                                </a>
                                <input type="hidden" name="user_id" value="<?=$data->user_id?>">
                                <button onclick="return confirm('Apakah Anda yakin ingin menghapus?')"class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i>Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>              
                </tbody>
              </table>
            </div>
    </div>
	
</section>