<div id="modalmantenimiento" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="lbl_titulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" id="usuarios_form">
                <div class="modal-body">
                    <label id="psw" class="form-control-label"></label>

                    <p class="form-control-label tx-12">Obligatorio ( <span class="tx-danger">*</span> )</p>
                    <!-- ################### INPUT HIDDEN PARA EL usu_id ################# -->
                    <input type="hidden" name="usu_id" id="usu_id">

                    <div class="form-layout">
                        <div class="form-group">
                            <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="usu_nom" id="usu_nom">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Correo electrónico: <span
                                    class="tx-danger">*</span></label>
                            <input class="form-control" type="email" name="usu_correo" id="usu_correo">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Permisos: <span class="tx-danger">*</span></label>
                            <table class="table display responsive nowrap">
                                <tbody>
                                    <tr>
                                        <td>Acerca de</td>
                                        <td class="wd-5p">
                                            <label class="ckbox ckbox-success"> <input type="checkbox" value="1"
                                                    name="acerca_de" id="acerca_de">
                                                <span>&nbsp;</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Carrera</td>
                                        <td class="wd-5p">
                                            <label class="ckbox ckbox-success"> <input type="checkbox" value="1"
                                                    name="carrera" id="carrera">
                                                <span>&nbsp;</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Comunicados</td>
                                        <td class="wd-5p">
                                            <label class="ckbox ckbox-success"> <input type="checkbox" value="1"
                                                    name="comunicados" id="comunicados">
                                                <span>&nbsp;</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Laboratorios</td>
                                        <td class="wd-5p">
                                            <label class="ckbox ckbox-success"> <input type="checkbox" value="1"
                                                    name="laboratorios" id="laboratorios">
                                                <span>&nbsp;</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Plantel Docente</td>
                                        <td class="wd-5p">
                                            <label class="ckbox ckbox-success"> <input type="checkbox" value="1"
                                                    name="docentes" id="docentes">
                                                <span>&nbsp;</span></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Extensión</td>
                                        <td class="wd-5p">
                                            <label class="ckbox ckbox-success"> <input type="checkbox" value="1"
                                                    name="extension" id="extension">
                                                <span>&nbsp;</span></label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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