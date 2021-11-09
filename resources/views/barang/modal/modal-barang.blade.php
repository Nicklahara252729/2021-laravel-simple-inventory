<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel">Form Barang</h4>
            </div>
            <form method="post" id="form-add-new-data">
                <div class="modal-body">
                    @include('barang.form.form-barang')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" onclick="clearForm()">CLOSE</button> &nbsp;
                    <button type="submit" class="btn btn-success waves-effect">SIMPAN DATA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTakeout" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel">Form Take Out</h4>
            </div>
            <form method="post" id="form-take-out">
                <div class="modal-body">
                    @include('barang.form.form-take-out')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" onclick="clearFormTakeOut()">CLOSE</button> &nbsp;
                    <button type="submit" class="btn btn-success waves-effect">SIMPAN DATA</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRestock" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel">Form Restock</h4>
            </div>
            <form method="post" id="form-restock">
                <div class="modal-body">
                    @include('barang.form.form-restock')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" onclick="clearFormRestock()">CLOSE</button> &nbsp;
                    <button type="submit" class="btn btn-success waves-effect">SIMPAN DATA</button>
                </div>
            </form>
        </div>
    </div>
</div>