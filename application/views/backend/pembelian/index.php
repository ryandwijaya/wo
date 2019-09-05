<div class="dt-card">
    
    <?php if ($this->session->userdata('session_level')=='pelanggan'): ?>
        
    <div class="dt-card__header">
       <div class="alert alert-primary alert-dismissible fade show" role="alert" style="width: 100%;">
            <h4>Note :</h4>
            <strong>Untuk Pembayaran DP minimal 30% Pembayaran dari Harga Produk !!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <?php endif ?>
	<!-- Card Body -->
	<div class="dt-card__body">


		<!-- Tables -->
        <?php if ($this->session->userdata('session_level')=='admin'): ?>
            
                <a href="<?= base_url() ?>pembelian/exportBayar" ><button data-toggle="tooltip" data-html="true" title data-original-title="Export Laporan Sudah Bayar" class=" btn btn-success btn-sm ml-3 mb-4" ><i class="fa fa-print"></i></button></a>
                <a href="<?= base_url() ?>pembelian/exportBelum" ><button data-toggle="tooltip" data-html="true" title data-original-title="Export Laporan Belum Bayar" class=" btn btn-warning btn-sm ml-3 mb-4" ><i class="fa fa-print"></i></button></a>
        <?php endif ?>

                <hr>
		<div class="table-responsive" id="print">

			<table id="data-table" class="table table-striped table-bordered table-hover">
				<thead>
				<tr>
					<th>No</th>
                    <?php if ($this->session->userdata('session_level')=='admin'): ?>
					<th>Nama Pembeli</th>
                    <?php endif ?>
					<th>Produk</th>
                    <th>DP</th>
                    <th>Sisa Bayar</th>
                    <th>Bukti DP</th>
					<th>Tgl Beli</th>
                    <th>Tgl Acara</th>
					<th class="text-center"><i class="fa fa-cog animation-customizer"></i></th>
				</tr>
				</thead>
				<tbody>
				
				<?php
				$no = 1;
                $total_belanja = 0;
				foreach ($pembelian as $key=>$value):
				?>
                <?php 
                $get_pembayaran = $this->PembayaranModel->lihat_satu_pembelian($value['pembelian_id']);
                 ?>
				<tr>
					<td><?= $no ?></td>
                    <?php if ($this->session->userdata('session_level')=='admin'){ ?>
                    <td><?= $value['pelanggan_nama'] ?></td>
                    <?php } ?>
					<td><?= $value['produk_nama'] ?> <br> <span class="text-success">Rp. <?= nominal($value['pembelian_total']) ?> ,- </span></td>
                    <?php if ($get_pembayaran['pembayaran_jumlah']==0){ ?>
                        <td class="text-center text-warning"><span class="animated fadeIn infinite">Belum dibayar</span></td>
                        <td class="text-center text-warning"><span class="animated fadeIn infinite">Belum dibayar</span></td>
                        <td class="text-center text-warning"><span class="animated fadeIn infinite">Belum dibayar</span></td>
                    <?php }else{ ?>

                    <td>Rp. <?= nominal($get_pembayaran['pembayaran_jumlah']) ?> ,-</td>
                    <?php if ($get_pembayaran['pembayaran_status']=='dikonfirmasi'){ ?>
                    <td class="text-center text-success">LUNAS</td>
                    <?php }else{ ?>

                    <td>Rp. <?= nominal($value['pembelian_total']-$get_pembayaran['pembayaran_jumlah']) ?> ,-</td>
                    <?php } ?>
					<td class="text-center"><a href="<?= base_url() ?>assets/upload/bukti/<?= $get_pembayaran['pembayaran_bukti'] ?>"><?= $get_pembayaran['pembayaran_bukti'] ?></a></td>
                    <?php } ?>
					<td><?php
						$waktu = explode(' ',$value['pembelian_tgl']);
						?>
						<?= date_indo($waktu[0]) ?> | <?= $waktu[1] ?>
					</td>
                    <td class="text-center"><?= date_indo($value['pembelian_tgl_acara']) ?></td>
					<?php $total_belanja=$total_belanja+$value['produk_harga'] ?>
					<td class="text-center">
						<?php if ($this->session->userdata('session_level')=='pelanggan'){ ?>
							     <?php $c_bayar= $this->PembelianModel->cek_pembayaran($value['pembelian_id']); ?>
                                 <?php if ($c_bayar>0){ ?>
                                     <a href="<?= base_url() ?>kwitansi/dp/<?= $value['pembelian_id'] ?>" class="btn btn-success btn-sm"  data-toggle="tooltip"
                                        data-original-title="Cetak Kwitansi"><i class="fa fa-print"></i></a>
                                    <?php if ($get_pembayaran['pembayaran_status']=='dikonfirmasi'): ?>
                                        <a href="<?= base_url() ?>kwitansi/lunas/<?= $value['pembelian_id'] ?>" class="btn btn-primary btn-sm"  data-toggle="tooltip"
                                        data-original-title="Cetak Kwitansi Lunas"><i class="fa fa-print"></i></a>
                                    <?php endif ?>
                                 <?php }else{ ?>
                                    <?php $minim_dp = $value['pembelian_total']*30/100; ?>
						              <a href="" data-toggle="modal"
                                       onclick="confirm_modal('<?php echo site_url("bayar/" . $value['pembelian_id']); ?>','Bayar','<?= $value['pembelian_id'] ?>','<?= $minim_dp ?>');"
                                       data-target=".bd-example-modal-sm" class="btn btn-outline-success btn-sm"><i class="fa fa-money" title="Bayar"></i></a>
                                <?php } ?>
						<?php }else{ ?>
                        <?php $tugas=$this->PembelianModel->cek_petugas($value['pembelian_id']); ?>
                        <?php if (count($tugas)>0){ ?>
                            <a href="<?= base_url() ?>pembelian/detail/<?= $value['pembelian_id'] ?>" class="btn btn-outline-info btn-sm"
                                        ><i class="fa fa-eye"></i></a>
                        <?php }else{ ?>
                        <a href="" data-toggle="modal"
                                       onclick="add_petugas('<?= base_url() ?>add/petugas/<?= $value['pembelian_id'] ?>','Tambah Petugas');" class="btn btn-outline-primary btn-sm" title="Pilih Petugas"
                                        ><i class="fa fa-group"></i></a><br>
                                    <?php } ?>
                    	<?php } ?>
                        <?php if ($this->session->userdata('session_level')=='admin'): ?>
                                <?php if ($get_pembayaran['pembayaran_status']=='dikonfirmasi'){ ?>
                                        <span class="mt-4"><i class="fa fa-check"></i></span>
                                <?php }else{ ?> 
                                    <a href="<?= base_url() ?>pembayaran/konfirmasi/<?= $get_pembayaran['pembayaran_id'] ?>" onclick="return confirm('Konfirmasi ?')" class="btn btn-success btn-sm mt-2" title="Konfirmasi Lunas"
                                        ><i class="fa fa-check"></i></a>
                                <?php } ?>
                        <?php endif ?>
						 
					</td>
				</tr>
				<?php 
					$no++;
				endforeach;
				?>
				</tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"><b>Total</b></td>
                        <td colspan="5" class="text-center"><b>Rp. <?= nominal($total_belanja) ?> ,- </b></td>
                    </tr>
                </tfoot>
			</table>

		</div>
		<!-- /tables -->

	</div>
	<!-- /card body -->

<!-- Modal Delete -->
                <div class="modal fade bd-example-modal-sm" id="modal_delete_m_n" tabindex="-1" role="dialog"
                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Bayar DP?</h5>
                            </div>

                            <div class="modal-body">
                                <!-- <form action="" id="form-ok" method="POST"> -->
                                	<?= form_open('',array('enctype'=>'multipart/form-data','id'=>'form-ok')) ?>

                                	<div class="form-group">
                                		<input type="hidden" name="pembayaran_pembelian" id="pembelian" class="form-control" required>
                                	</div>
                                	<div class="form-group">
                                		<label>Bank</label>
                                		<input type="text" name="pembayaran_bank" class="form-control" required>
                                	</div>
                                	<div class="form-group">
                                		<label>Jumlah Bayar</label>
                                		<input type="number" name="pembayaran_jumlah" id="dp"  class="form-control" required>
                                	</div>
                                	<div class="form-group">
                                		<label>Tgl Bayar</label>
                                		<input type="date" name="pembayaran_tgl" class="form-control" required>
                                	</div>
                                	<div class="form-group">
                                		<label>Bukti</label>
                                		<input type="file" class="form-control"  name="foto" required>
                                	</div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-primary btn-sm">Bayar</button>
                                
                            </div>
                                </form>

                        </div>
                    </div>
                </div>
                 <div class="modal fade bd-example-modal-sm" id="modal_petugas" tabindex="-1" role="dialog"
                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Petugas</h5>
                            </div>

                            <div class="modal-body">
                                <!-- <form action="" id="form-ok" method="POST"> -->
                                	<form action="" class="form-oce" method="POST">
                                	<div class="form-group">
                                		<label>Petugas 1</label>
                                		<select name="petugas1" class="form-control">
                                			<option disabled selected>- Pilih Petugas -</option>
                                            <?php foreach ($petugas as $value): ?>
                                                <option value="<?= $value['petugas_id'] ?>"><?= $value['petugas_nama'] ?></option>
                                            <?php endforeach ?>
                                		</select>
                                	</div>
                                	<div class="form-group">
                                		<label>Petugas 2</label>
                                		<select name="petugas2" class="form-control">
                                			<option disabled selected>- Pilih Petugas -</option>
                                            <?php foreach ($petugas as $value): ?>
                                                <option value="<?= $value['petugas_id'] ?>"><?= $value['petugas_nama'] ?></option>
                                            <?php endforeach ?>
                                		</select>
                                	</div>
                                	<div class="form-group">
                                		<label>Petugas 3</label>
                                		<select name="petugas3" class="form-control">
                                			<option disabled selected>- Pilih Petugas -</option>
                                            <?php foreach ($petugas as $value): ?>
                                                <option value="<?= $value['petugas_id'] ?>"><?= $value['petugas_nama'] ?></option>
                                            <?php endforeach ?>
                                		</select>
                                	</div>
                                	<div class="form-group">
                                		<label>Petugas 4</label>
                                		<select name="petugas4" class="form-control">
                                			<option disabled selected>- Pilih Petugas -</option>
                                            <?php foreach ($petugas as $value): ?>
                                                <option value="<?= $value['petugas_id'] ?>"><?= $value['petugas_nama'] ?></option>
                                            <?php endforeach ?>
                                		</select>
                                	</div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-primary btn-sm">Bayar</button>
                                
                            </div>
                                </form>

                        </div>
                    </div>
                </div>
                <script>
                    function confirm_modal(delete_url, title,data_id,minim_dp) {
                        jQuery('#modal_delete_m_n').modal('show', {backdrop: 'static', keyboard: false});
                        jQuery("#modal_delete_m_n .grt").text(title);
                        document.getElementById('form-ok').setAttribute("action", delete_url);
                        document.getElementById('form-ok').focus();
                        document.getElementById('pembelian').setAttribute("value", data_id);
                        document.getElementById('pembelian').focus();
                        document.getElementById('dp').setAttribute("value", minim_dp);
                        document.getElementById('dp').setAttribute("min", minim_dp);
                        document.getElementById('dp').focus();

                    }
                     function add_petugas(urll,title) {
                        jQuery('#modal_petugas').modal('show', {backdrop: 'static', keyboard: false});
                        jQuery("#modal_petugas .grt").text(title);
                        $(".form-oce").attr("action", urll);

                    }
                </script>
