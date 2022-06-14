<div class="modal fade" id="modalAtk" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLabel">Form Gudang ATK</h4>
            </div>
            <form method="post" id="form-atk">
                <div class="modal-body">
                    @include('dashboard.form.form-dashboard')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" onclick="clearForm('modalAtk')">CLOSE</button> &nbsp;
                    <button type="submit" class="btn btn-success waves-effect">SIMPAN DATA</button>
                </div>
            </form>
        </div>
    </div>
</div>
