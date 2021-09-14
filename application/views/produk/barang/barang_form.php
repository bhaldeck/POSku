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
            <h3 class="box-title"><?=ucfirst($page)?> Data Barang</h3>
            <div class="pull-right">
            <a href="<?=site_url('barang') ?>" class="btn btn-primary btn-flat">
                <i class="fa fa-undo"></i> Kembali
            </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <?= form_open_multipart('barang/process'); ?>
                        <div class="form-group <?=form_error('barcode') ? 'has-error' : null ?>">
                            <label>Barcode *</label>
                            <input type="hidden" name="barang_id" value="<?=$barang->barang_id ?>">
                            <input type="text" name="barcode" value="<?=set_value('barcode',$barang->barcode);?>" class="form-control">
                            <?=form_error('barcode'); ?>
                        </div>
                        <div class="form-group <?=form_error('nama_brg') ? 'has-error' : null ?>">
                            <label>Nama barang *</label>
                            <input type="text" name="nama_brg" value="<?=set_value('nama_brg',$barang->barang_nama);?>" class="form-control">
                            <?=form_error('nama_brg'); ?>
                        </div>
                        <div class="form-group <?=form_error('kategori_id') ? 'has-error' : null ?>">
                            <label>Kategori *</label>
                            <select name="kategori_id" class="form-control">
                              <option value="">-Pilih-</option>
                              <?php foreach ($kategori->result() as $row): ?>
                                <option value="<?=$row->kategori_id  ?>" <?= set_value('kategori_id',$barang->kategori_id) == $row->kategori_id ? 'selected' : null; ?>><?= $row->kategori_nama; ?></option>
                              <?php endforeach ?>
                            </select>
                            <?=form_error('kategori_id'); ?>
                        </div>
                        <div class="form-group <?=form_error('satuan_id') ? 'has-error' : null ?>">
                            <label>Satuan *</label>
                            <select name="satuan_id" class="form-control">
                              <option value="">-Pilih-</option>
                              <?php foreach ($satuan->result() as $row): ?>
                                <option value="<?=$row->satuan_id ?>" <?= set_value('satuan_id',$barang->satuan_id) == $row->satuan_id ? 'selected' : ''; ?>><?= $row->satuan_nama; ?></option>
                              <?php endforeach ?>
                            </select>
                            <?=form_error('satuan_id'); ?>
                        </div>
                        <div class="form-group <?=form_error('harga') ? 'has-error' : null ?>">
                            <label>Harga *</label>
                            <input type="text" name="harga" value="<?=set_value('harga',$barang->harga);?>" class="form-control">
                            <?=form_error('harga'); ?>
                        </div>
                        <div class="form-group ">
                            <label>Gambar</label>
                                <?php if($page == 'edit') {?>
                                    <?php if($barang->gambar != null) {?>
                                        <div style="margin-bottom:5px">
                                            <img src="<?=base_url('uploads/produk/'.$barang->gambar)?>" style="width:55%" >
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <input type="file" name="gambar" class="form-control" >
                            <small>(Biarkan kosong jika tidak <?=$page == 'edit' ? 'diganti' : 'ada' ?>)</small>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?=$page?>" class="btn btn-primary btn-flat">Simpan</button>
                            <button type="reset" class="btn btn-default btn-flat">Reset</button>
                        </div>
                    <?=form_close() ?>
                </div>
            </div>
        </div>
    </div>
	
</section>