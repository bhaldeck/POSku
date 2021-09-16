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
    <?php $this->view('message');?>
	<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Barcode Generator</h3>
            <div class="pull-right">
            <a href="<?=site_url('barang') ?>" class="btn btn-primary btn-flat btn-sm">
                <i class="fa fa-undo"></i> Kembali
            </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php
                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '" style="200px">';                
            ?>
            <br>
            <?=$row->barcode?>
            <br><br>
            <a href="<?=site_url('barang/barcode_print/'.$row->barang_id) ?>" target="_blank" class="btn btn-default btn-sm">
                <i class="fa fa-print"></i>Print
            </a>
        </div>
    </div>
	
</section>