<div class="row">
	<div class="col-md-8">
		<h4><?= $pembelian['produk_nama'] ?></h4><br>
		<div class="row">
			<div class="col-md-7">
				
		<img src="<?= base_url() ?>assets/upload/images/produk/<?= $pembelian['produk_foto'] ?>" alt="foto" width="400" height="280">
			</div>
			<div class="col-md-5">
				<table>
					<tr>
						<td>Nama Pembeli</td>
						<td>:</td>
						<td><?= $pembelian['pelanggan_nama'] ?></td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td>:</td>
						<td><?= $pembelian['produk_deskripsi'] ?></td>
					</tr>
					<tr>
						<td>Harga</td>
						<td>:</td>
						<td>Rp. <?= nominal($pembelian['produk_harga']) ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<h4>List Petugas</h4>
		<table class="table">
			<tr>
				<th>No</th>
				<th>Nama Petugas</th>
				<th>Nomor Hp</th>
			</tr>
			<?php $tugas=$this->PembelianModel->cek_petugas($pembelian['pembelian_id']); ?>
			<?php $no=1;
			foreach ($tugas as $value): ?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $value['petugas_nama'] ?></td>
					<td><?= $value['petugas_nope'] ?></td>
				</tr>
			<?php $no++; endforeach ?>
					
		</table>
	</div>
</div>