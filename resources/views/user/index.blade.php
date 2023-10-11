@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Data user')])

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
              <div class="card">
                <div class="card-header card-header-primary">
                  <div class="row">
                    <div class="col-6">
                      <h4 class="card-title pt-3">Data User</h4>
                    </div>
                    <div class="col-6">
                      <h4 class="card-title text-right"><a href="/user/tambah" class="btn btn-primary">Tambah</a></h4>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID User</th>
                        <th>Nama</th>
                        <th>Password</th> 
                        <th>Level</th>
                        <th>Divisi</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                      @foreach($data as $val)  
                        <tr>
                            <td>{{$val->kd}}</td>
                            <td>{{$val->nama}}</td>
                            <td>{{$val->password_asli}}</td>
                            <td>{{$val->level}}</td>
                            <td>{{$val->divisi->nama ?? null}}</td>
                            <td>
                              <a href="/user/edit/{{$val->id}}"><i class="fas fa-edit"></i></a>
                              <a href="/user/delete/{{$val->id}}" onclick="return confirm('Anda Yakin ?')"><i class="fas fa-trash"></i></a>
                            </td>
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
