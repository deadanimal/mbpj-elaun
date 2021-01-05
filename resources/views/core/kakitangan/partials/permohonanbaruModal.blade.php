<div class="modal fade" id="permohonanbaruModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmPermohonanBaru">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Permohonan Baru Kerja Lebih Masa
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="permohonanbaru-error-bag" hidden>
                        <ul id="permohonan-baru-errors">
                        </ul>
                    </div>
                    <form id="frmjenisPermohonan">
                        <div class="form-group">
                            <label for="jenisPermohonan"><font color="red">*</font> Jenis Permohonan</label>
                            <select id="jenisPermohonanan" name="jenisPermohonan" class="custom-select" >
                                <option value="frmPermohonanIndividu">Permohonan Individu</option>
                                <option value="frmPermohonanBerkumpulan">Permohonan Berkumpulan</option>
                            </select>                       
                        </div>
                    </form>
                    
                    <form id="frmPermohonanIndividu" style="display:none;">
                    <div class="form-group">
                        <label>
                            individu
                        </label>
                        <input class="form-control" id="title" name="title" required="" type="text">
                    </div>
                    </form>
                    <form id="frmPermohonanIndividu" style="display:none;">
                    <div class="form-group">
                        <label>
                            berkumpulan
                        </label>
                        <input class="form-control" id="title" name="title" required="" type="text">
                    </div>
                    </form>
                    <!-- @if('jenisPermohonanan' == 'Permohonan Individu') -->
                    <!-- <div class="form-group">
                        <label>
                            Title
                        </label>
                        <input class="form-control" id="title" name="title" required="" type="text">
                    </div>
                    <div class="form-group">
                        <label>
                            Description
                        </label>
                        <input class="form-control" id="description" name="description" required="" type="text">
                    </div>
                    <input type="hidden" id="done" name="done" value=1>
                </div>
                <div class="modal-footer"> -->
                    <!-- <input id="user_id" name="user_id" type="hidden" value="0"> -->
                        <!-- <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                            <button class="btn btn-info" id="btn-edit" type="button" value="add">
                                <font color="white"</font>Update Todo
                            </button>
                            <button class="btn btn-primary" id="btn-done" type="button" value="1">
                                Done Todo
                            </button> -->
                </div>
                <!-- @endif -->
            </form>
        </div>
    </div>
</div>