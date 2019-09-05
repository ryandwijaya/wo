<div class="dt-card">

	<!-- Card Body -->
	<div class="dt-card__body">

		<!-- Tables -->
		<div class="table-responsive">

			<table id="data-table" class="table table-striped table-bordered table-hover">
				<thead>
				<tr>
					<th>No</th>
					<th>Pembelian</th>
					<th>Nama</th>
					<th>Bukti</th>
					<th>Harga</th>						
				</tr>
				</thead>
				<tbody>
				
				<?php
				$no = 1;
				$jumlah = 0;
				foreach ($pembayaran as $key=>$value):
				?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $value['produk_nama'] ?></td>
					<td><?= $value['pembayaran_nama'] ?></td>
					
					<?php $jumlah = $jumlah+$value['produk_harga']; ?>
					<td><a href="<?= base_url() ?>assets/upload/bukti/<?= $value['pembayaran_bukti'] ?>"><?= $value['pembayaran_bukti'] ?></a></td>
					<td>Rp. <?= nominal($value['produk_harga']) ?> ,-</td>
					
				</tr>
				<?php 
					$no++;
				endforeach;
				?>
				</tbody>
				<?php if ($this->session->userdata('session_level')=='admin'): ?>
					
				<tfoot>
					<tr>
						<td colspan="4" class="text-center">Total</td>
						<td colspan="1">Rp. <?= nominal($jumlah) ?> ,-</td>
					</tr>
				</tfoot>
				<?php endif ?>
			</table>

		</div>
		<!-- /tables -->

	</div>
	<!-- /card body -->

