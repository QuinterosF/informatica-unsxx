<div id="modalAfiche" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Editar Afiche Publicitario</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" id="afiche_form" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- ################### INPUT HIDDEN PARA EL id_inc ################# -->
                    <input type="hidden" name="id_inc" class="id_inc">

                    <div class="form-layout">
                        <div class="form-group">
                            <label class="form-control-label">Afiche Publicitario: <i class="icon ion-image tx-20">
                                    &nbsp; </i><span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" accept="image/png, image/jpg, image/jpeg"
                                name="nom_afiche" id="nom_afiche">
                        </div>
                        <div class="form-group">
                            <p id="afiche">
                                <!-- <img src="../../images/img_default.jpg" class="img-fluid"> -->
                            </p>
                        </div>
                    </div><!-- form-layout -->

                </div>
                <div class="modal-footer">
                    <button name="aceptar" type="submit" onclick="guardar_afiche()"
                        class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">Aceptar</button>
                    <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                        data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div>