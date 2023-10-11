@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Dashboard User')])
    <!-- datatable bootstrap -->
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- font awesome -->
    <link href="{{ url('/assets/fontawesome/css/all.css') }}" rel="stylesheet" />
<style>
</style>
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="fas fa-building"></i>
              </div>
              <p class="card-category"> Semua Transaksi</p>
              <h3 class="card-title"> {{$transaksi->count() }}
                <small></small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="javascript:;"> {{$transaksi->count() }} Transaksi</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="fas fa-building"></i>
              </div>
              <p class="card-category"> Transaksi Perbaikan</p>
              <h3 class="card-title"> {{$perbaikan->count() }}
                <small></small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="javascript:;"> {{$perbaikan->count() }} Perbaikan</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-secondary card-header-icon">
              <div class="card-icon">
                <i class="fas fa-building"></i>
              </div>
              <p class="card-category">Transaksi Perawatan</p>
              <h3 class="card-title"> {{$perawatan->count() }}
                <small></small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="javascript:;"> {{$perawatan->count() }} Perawatan</a>
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