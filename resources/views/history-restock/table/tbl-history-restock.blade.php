<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Tanggal Restock</th>
            <th>Jumlah Restock</th>
            <th class="disabled-sorting text-right"></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Tanggal Restock</th>
            <th>Jumlah Restock</th>
            <th class="text-right"></th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($view as $key => $value)
        <tr>
            <td>{{$key +1}}</td>
            <td>{{$value->nama}}</td>
            <td>{{$value->tgl_restock}}</td>
            <td>{{$value->jumlah_restock}}</td>
            <td class="text-right">
                <a href="#" class="btn btn-link btn-warning btn-just-icon edit" onclick="editData('{{$value->id}}')"><i class="material-icons">mode_edit</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>