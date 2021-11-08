<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Jenis Gudang</th>
            <th class="disabled-sorting text-right"></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Jenis Gudang</th>
            <th class="text-right"></th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($view as $key => $value)
        <tr>
            <td>{{$key +1}}</td>
            <td>{{$value->nama}}</td>
            <td>{{$value->kategori}}</td>
            <td>{{ number_format($value->jumlah,0,',','.')}}</td>
            <td>{{$value->jenis_gudang}}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" onclick="editData('{{$value->id}}')">Edit</a>
                        <a class="dropdown-item" href="#" onclick="deleteData('{{$value->id}}');">Hapus</a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>