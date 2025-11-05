<div id="modalSelectExt" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Seleccionar Actividad de Extensión</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- ############## Formulario nuevo curso ################# -->
            <form method="post" id="ext_select_form">
                <div class="modal-body">

                    <!-- ################### INPUT HIDDEN PARA EL CUR_ID ################ -->
                    <input type="hidden" name="id_ext_select" id="id_ext_select">
                    <input type="hidden" name="nom_ext_select" id="nom_ext_select">

                    <div class="table-wrapper">
                        <table id="ext_select_data" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Nombre</th>
                                    <th class="wd-10p"> </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
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