<div class="modal fade" id="modalDokumen" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel">Form Gudang Dokumen</h4>
            </div>
            <form method="post" id="form-dokumen">
                <div class="modal-body">
                    @include('dashboard.form.form-dashboard')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" onclick="clearForm('modalDokumen')">CLOSE</button> &nbsp;
                    <button type="submit" class="btn btn-success waves-effect">SIMPAN DATA</button>
                </div>
            </form>
        </div>
    </div>
</div>