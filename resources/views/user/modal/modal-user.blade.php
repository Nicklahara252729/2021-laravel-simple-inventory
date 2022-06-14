<div class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel">Form User</h4>
            </div>
            <form method="post" id="form-add-new-data">
                <div class="modal-body">
                    @include('user.form.form-user')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" onclick="clearForm()">CLOSE</button> &nbsp;
                    <button type="button" class="btn btn-disabled waves-effect" id="btnSaveUser">SIMPAN DATA</button>
                </div>
            </form>
        </div>
    </div>
</div>