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
					<th>Bank</th>
					<th>Harga</th>
					<th>Jumlah Bayar</th>
					<th>Tanggal Bayar</th>
					<th>Bukti</th>
					<th class="text-center">status</th>
					
						
					<th>Aksi</th>
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
					<td><?= $value['pembayaran_bank'] ?></td>
					<td>Rp. <?= nominal($value['produk_harga']) ?> ,-</td>
					<td>Rp. <?= nominal($value['pembayaran_jumlah']) ?> ,-</td>
					<td><?= date_indo($value['pembayaran_tgl']) ?></td>
					<?php $jumlah = $jumlah+$value['produk_harga']; ?>
					<td><a href="<?= base_url() ?>assets/upload/bukti/<?= $value['pembayaran_bukti'] ?>"><?= $value['pembayaran_bukti'] ?></a></td>
					
					<td class="text-center">
						<?php 
						$total =  $value['produk_harga']-$value['pembayaran_jumlah'];

						 ?>
						 <?php if ($total==0){ ?>
						 	<span class="text-success">Lunas</span>
						 <?php }elseif($total>0){ ?>
						 	<?php if ($value['pembayaran_status']=='dikonfirmasi'){ ?>
						 		
						 <span class="text-success">Lunas</span>
						 	<?php }else{ ?>
						 <span class="text-danger">Sisa <br>Rp. <?= nominal($total) ?> ,-</span>

						 	<?php } ?>
						 <?php } ?>
					</td>
					<?php if ($this->session->userdata('session_level')=='pelanggan'){ ?>
						<?php if ($value['pembayaran_status']=='dikonfirmasi'){ ?>
						<td><a href="#" class="btn btn-success btn-sm"  data-toggle="tooltip"
							   data-original-title="Cetak Kwitansi"><i class="fa fa-print"></i></a></td>
						<?php }else{ ?>
						<td><a disable class="btn btn-success btn-sm" data-toggle="tooltip"
							   data-original-title="Belum dikonfirmasi"><i class="fa fa-print"></i></a></td>	
						<?php } ?>
					<?php } ?>
					<?php if ($this->session->userdata('session_level')=='admin'  ): ?>
						<?php if ($value['pembayaran_status']=='dikonfirmasi'){ ?>
							<td><span class="text-success">Sudah dikonfirmasi</span></td>
						<?php }else{ ?>
						<td><a href="<?= base_url() ?>pembayaran/konfirmasi/<?= $value['pembayaran_id'] ?>" onclick="return confirm('Tekan ya untuk melanjutkan')" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a></td>
						<?php } ?>
					<?php endif ?>
				</tr>
				<?php 
					$no++;
				endforeach;
				?>
				</tbody>
				<?php if ($this->session->userdata('session_level')=='admin'): ?>
					
				<tfoot>
					<tr>
						<td colspan="8" class="text-center">Total</td>
						<td colspan="2">Rp. <?= nominal($jumlah) ?> ,-</td>
					</tr>
				</tfoot>
				<?php endif ?>
			</table>

		</div>
		<!-- /tables -->

	</div>
	<!-- /card body -->

