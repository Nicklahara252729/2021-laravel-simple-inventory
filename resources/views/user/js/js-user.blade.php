<script>
    function checkPass() {
        var newPass = $('#password').val();
        var confirmPass = $('#confirm-password').val();
        if (newPass == confirmPass && newPass != "" && confirmPass != "" && newPass.length >= 8) {
            $('#btnSaveUser').attr('type', 'submit');
            $('#btnSaveUser').attr('class', 'btn btn-success');
            $('#msg-alert-check-pass').attr('style', 'display:block;');
            $('#msg-alert-check-pass').attr('class', 'alert alert-success');
            $('#msg-alert-check-pass span').html('Password sesuai');
        } else {
            $('#msg-alert-check-pass').attr('style', 'display:block;');
            $('#msg-alert-check-pass').attr('class', 'alert alert-danger');
            if (newPass != confirmPass) {
                $('#msg-alert-check-pass span').html('Password tidak sama');
            } else if (newPass.length < 8) {
                $('#msg-alert-check-pass span').html('Panjang password kurang dari 8');
            }
            $('#btnSaveUser').attr('type', 'button');
            $('#btnSaveUser').attr('class', 'btn disbled');
        }
    }

    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });

        var table = $('#datatable').DataTable();
    });

    function clearForm() {
        $('#modal').modal('hide');
        $('#msg-alert-check-pass').attr('style', 'display:none;');
        $('#form-add-new-data').trigger("reset");
        $('#password').attr('required', 'required');
        $('#confirm-password').attr('required', 'required');
        $('#btnSaveUser').attr('type', 'button');
        $('#btnSaveUser').attr('class', 'btn disbled');
    }

    function show() {
        $('#modal').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show');
    }

    $('#form-add-new-data').on('submit', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route("user.saveData")}}',
            method: 'post',
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function(r) {
                if (r.icon == 'success') {
                    swal({
                        title: "Success",
                        icon: r.icon,
                        text: r.msg,
                        dangerMode: false,
                        buttons: {
                            confirm: "Ok",
                        }
                    }).then((ok) => {
                        clearForm();
                        window.location.reload();
                    });
                } else {
                    swal({
                        title: r.icon,
                        text: r.msg,
                        icon: r.icon
                    });
                }
            }
        });
    });

    function deleteData(id) {
        swal({
            title: "Hapus Data Ini ?",
            icon: "warning",
            text: "Data yang sudah dihapus tidak dapat dikembalikan",
            dangerMode: true,
            buttons: {
                cancel: "Batal",
                confirm: "Hapus",
            }
        }).then((ok) => {
            if (ok) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{route("user.deleteData")}}',
                    method: 'get',
                    data: {
                        "id": id
                    },
                    success: function(res) {
                        if (res.icon == 'success') {
                            swal({
                                title: "Success",
                                icon: res.icon,
                                text: res.msg,
                                dangerMode: false,
                                buttons: {
                                    confirm: "Ok",
                                }
                            }).then((ok) => {
                                window.location.reload();
                            });
                        } else {
                            swal({
                                title: res.icon,
                                text: res.msg,
                                icon: res.icon
                            });
                        }
                    }
                });
            } else {
                swal({
                    title: "Dibatalkan",
                    text: "Data Batal Dihapus",
                    icon: "info"
                });
            }
        });
    }

    function editData(id) {
        $.ajax({
            url: "{{url('get-user')}}" + "/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(res) {
                $("#modal").modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');
                $("#modalLabel").text("Edit Form Data");
                $("#id").val(res.id);
                $("#nama").val(res.nama);
                $("#email").val(res.email);
                $("#username").val(res.username);
                $('#password').removeAttr('required');
                $('#confirm-password').removeAttr('required');
                $('#btnSaveUser').attr('type', 'submit');
                $('#btnSaveUser').attr('class', 'btn btn-success');
            },
            error: function() {
                swal({
                    title: "Opps",
                    text: "Terjadi kesalahan dalam mengambil data",
                    icon: "error"
                });
            }
        });
    }
</script>