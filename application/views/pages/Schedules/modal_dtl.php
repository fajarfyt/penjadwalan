<!-- Modal Add -->
<div class="modal fade text-left" id="modal-add" role="dialog" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="form">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Tanggal</label>
                                <fieldset class="form-group">
                                    <input class="form-control" value="<?php echo $tgl; ?>" readonly></input>
                                    <div class="NOTIF_ERROR_date_sch"></div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label class="control-label">Unit</label>
                                <fieldset class="form-group">
                                    <input class="form-control" value="<?php echo $unit; ?>" readonly></input>
                                    <div class="NOTIF_ERROR_id_crane"></div>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Shift</label>
                                <fieldset class="form-group">
                                    <select class="form-control" name="id_shift">
                                        <?php foreach($shift as $c) {?>
                                            <option value="<?php echo $c->id_shift; ?>"><?php echo $c->id_shift.' - '.$c->shift_desc;?> </option>
                                        <?php } ?> 
                                    </select>
                                    <div class="NOTIF_ERROR_id_shift"></div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label class="control-label">Kapal</label>
                                <fieldset class="form-group">
                                   <select class="form-control" name="id_kapal">
                                        <?php foreach($kapal as $d) {?>
                                            <option value="<?php echo $d->id_kapal?>"><?php echo $d->id_kapal.' - '.$d->nama_kapal;?> </option>
                                        <?php } ?> 
                                    </select>
                                    <div class="NOTIF_ERROR_id_kapal"></div>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <fieldset class="form-group">
                                    <select class="bootsrap-select form-control" name="id_status">
                                        <?php foreach($status as $e) {?>
                                            <option value="<?php echo $e->id_status?>"><?php echo $e->id_status.' - '.$e->desc_status;?> </option>
                                        <?php } ?> 
                                    </select>
                                    <div class="NOTIF_ERROR_status"></div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CANCEL</button>
                    <button type="button" class="btn btn-outline-primary" id="btnSave" onclick="simpan()">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div class="modal fade text-left" id="modal-edit" role="dialog" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="form-edit">
                <div class="modal-body">
                <input type="hidden" name="id_sch"></input>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Tanggal</label>
                                <fieldset class="form-group">
                                    <input class="form-control datepicker" name="date_sch"></input>
                                    <div class="NOTIF_ERROR_date_sch"></div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label class="control-label">Unit</label>
                                <fieldset class="form-group">
                                   <select class="select2edit form-control" name="id_crane">
                                        <?php foreach($crane as $b) {?>
                                            <option value="<?php echo $b->id_crane?>"><?php echo $b->id_crane.' - '.$b->desc_crane;?> </option>
                                        <?php } ?> 
                                    </select>
                                    <div class="NOTIF_ERROR_id_crane"></div>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">EHRM</label>
                                <fieldset class="form-group">
                                    <input class="form-control" name="ehrm"></input>
                                    <div class="NOTIF_ERROR_ehrm"></div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">OHRM</label>
                                <fieldset class="form-group">
                                    <input class="form-control" name="ohrm"></input>
                                    <div class="NOTIF_ERROR_ohrm"></div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Tangki Bawah</label>
                                <fieldset class="form-group">
                                    <input class="form-control" name="tangki_bawah"></input>
                                    <div class="NOTIF_ERROR_tangki_bawah"></div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="form-group">
                                <label class="control-label">Tangki Atas</label>
                                <fieldset class="form-group">
                                    <input class="form-control" name="tangki_atas"></input>
                                    <div class="NOTIF_ERROR_tangki_atas"></div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CANCEL</button>
                    <button type="button" class="btn btn-outline-primary" id="btnUpdate" onclick="simpan()">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>
