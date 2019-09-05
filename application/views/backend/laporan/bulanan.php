<div class="row">
	
	<div class="col-md-5">
        <form action="<?= base_url() ?>admin/laporan/bulanan" method="post">
            
		<div class="form-group">
			<label>Pilih Bulan</label>
			<select name="bulan" class="form-control">
                <option selected disabled>- Pilih Bulan -</option>
                <?php 
                $bulan = array("Januari","Februaru","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"); 
                 ?>
                <?php 
                for ($i =0; $i < count($bulan) ; $i++) { ?>
                    <option value="<?= $i+1 ?>"><?= $bulan[$i] ?></option>
                <?php } ?>
            </select>
		</div>
	</div>
    <div class="col-md-5">
        <div class="form-group">
            <label>Pilih Tahun</label>
            <select name="tahun" class="form-control">
                <option disabled selected>- Pilih Tahun - </option>
            <?php 
            $tahun = 2013; 
            for ($i = 0; $i < 10 ; $i++) { ?>
                <option><?= $tahun ?></option>
            <?php $tahun++; } ?>
            </select>
        </div>
    </div>
	<div class="col-md-2">
		<button type="submit" name="lihat" class="btn btn-primary mt-6">Lihat</button>
        <button type="button" class="btn btn-info mt-6" onclick="printContent('print')">Print</button>
		</form>
		
	</div>
</div>
<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>
<hr>

<div class="row mt-2">
	<div class="col-md-12">
    <h4>List Data</h4>
		<!-- Tables -->
        <div class="" id="print">
                <div class="table-responsive p-5">
                    <div class="-3">
                    <table  class="table table-striped table-bordered table-hover p-3">
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
    
                </div>
                </div>
                                    <!-- /tables -->
	</div>
</div>
</div>