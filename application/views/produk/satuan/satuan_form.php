<section class="content-header">
	<h1>
		Satuan
		<small>Satuan Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?=site_url('dashboard') ?>">
				<i class="fa fa-dashboard"></i></a>
		</li>
		<li class="active">Satuan</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?=ucfirst($page) ?> Data satuan</h3>
            <div class="pull-right">
            <a href="<?=site_url('satuan') ?>" class="btn btn-success btn-flat">
                <i class="fa fa-undo"></i> Kembali
            </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <form action="<?=site_url('satuan/process') ?>" method="post">
                        <div class="form-group">
                            <label>Nama satuan*</label>
                            <input type="hidden" name="id" value="<?=$row->satuan_id ?>">
                            <input type="text" name="nama_sat" value="<?=$row->satuan_nama ?>" class="form-control" required>
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