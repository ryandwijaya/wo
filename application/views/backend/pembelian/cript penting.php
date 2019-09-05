<!-- Modal Delete -->
                <div class="modal fade bd-example-modal-sm" id="modal_delete_m_n" tabindex="-1" role="dialog"
                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Bayar	?</h5>
                            </div>

                            <div class="modal-body">
                                <form action="" id="form-ok">
                                	<div class="form-group">
                                		<label>Bank</label>
                                		<input type="text" name="pembayaran_bank" class="form-control" required>
                                	</div>
                                	<div class="form-group">
                                		<label>Tgl Bayar</label>
                                		<input type="date" name="pembayaran_tgl" class="form-control" required>
                                	</div>
                                	<div class="form-group">
                                		<label>Bukti</label>
                                		<input type="file" class="form-control"  name="pembayaran_bukti" required>
                                	</div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Bayar</button>
                                
                            </div>

                        </div>
                    </div>
                </div>
                <script>
                    function confirm_modal(delete_url, title) {
                        jQuery('#modal_delete_m_n').modal('show', {backdrop: 'static', keyboard: false});
                        jQuery("#modal_delete_m_n .grt").text(title);
                        document.getElementById('form-ok').setAttribute("action", delete_url);
                        document.getElementById('form-ok').focus();
                    }
                </script>
