<div class="row">
	<div class="col-md-12">
		<button class="btn btn-success btn-sm float-right" onclick="printContent('print')"><i class="fa fa-print"></i></button>
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
<div id="print" class="border mt-2">
	<hr>
<div class="row p-3" >
	<div class="col-md-12 p-5" >
		<h2 style="text-align: center;">KWITANSI PEMBAYARAN LUNAS</h2>
		<p>
			Tanggal : <?= date_indo($pembayaran['pembayaran_tgl']) ?>
		</p>
		<p>
			Telah membayar LUNAS,sejumlah  <span class="text-primary"><b>Rp. <?= nominal($pembayaran['produk_harga']) ?></b></span> dengan rincian sebagai berikut :
		</p>
		<table class="table table-bordered">
			<tr>
				<th>Dari Bank</th>
				<th>Nama Produk</th>
				<th>Total Harga</th>
				<th>Tgl Beli</th>
				<th>Tgl Bayar</th>
			</tr>
			<tr>
				<td><?= $pembayaran['pembayaran_bank'] ?></td>
				<td><?= $pembayaran['produk_nama'] ?></td>
				<td><?= nominal($pembayaran['produk_harga']) ?></td>
				<td><?= date_indo($pembayaran['pembelian_tgl']) ?></td>
				<td><?= date_indo($pembayaran['pembayaran_tgl']) ?></td>
			</tr>
		</table>
	</div>
</div>
<div class="row  p-3" style="justify-content: right;">
	<div class="col-md-3 text-center">
		<p>
			An. Pembeli
		</p>
		<br><br><br>
		<p>
			<?= $pembayaran['pelanggan_nama'] ?>
		</p>
	</div>
</div>

<hr>
</div>