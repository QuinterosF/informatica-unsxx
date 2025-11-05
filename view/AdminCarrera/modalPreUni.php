<dimodalPreUniv id="modalPreUni" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Editar Curso Pre-Universitario</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- ############## Formulario nuevo curso ################# -->
            <form method="post" id="preuni_form">
                <div class="modal-body">
                    <p class="form-control-label tx-12">Obligatorio ( <span class="tx-danger">*</span> )</p>

                    <!-- ################### INPUT HIDDEN PARA EL id_adm ################# -->
                    <input type="hidden" name="idx_adm_pre" id="idx_adm_pre">
                    <input type="hidden" id="id_adm_pre" name="id_adm_pre" value="2">

                    <div class="form-layout">
                        <div class="form-group">
                            <label class="form-control-label">¿Cómo debo inscribirme?: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" type="text" name="proc_adm_pre" id="proc_adm_pre"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Requisitos: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" type="text" name="req_adm_pre" id="req_adm_pre"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Afiche Publicitario: <i class="icon ion-image tx-20">
                                    &nbsp; </i><span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" accept="image/png, image/jpg, image/jpeg"
                                name="img_adm_pre" id="img_adm_pre">
                        </div>
                        <div class="form-group">
                            <p id="img_adm_pre_preview">
                                <!-- <img src="../../images/img_default.jpg" class="img-fluid"> -->
                            </p>
                        </div>
                    </div><!-- form-layout -->

                </div>
                <div class="modal-footer">
                    <button name="aceptar" type="submit"
                        class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        onclick="guardar_preuni()">Aceptar</button>
                    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div>