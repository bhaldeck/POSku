<section class="content-header">
	<h1>
		Supplier
		<small>Pemasok Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?=site_url('dashboard') ?>">
				<i class="fa fa-dashboard"></i></a>
		</li>
		<li class="active">Suppliers</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?=ucfirst($page) ?> Data Supplier</h3>
            <div class="pull-right">
            <a href="<?=site_url('supplier') ?>" class="btn btn-success btn-flat">
                <i class="fa fa-undo"></i> Kembali
            </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <form action="<?=site_url('supplier/process') ?>" method="post">
                        <div class="form-group">
                            <label>Nama Supplier*</label>
                            <input type="hidden" name="id" value="<?=$row->supplier_id ?>">
                            <input type="text" name="nama_supp" value="<?=$row->supplier_nama ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Narahubung *</label>
                            <input type="text" name="narahubung" value="<?=$row->kontak_person ?>" class="form-control" required>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" required><?=$row->alamat ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nombor Telepon *</label>
                            <input type="number" name="telepon" value="<?=$row->telepon ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control"><?=$row->keterangan ?></textarea>
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