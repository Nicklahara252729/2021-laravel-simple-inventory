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
        $('#form-add-new-data').trigger("reset");
    }

    $('#form-add-new-data').on('submit', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route("historyRestock.saveData")}}',
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

    function editData(id) {
        $.ajax({
            url: "{{url('get-history-restock')}}" + "/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(res) {
                $("#modal").modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');
                $("#id").val(id);                
                $("#jumlah_restock").val(res.jumlah_restock);
                $("#tgl_restock").val(res.tgl_restock);
                $("#id_barang").val(res.id_barang);
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