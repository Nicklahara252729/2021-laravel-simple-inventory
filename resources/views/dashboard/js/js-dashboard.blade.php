<script>
    demo = {

        initCharts: function() {

            /*  **************** Coloured Rounded Line Chart - Line Chart ******************** */
            dataChartAtk = {
                labels: [
                    <?php foreach ($chartAtk as $key => $value) {
                        echo "'\'". $value->nama ."',";
                    } ?>
                ],
                series: [
                    [
                        <?php foreach ($chartAtk as $key => $value) {
                            echo $value->total . ",";
                        } ?>
                    ]
                ]
            };

            optionChartAtk = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 10
                }),
                axisY: {
                    showGrid: true,
                    offset: 40
                },
                axisX: {
                    showGrid: false,
                },
                low: 0,
                high: 1000,
                showPoint: true,
                height: '300px'
            };


            var chartAtk = new Chartist.Line('#chartAtk', dataChartAtk, optionChartAtk);

            md.startAnimationForLineChart(chartAtk);

            /*  **************** Coloured Rounded Line Chart - Line Chart ******************** */
            dataChartKimia = {
                labels: [
                    <?php foreach ($chartKimia as $key => $value) {
                        echo "'\'". $value->nama ."',";
                    } ?>
                ],
                series: [
                    [
                        <?php foreach ($chartKimia as $key => $value) {
                            echo $value->total . ",";
                        } ?>
                    ]
                ]
            };

            optionChartKimia = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 10
                }),
                axisY: {
                    showGrid: true,
                    offset: 40
                },
                axisX: {
                    showGrid: false,
                },
                low: 0,
                high: 1000,
                showPoint: true,
                height: '300px'
            };


            var chartKimia = new Chartist.Line('#chartKimia', dataChartKimia, optionChartKimia);

            md.startAnimationForLineChart(chartKimia);

            /*  **************** Coloured Rounded Line Chart - Line Chart ******************** */
            dataChartDokumen = {
                labels: [
                    <?php foreach ($chartDokumen as $key => $value) {
                        echo "'\'". $value->nama ."',";
                    } ?>
                ],
                series: [
                    [
                        <?php foreach ($chartDokumen as $key => $value) {
                            echo $value->total . ",";
                        } ?>
                    ]
                ]
            };

            optionChartDokumen = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 10
                }),
                axisY: {
                    showGrid: true,
                    offset: 40
                },
                axisX: {
                    showGrid: false,
                },
                low: 0,
                high: 1000,
                showPoint: true,
                height: '300px'
            };


            var chartDokumen = new Chartist.Line('#chartDokumen', dataChartDokumen, optionChartDokumen);

            md.startAnimationForLineChart(chartDokumen);
        }

    }

    $(document).ready(function() {
        demo.initCharts();
    });

    function clearForm(key) {
        $('#' + key).modal('hide');
        $('#nama').val('');
        $('#kategori').val('');
        $('#jumlah').val('');
        $('#users_access_name').val('');
        $('#form-add-new-data').trigger("reset");
        $('#jenis_gudang').val("choose").trigger('change');
    }

    function showAtk() {
        $('#modalAtk').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show');
    }

    function showKimia() {
        $('#modalKimia').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show');
    }

    function showDokumen() {
        $('#modalDokumen').modal({
            backdrop: 'static',
            keyboard: false
        }, 'show');
    }

    function showTable(jenis) {
        $('#datatables').DataTable({
            ajax: {
                url: "{{url('view-dashboard')}}" + "/" + jenis,
                method: "get",
                dataSrc: ''
            },
            columns: [{
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'jumlah',
                    name: 'jumlah'
                }
            ]
        });
    }

    $('#form-atk').on('submit', function(e) {
        var jenis = $("#jenis_gudang").val();
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route("gudangAtk.saveData")}}',
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
                        clearForm("modalAtk");
                        $("#txt-data-gudang").text("Data " + jenis);
                        $("#div-data-gudang").attr("style", "display:block;");
                        showTable(jenis);
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

    $('#form-dokumen').on('submit', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route("gudangDokumen.saveData")}}',
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

    $('#form-kimia').on('submit', function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{route("gudangKimia.saveData")}}',
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
</script>