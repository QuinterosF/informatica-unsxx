<div id="modalMov" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Editar Laboratorio de<br>Computación Móvil
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- ############## Formulario nuevo curso ################# -->
            <form method="post" id="lab_mov_form">
                <div class="modal-body">
                    <p class="form-control-label tx-12">Obligatorio ( <span class="tx-danger">*</span> )</p>

                    <!-- ################### INPUT HIDDEN PARA EL id_lab_mov ################# -->
                    <input type="hidden" id="id_lab_mov" name="id_lab_mov">

                    <div class="form-layout">
                        <div class="form-group">
                            <label class="form-control-label">Responsable de Laboratorio: <span
                                    class="tx-danger">*</span></label>
                            <select class="form-control select2 combo_resp" style="width: 100%" name="resp_lab_mov"
                                id="resp_lab_mov" data-placeholder="Seleccione">
                                <!-- ########################################################### -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Horario (PDF): <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" accept="application/pdf" name="horario_lab_mov"
                                id="horario_lab_mov">
                        </div>
                    </div><!-- form-layout -->

                </div>
                <div class="modal-footer">
                    <button name="aceptar" type="button"
                        class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        onclick="guardar_lab_mov()">Aceptar</button>
                    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div>