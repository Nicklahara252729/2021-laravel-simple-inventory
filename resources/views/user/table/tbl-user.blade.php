<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Username</th>
            <th>Email</th>
            <th class="text-right"></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Username</th>
            <th>Email</th>
            <th class="text-right"></th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($view as $key => $value)
        <tr>
            <td>{{$key +1}}</td>
            <td>{{$value->nama}}</td>
            <td>{{$value->username}}</td>
            <td>{{$value->email}}</td>
            <td class="text-right">
                <a href="#" class="btn btn-link btn-warning btn-just-icon edit" onclick="editData('{{$value->id}}')"><i class="material-icons">dvr</i></a>
                <a href="#" class="btn btn-link btn-danger btn-just-icon remove" onclick="deleteData('{{$value->id}}');"><i class="material-icons">close</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>