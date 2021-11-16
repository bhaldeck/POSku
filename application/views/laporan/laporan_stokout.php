<section class="content-header">
	<h1>
		Laporan Stok Keluar
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard"></i></a>
		</li>
		<li><a href="#">Laporan</a></li>
		<li class="active">Stok</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Filter Data</h3>
        </div>
        <div class="box-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tgl</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date1" id="date1" value="<?=@$post['date1']?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">s/d</label>
                                <div class="col-sm-10">
                                    <input type="date" name="date2" id="date2" value="<?=@$post['date2']?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Barcode</label>
                                <div class="col-sm-9">
                                    <input type="text" name="barcode" value="<?=@$post['barcode']?>" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" name="reset" class="btn btn-flat">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                            <button type="submit" name="filter" id="filter" class="btn btn-info btn-flat">
                                <i class="fa fa-search"></i> Filter
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

	<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Laporan Stok Masuk</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="tabel3" class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th style='width:20px'>#</th>
                        <th>Tanggal</th>
                        <th>Barcode</th>
                        <th>Nama Produk</th>
                        <th style='width:20px'>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no =  $this->uri->segment(3) ? $this->uri->segment(3) +1 : 1 ;
                    foreach($row->result() as $key => $data) { ?> 
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=local_date($data->tanggal)?></td>
                        <td><?=$data->barcode?></td>
                        <td><?=$data->barang_nama?></td>
                        <td><?=$data->qty?></td>
                        <td><?=$data->detail?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
	
</section>

<script>
$(document).ready(function () {
    $('#tabel3').DataTable( {
        'paging' : true,
        'lengthChange' : false,
        'bFilter': false,
        'bInfo': false,
        dom: 'Bfrtip',
        buttons: [
            'print'
        ],
        pageLength: 5
    })
})

$(document).on('click', '#filter', function () {
    var date1 = $('#date1').val()
    var date2 = $('#date2').val()

    if(!date1 && date2){
        alert('Pilih tanggal awal')
    } 
    if(date1 && !date2){
        alert('Pilih tanggal akhir')
    } 
})
</script>

