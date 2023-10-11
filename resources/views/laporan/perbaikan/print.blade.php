<!DOCTYPE html>
<html>
<head>
	<title>Laporan Perbaikan Mesin</title>
</head>
<body>
    <style type="text/css">
    .table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #f2f5f7;
}

.table1 tr th{
    background: #35A9DB;
    color: #fff;
    font-weight: normal;
}
h2{
    color: grey;
    font-weight: bold;
}
.table1, th, td {
    padding: 8px 20px;
    text-align: center;
}

.table1 tr:hover {
    background-color: #f5f5f5;
}

.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}
		table tr td,
		table tr th{
			font-size: 11pt;
		}
	</style>
	<center>
		<h2>Laporan Perbaikan Mesin</h2>
    </center>

	<table class='table1'>
		<thead>
			<tr>
                <th>Nama Mesin</
                <th>Judul</th>
                <th>Keterangan</th>
                <th>Type</th>
                <th>Tanggal</th>
                <th>Status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
            @foreach($data as $value)
            <tr>
                <td>{{$value->mesin->nama}}</td>
                <td>{{$value->judul}}</td>
                <td>{{$value->keterangan}}</td>
                <td>{{$value->type}}</td>
                <td>{{$value->tgl_permintaan}}</td>
                <td>{{$value->status}}</td>
            </tr>
			@endforeach
		</tbody>
        
	</table>
    
</body>
</html>