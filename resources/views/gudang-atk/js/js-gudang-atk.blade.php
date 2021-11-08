<script>
$("#form-add-new-data").validate({
    ignore: ':hidden:not(:checkbox)',
    errorElement: 'label',
    errorClass: 'is-invalid',
    validClass: 'is-valid',
    rules: {
        name: {
            required: true
        },
        users_identity_address: {
            required: true
        },
        users_identity_phone: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
            minlength: 8
        },
        users_access_name: {
            required: true
        },
        users_identity_gender: {
            required: true
        },
    }
});

var ins = $('#form-add-new-data').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        url: '{{route("sistem.saveDaftarPengguna")}}',
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
                    btnClose();
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

function addNewData() {
    $('#modalNewData').modal({
        backdrop: 'static',
        keyboard: false
    }, 'show');
}

function btnClose() {
    $('#modalNewData').modal('hide');
    $('#name').val('');
    $('#users_identity_address').val('');
    $('#users_identity_phone').val('');
    $('#email').val('');
    $('#password').val('');
    $('#users_access_name').val('');
    $('#form-add-new-data').trigger("reset");
}

$(document).on('click', '.viewDetailPengguna', function() {
    var key = $(this).attr('key');
    $.ajax({
        url: "{{url('api/view_profile_user')}}" + "/" + key,
        type: "GET",
        dataType: "JSON",
        success: function(res) {
            $('#modalViewProfileUser').modal({
                backdrop: 'static',
                keyboard: false
            }, 'show');
            $("#profilephoto").attr('src', '{{asset("back-assets/images/avatars/")}}' + '/' + res
                .users_identity_photo);
            $("#v-nama").html(res.name);
            $("#v-email").html(res.email);
            $("#v-akses").html(res.users_access_name);
            $("#v-gender").html(res.users_identity_gender);
            $("#v-alamat").html(res.users_identity_address);
            $("#v-telp").html(res.users_identity_phone);
        },
        error: function() {
            swal({
                title: "Opps",
                text: "Terjadi kesalahan dalam mengambil data",
                icon: "error"
            });
        }
    });
});

$(document).on('click', '.penggunaResetPassword', function() {
    var key = $(this).attr('key');
    $('#modalResetPassword').modal({
        backdrop: 'static',
        keyboard: false
    }, 'show');
    $("#r-id").val(key);
});

function deleteData(key) {
    swal({
        title: "Hapus Pengguna Ini  ?",
        icon: "warning",
        text: "Data yang sudah dihapus tidak dapat dikembalikan",
        dangerMode: true,
        buttons: {
            cancel: "Batal",
            confirm: "Hapus",
        }
    }).then((ok) => {
        if (ok) {
            var id = $(this).attr('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route("sistem.delDaftarPengguna")}}',
                method: 'get',
                data: {
                    "key": key
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

function editData(key) {
    $.ajax({
        url: "{{url('sistem/edit_daftar_pengguna')}}" + "/" + key,
        type: "GET",
        dataType: "JSON",
        success: function(res) {
            $('#modalNewData').modal({
                backdrop: 'static',
                keyboard: false
            }, 'show');
            $("#exampleModalCenterTitle").text("Edit Data");
            $("#users_id").val(key);
            $('#name').val(res.name);
            $('#users_identity_address').val(res.users_identity_address);
            $('#users_identity_phone').val(res.users_identity_phone);
            $('#email').val(res.email);
            $('#password').attr('disabled', 'disabled');
            $('#password').attr('placeholder', 'Ubah password dimenu reset password');
            $('#users_access_name').val(res.users_access_name);

            <?php foreach ($level as $keylev => $vallev) { ?>
            if (res.users_access_name == "<?= $vallev->users_access_name ?>") {
                $('.<?= $vallev->users_access_name ?>').attr('selected', 'selected');
            }
            <?php } ?>

            if (res.users_identity_gender == 'laki - laki') {
                $("#laki").attr('selected', 'selected');
            } else {
                $("#perempuan").attr('selected', 'selected');
            }
        },
        error: function() {
            swal({
                title: "Opps",
                title: "Terjadi kesalahan dalam mengambil data",
                icon: "error"
            });
        }
    });
}
</script>