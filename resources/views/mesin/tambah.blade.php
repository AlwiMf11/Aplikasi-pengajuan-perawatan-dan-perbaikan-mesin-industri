@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Tambah Mesin')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="/mesin/store" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Tambah Mesin</h4>
                <p class="card-category">{{ __('Mesin information') }}</p>
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
                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" value="{{old('nama')}}" name="nama" id="input-nama" type="text" placeholder="{{ __('nama') }}"  required="true" aria-required="true"/>
                      @if ($errors->has('nama'))
                        <span id="nama-error" class="error text-danger" for="input-nama">{{ $errors->first('nama') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">Merk</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('merk') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('merk') ? ' is-invalid' : '' }}" value="{{old('merk')}}" name="merk" id="input-merk" type="text" placeholder="{{ __('merk') }}"  required="true" aria-required="true"/>
                      @if ($errors->has('merk'))
                        <span id="merk-error" class="error text-danger" for="input-merk">{{ $errors->first('merk') }}</span>
                      @endif
                    </div>
                  </div>
                </div>   
                <div class="row">
                  <label class="col-sm-2 col-form-label">Kapasitas</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('kapasitas') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('kapasitas') ? ' is-invalid' : '' }}" value="{{old('kapasitas')}}" name="kapasitas" id="input-kapasitas" type="text" placeholder="{{ __('kapasitas') }}"  required="true" aria-required="true"/>
                      @if ($errors->has('kapasitas'))
                        <span id="kapasitas-error" class="error text-danger" for="input-kapasitas">{{ $errors->first('kapasitas') }}</span>
                      @endif
                    </div>
                  </div>
                </div>   
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">Divisi</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('divisi_id ') ? ' has-danger' : '' }}">
                    <select name="divisi_id" id="divisi_id" class="form-control{{ $errors->has('divisi_id ') ? ' is-invalid' : '' }}" required >
                    <option value="">~ Pilih Divisi ~</option>
                    @foreach($divisi as $val)
                      <option value="{{$val->id}}">{{$val->nama}}</option>
                    @endforeach
                    </select>
                      @if ($errors->has('divisi_id '))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('divisi_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">Periode Pakai</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('periode_id') ? ' has-danger' : '' }}">
                    <select name="periode_id" id="periode_id" class="form-control{{ $errors->has('periode_id ') ? ' is-invalid' : '' }}" required >
                    <option value="">~ Pilih Periode ~</option>
                      @foreach($periode as $val)  
                      <option value="{{$val->id}}">{{$val->tahun}}</option>
                      @endforeach
                    </select>
                      @if ($errors->has('periode_id '))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('periode_id') }}</span>
                      @endif
                    </div>
                  </div>
                </div>   
                 <div class="row">
                  <label class="col-sm-2 col-form-label">Tahun Pembuatan</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('tahun_id') ? ' has-danger' : '' }}">
                    <select name="tahun_id" id="tahun_id" class="form-control{{ $errors->has('tahun_id ') ? ' is-invalid' : '' }}" required >
                      <option value="">~ Pilih Tahun Pembuatan ~</option>
                      @foreach($tahun as $val)  
                      <option value="{{$val->id}}">{{$val->tahun}}</option>
                      @endforeach
                    </select>
                      @if ($errors->has('tahun_id '))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('tahun_id') }}</span>
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