<div class="row">
	<div class="col-md-5">
		<form action="<?= base_url() ?>admin/laporan" method="post">
			
		<div class="form-group">
			<label>Pilih Tanggal Dari</label>
			<input type="date" class="form-control" name="tgl_dari">
            <input type="hidden" name="tgl_dari1" value="<?= $this->input->post('tgl_dari') ?>">
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group">
			<label>Pilih Tanggal Sampai</label>
			<input type="date" class="form-control" name="tgl_sampai">
            <input type="hidden" name="tgl_sampai1" value="<?= $this->input->post('tgl_sampai') ?>">
		</div>
	</div>
	<div class="col-md-2">
		<button type="submit" name="lihat" class="btn btn-primary mt-6">Lihat</button>
        <button type="submit" name="export" class="btn btn-info mt-6">Export</button>
		</form>
		
	</div>
</div>


<div class="row p-5">

	<div class="col-md-12">
		<!-- Tables -->
                                    <div class="table-responsive">

                <table id="data-table" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Produk</th>
                    <th>Total Harga</th>
                    <th class="text-center">Pembelian Status</th>
                    <th>Tgl Beli</th>
                </tr>
                </thead>
                <tbody>
                
                <?php
                $no = 1;
                foreach ($pembelian as $key=>$value):
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $value['pelanggan_nama'] ?></td>
                    <td><?= $value['produk_nama'] ?></td>
                    <td>Rp. <?= nominal($value['pembelian_total']) ?> ,-</td>
                    <td class="text-center"><?= $value['pembelian_status'] ?></td>
                    <td><?php
                        $waktu = explode(' ',$value['pembelian_tgl']);
                        ?>
                        <?= date_indo($waktu[0]) ?> | <?= $waktu[1] ?>
                    </td>
                    
                    
                </tr>
                <?php 
                    $no++;
                endforeach;
                ?>
                </tbody>
            </table>

                                    </div>
                                    <!-- /tables -->
	</div>
</div>
</div>