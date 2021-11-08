<script>
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
        $('#nama').val('');
        $('#kategori').val('');
        $('#jumlah').val('');
        $('#users_access_name').val('');
        $('#form-add-new-data').trigger("reset");
        $('#jenis_gudang').val("choose").trigger('change');
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
            url: '{{route("barang.saveData")}}',
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
                    url: '{{route("barang.deleteData")}}',
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
            url: "{{url('get-barang')}}" + "/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(res) {
                $("#modal").modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');
                $("#modalLabel").text("Edit Form Data");
                $("#id").val(res.id);
                $("#jenis_gudang").val(res.jenis_gudang);
                $('#jenis_gudang').trigger('change');
                $("#nama").val(res.nama);
                $("#kategori").val(res.kategori);
                $("#jumlah").val(res.jumlah);
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