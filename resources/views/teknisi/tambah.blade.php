@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Tambah Teknisi')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="/teknisi/store" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Tambah Teknisi') }}</h4>
                <p class="card-category">{{ __('Teknisi information') }}</p>
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
                  <label class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{old('username')}}" name="username" id="input-username" type="text" placeholder="{{ __('username') }}"  required="true" aria-required="true"/>
                      @if ($errors->has('username'))
                        <span id="username-error" class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">Nama</label>
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
                  <label class="col-sm-2 col-form-label">password</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{old('password')}}" name="password" id="input-password" type="text" placeholder="{{ __('password') }}"  required="true" aria-required="true"/>
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>   
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">Divisi</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('divisi_id ') ? ' has-danger' : '' }}">
                    <select value="{{old('username')}}" name="divisi_id" id="divisi_id" class="form-control{{ $errors->has('divisi_id ') ? ' is-invalid' : '' }}" required >
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