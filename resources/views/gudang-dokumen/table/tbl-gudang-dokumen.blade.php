<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th class="disabled-sorting text-right"></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th class="text-right" width="200"></th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($view as $key => $value)
        <tr>
            <td>{{$key +1}}</td>
            <td>{{$value->nama}}</td>
            <td>{{ number_format($value->jumlah,0,',','.')}}</td>
            <td class="text-right">
                <a href="#" class="btn btn-link btn-info btn-just-icon " title="restock" onclick="restock('{{$value->id}}')"><i class="material-icons">autorenew</i></a>
                <a href="#" class="btn btn-link btn-primary btn-just-icon " title="take out" onclick="takeOut('{{$value->id}}')"><i class="material-icons">touch_app</i></a>
                <a href="#" class="btn btn-link btn-warning btn-just-icon" title="edit" onclick="editData('{{$value->id}}')"><i class="material-icons">mode_edit</i></a>
                <a href="#" class="btn btn-link btn-danger btn-just-icon" title="hapus" onclick="deleteData('{{$value->id}}');"><i class="material-icons">close</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>