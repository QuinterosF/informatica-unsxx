<div id="modalLogros" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="lbl_titulo_logros" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form method="post" id="logros_form">
                <div class="modal-body">
                    <p class="form-control-label tx-12">Obligatorio ( <span class="tx-danger">*</span> )</p>

                    <!-- ################### INPUT HIDDEN PARA EL id_log ################# -->
                    <input type="hidden" name="id_log" id="id_log">

                    <div class="form-layout">
                        <div class="form-group">
                            <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="nom_log" id="nom_log">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Lugar: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="lugar_log" id="lugar_log">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Fecha: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="fech_log" id="fech_log">
                        </div>
                    </div><!-- form-layout -->

                </div>
                <div class="modal-footer">
                    <button id="guardar_logros" name="aceptar" type="button"
                        class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        onclick="guardar_editar_logro()"></button>
                    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </form>
            
        </div>
    </div><!-- modal-dialog -->
</div>