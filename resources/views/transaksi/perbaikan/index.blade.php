@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Permintaan Perbaikan')])

    <!-- datatable bootstrap -->
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font awesome -->
    <link href="{{ url('/assets/fontawesome/css/all.css') }}" rel="stylesheet" />

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            @if ($successs = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $successs }}</strong>
              </div>
            @endif
            @if ($fail = Session::get('fail'))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $fail }}</strong>
              </div>
            @endif
              <div class="card">
                <div class="card-header card-header-primary">
                  <div class="row">
                    <div class="col-6">
                      <h4 class="card-title pt-3">Permintaan Perbaikan</h4>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID Perbaikan</th>
                        <th>Nama Mesin</th>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        @if(Auth::user()->level == 'Admin')
                        <th>Action</th>
                        @else
                        @endif
                      </thead>
                      <tbody>
                      @foreach($data as $val)  
                        <tr>
                            <td>{{$val->kd}}</td>
                            <td>{{$val->mesin->nama}}</td>
                            <td>{{$val->judul}}</td>
                            <td>{{$val->keterangan}}</td>
                            <td>{{$val->tgl_permintaan}}</td>
                            <td>
                            <form action="/permintaan/perbaikan/update" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$val->id}}">
                       
                              <select name="status" id="status" class="form-control" onchange="this.form.submit()"> 
                                <option value="{{$val->status}}" selected>{{$val->status}}</option>
                              </select>
                            </form>
                            </td>
                            @if(Auth::user()->level == 'Admin')
                            <td>
                              <a href="/transaksi/perbaikan/edit/{{$val->id}}"><i class="fas fa-edit"></i> </a>
                              <a href="/transaksi/perbaikan/delete/{{$val->id}}" onclick="return confirm('Apa Anda yakin ?')"><i class="fas fa-trash"></i> </a>
                            </td>
                            @else
                            @endif
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
      <!-- Datatable -->
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
      <!-- Fontawesome -->
      <script href="{{ url('/assets/fontawesome/js/all.js') }}" rel="stylesheet"> </script>
      <!-- Sweetalert -->
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
      $(document).ready(function() {
          $('#example').DataTable();
      } );
      
      </script>
@endsection
