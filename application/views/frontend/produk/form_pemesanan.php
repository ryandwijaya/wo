<div class="row">
	<div class="col-md-8">
		<form action="<?= base_url() ?>pesan/<?= $produk['produk_id'] ?>" method="POST">
			<div class="form-group">
				<label class="text-primary">TANGGAL ACARA</label>
				<input type="date" name="tgl_acara" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Nama Pemesan</label>
				<input type="hidden" name="pelanggan_id" value="<?= $pelanggan['pelanggan_id'] ?>">
				<input type="text" name="nama" class="form-control" readonly value="<?= $pelanggan['pelanggan_nama'] ?>">
			</div>
			<hr class="border-dashed my-8">
			<div class="form-group">
				<label>Alamat Pemesan</label>
				<input type="text" name="alamat" class="form-control" readonly value="<?= $pelanggan['pelanggan_alamat'] ?>">
			</div>
			<hr class="border-dashed my-8">
			<div class="form-group">
				<label>Email Pemesan</label>
				<input type="text" name="email" class="form-control" readonly value="<?= $pelanggan['pelanggan_email'] ?>">
			</div>
			<hr class="border-dashed my-8">
			<div class="form-group">
				<label>Nomor HP Pemesan</label>
				<input type="text" name="nope" class="form-control" readonly value="<?= $pelanggan['pelanggan_nope'] ?>">
			</div>
	</div>
	<div class="col-md-4">
		<table class="table-bordered table">
			<tr>
				<td>Nama Produk</td>
				<td>:</td>
				<input type="hidden" name="produk_id" value="<?= $produk['produk_id'] ?>">
				<td><?= $produk['produk_nama'] ?></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>:</td>
				<td><?= $produk['produk_deskripsi'] ?></td>
			</tr>
			<tr>
				<td>Kategori Produk</td>
				<td>:</td>
				<td><?= $produk['kategori_nama'] ?></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td>:</td>
				<td><img src="<?=base_url('assets/upload/images/produk/'.$produk['produk_foto'])?>" alt="Foto" width="150" height="150"></td>
			</tr>
			<tr>
				<td>Harga Produk</td>
				<td>:</td>
				<input type="hidden" name="total" value="<?= $produk['produk_harga'] ?>">
				<td><b>Rp. <?= nominal($produk['produk_harga']) ?> ,-</b> </td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><button type="submit" name="beli" class="btn form-control btn-success btn-sm float-right"><i class="fa fa-money"></i> Pesan</button></td>
			</tr>
			
		</table>
		</form>
	</div>
</div>