
<div class="row p-5 ">
    <div class="col-md-12">
        
        <button type="button" class="btn btn-info btn-sm float-right" onclick="printContent('print')">Print</button>
    

        
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

<div class="row p-5" id="print">

	<div class="col-md-12">
        <h3 style="text-align: center;" class="mb-5 mt-4">LAPORAN ACARA</h3>
		<!-- Tables -->
                                    <div class="table-responsive">

                <table  class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Alamat</th>
                    <th>Tgl Pesan</th>
                    <th>Tgl Acara</th>
                    
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
                    <td><?= $value['pelanggan_alamat'] ?></td>
                    <td><?php
                        $waktu = explode(' ',$value['pembelian_tgl']);
                        ?>
                        <?= date_indo($waktu[0]) ?> | <?= $waktu[1] ?>
                    </td>
                    <td><?= $value['pembelian_tgl_acara'] ?></td>
                    
                    
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