<div id="modalCoordinador" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Editar Coordinadores</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- ############## Formulario nuevo curso ################# -->
            <form method="post" id="coordinador_form">
                <div class="modal-body">
                    <p class="form-control-label tx-12">Obligatorio ( <span class="tx-danger">*</span> )</p>

                    <div class="form-layout">
                        <div class="form-group">
                            <label class="form-control-label">Académico: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width: 100%" name="academico" id="academico"
                                data-placeholder="Seleccione">
                                <!-- ########################################################### -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Seguridad Informática: <span
                                    class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width: 100%" name="seguridad" id="seguridad"
                                data-placeholder="Seleccione">
                                <!-- ########################################################### -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Computación Móvil: <span
                                    class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width: 100%" name="movil" id="movil"
                                data-placeholder="Seleccione">
                                <!-- ########################################################### -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">IIDAI: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width: 100%" name="iidai" id="iidai"
                                data-placeholder="Seleccione">
                                <!-- ########################################################### -->
                            </select>
                        </div>
                    </div><!-- form-layout -->

                </div>
                <div class="modal-footer">
                    <button name="aceptar" type="button"
                        class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        onclick="guardar_coordinador()">Aceptar</button>
                    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div>