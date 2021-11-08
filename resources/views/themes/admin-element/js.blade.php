<script>
    function checkResetPass() {
        var newPass = $('#r-newpass').val();
        var confirmPass = $('#r-confirm').val();
        if (newPass == confirmPass && newPass != "" && confirmPass != "" && newPass.length >= 8) {
            $('#btnSave').attr('type', 'submit');
            $('#btnSave').attr('class', 'btn btn-primary');
            $('#msg-alert').attr('style', 'display:block;');
            $('#msg-alert').attr('class', 'alert alert-success');
            $('#msg-alert span').html('Password sesuai');
        } else {
            $('#msg-alert').attr('style', 'display:block;');
            $('#msg-alert').attr('class', 'alert alert-danger');
            if (newPass != confirmPass) {
                $('#msg-alert span').html('Password tidak sama');
            } else if (newPass.length < 8) {
                $('#msg-alert span').html('Panjang password kurang dari 8');
            }
            $('#btnSave').attr('type', 'button');
            $('#btnSave').attr('class', 'btn disbled');
        }
    }
</script>