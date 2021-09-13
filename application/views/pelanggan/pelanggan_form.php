<section class="content-header">
	<h1>
		Pelanggan
		<small>Pelanggan</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?=site_url('dashboard') ?>">
				<i class="fa fa-dashboard"></i></a>
		</li>
		<li class="active">Pelanggan</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?=ucfirst($page) ?> Data Pelanggan</h3>
            <div class="pull-right">
            <a href="<?=site_url('pelanggan') ?>" class="btn btn-success btn-flat">
                <i class="fa fa-undo"></i> Kembali
            </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <form action="<?=site_url('pelanggan/process') ?>" method="post">
                        <div class="form-group">
                            <label>Nama Pelanggan*</label>
                            <input type="hidden" name="id" value="<?=$row->pelanggan_id ?>">
                            <input type="text" name="nama_pel" value="<?=$row->pelanggan_nama ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin *</label>
                            <select name="gender" class="form-control" required>
                              <option value="">-Pilih-</option>
                              <option value="L" <?=$row->jenis_kel == 'L' ? "selected" : null ?> >Laki-Laki</option>
                              <option value="P" <?=$row->jenis_kel == 'P' ? "selected" : null ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control"><?=$row->alamat ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nombor Telepon *</label>
                            <input type="number" name="telepon" value="<?=$row->telepon ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?=$page?>" class="btn btn-primary btn-flat">Simpan</button>
                            <button type="reset" class="btn btn-default btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	
</section>