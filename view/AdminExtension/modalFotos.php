<div id="modalFotos" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="title" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- ############## Formulario nuevo curso ################# -->
            <form method="post" id="fotos_form">
                <div class="modal-body">

                    <!-- ################### INPUT HIDDEN PARA EL CUR_ID ################ -->
                    <input type="hidden" name="id_ext_fotos" id="id_ext_fotos">

                    <div class="form-layout">
                        <div class="form-group">
                            <label class="form-control-label">Seleccionar fotos: <i class="icon ion-images tx-20">
                                    &nbsp; </i><span class="tx-danger">*</span></label>
                                    <br>
                            <label class="form-control-label tx-warning">Se recomienda agregar entre 5 y 10 fotos</label>
                            <input class="form-control" type="file" accept="image/png, image/jpg, image/jpeg"
                                name="fotos[]" id="fotos" multiple>
                        </div>
                    </div><!-- form-layout -->

                </div>
                <div class="modal-footer">
                    <button id="guardar" type="submit" name="action" value="add"
                        class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Aceptar</button>
                    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div>