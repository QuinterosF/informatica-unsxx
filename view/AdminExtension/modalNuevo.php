<div id="modalNuevo" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="lbl_titulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- ############## Formulario nuevo curso ################# -->
            <form method="post" id="extension_form">
                <div class="modal-body">
                    <p class="form-control-label tx-12">Obligatorio ( <span class="tx-danger">*</span> )</p>

                    <!-- ################### INPUT HIDDEN PARA EL id_ext ################ -->
                    <input type="hidden" name="id_ext" id="id_ext">

                    <div class="form-layout">
                        <div class="form-group">
                            <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="nom_ext" id="nom_ext">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Fecha de la Actividad: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="date" name="fech_ext" id="fech_ext">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Descripción:</label>
                            <textarea class="form-control" type="text" name="desc_ext" id="desc_ext"></textarea>
                        </div>
                    </div><!-- form-layout -->

                </div>
                <div class="modal-footer">
                    <button id="guardar" type="submit" name="action" value="add"
                        class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"></button>
                    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div>