@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Kartu Riwayat Mesin')])

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
                      <h4 class="card-title pt-3">Kartu Riwayat Mesin</h4>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="card-body"> 
                      <div class="col-lg-4">  
                        <form action="/kartu/riwayat/mesin/print" method="post">
                          @csrf
                            <select name="mesin_id" id="mesin_id" class="form-control" required>
                              <option value="">~ Pilih Mesin ~</option>
                              @foreach($data as $val)
                                <option value="{{$val->id}}">{{$val->nama}}</option>
                              @endforeach
                            </select>
                      </div>
                      <div class="col-lg-4 mt-2">  
                        <button type="submit">Print</button>
                      </div>
                        </form>
                    </div>
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
