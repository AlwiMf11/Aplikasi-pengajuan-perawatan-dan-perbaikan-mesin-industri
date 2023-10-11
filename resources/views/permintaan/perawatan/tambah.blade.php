@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Tambah Perawatan')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="/user/permintaan/perawatan/store" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Tambah Perbaikan</h4>
                <p class="card-category">{{ __('Perbaikan information') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">Nama Mesin</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('mesin_id') ? ' has-danger' : '' }}">
                    <select name="mesin_id" id="mesin_id" class="form-control{{ $errors->has('mesin_id ') ? ' is-invalid' : '' }}" required >
                      <option value="">~ Pilih Mesin ~</option>
                      @foreach($mesin as $val)  
                      <option value="{{$val->id}}">{{$val->nama}}</option>
                      @endforeach
                    </select>
                      @if ($errors->has('mesin_id '))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('mesin_id') }}</span>
                      @endif
                    </div>
                  </div>
                  </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('judul') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}" value="{{old('judul')}}" name="judul" id="input-judul" type="text" placeholder="{{ __('judul') }}"  required="true" aria-required="true"/>
                      @if ($errors->has('judul'))
                        <span id="judul-error" class="error text-danger" for="input-judul">{{ $errors->first('judul') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('keterangan') ? ' has-danger' : '' }}">
                      <textarea class="form-control{{ $errors->has('keterangan') ? ' is-invalid' : '' }}" name="keterangan" id="input-keterangan" type="text" placeholder="Keterangan"  required="true" aria-required="true" rows="4"> {{old('keterangan')}} </textarea>
                      @if ($errors->has('keterangan'))
                        <span id="keterangan-error" class="error text-danger" for="input-keterangan">{{ $errors->first('keterangan') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">Tanggal Permintaan</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('tgl_permintaan') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('tgl_permintaan') ? ' is-invalid' : '' }}" value="{{old('tgl_permintaan')}}" name="tgl_permintaan" id="input-tgl_permintaan" type="date" placeholder="{{ __('tgl_permintaan') }}"  required="true" aria-required="true"/>
                      @if ($errors->has('tgl_permintaan'))
                        <span id="tgl_permintaan-error" class="error text-danger" for="input-tgl_permintaan">{{ $errors->first('tgl_permintaan') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
     
    </div>
  </div>
@endsection