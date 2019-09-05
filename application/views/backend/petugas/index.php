
<div class="dt-card">

    <!-- Card Body -->
    <div class="dt-card__body">

       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#defaul-modal">
            Tambah Petugas
        </button><hr>
        <!-- Tables -->
        <div class="table-responsive">

            <table id="data-table" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Petugas</th>
                    <th>Nomor HP</th>
                    <th class="text-center"><i class="fa fa-cog animation-customizer"></i></th>
                </tr>
                </thead>
                <tbody>
				<?php
				$no = 1;
				foreach ($petugas as $key=>$value):
				?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$value['petugas_nama']?></td>
                    <td><?=$value['petugas_nope']?></td>
                    <td class="text-center">
                       
                        <a href="<?=base_url('admin/petugas/hapus/'.$value['petugas_id'])?>" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-html="true" title data-original-title="Hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')"><i class="fa fa-trash"></i></a>
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
    <!-- /card body -->



    <!-- Modal -->
                                    <div class="modal fade" id="defaul-modal" tabindex="-1" role="dialog"
                                         aria-labelledby="model-1"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">

                                            <!-- Modal Content -->
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="model-1">Tambah Petugas</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- /modal header -->

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <form action="<?= base_url() ?>admin/petugas/tambah" method="POST">
                                                        <div class="form-group">
                                                            <label>Nama Petugas</label>
                                                            <input type="text" name="nama" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nomor HP</label>
                                                            <input type="text" name="nope" class="form-control" required>
                                                        </div>
                                                        
                                                </div>
                                                <!-- /modal body -->

                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        Tambah
                                                    </button>
                                                    </form>
                                                </div>
                                                <!-- /modal footer -->

                                            </div>
                                            <!-- /modal content -->

                                        </div>
                                    </div>
                                    <!-- /modal -->
