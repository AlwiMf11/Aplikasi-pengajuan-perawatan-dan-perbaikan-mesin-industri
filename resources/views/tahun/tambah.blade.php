@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Tambah Tahun')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="/tahun/store" autocomplete="off" class="form-horizontal">
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Tambah Tahun</h4>
                <p class="card-category">{{ __('Tahun information') }}</p>
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
                  <label class="col-sm-2 col-form-label">Tahun</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('tahun') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('tahun') ? ' is-invalid' : '' }}" value="{{old('tahun')}}" name="tahun" id="input-tahun" type="text" placeholder="{{ __('tahun') }}"  required="true" aria-required="true"/>
                      @if ($errors->has('tahun'))
                        <span id="tahun-error" class="error text-danger" for="input-tahun">{{ $errors->first('tahun') }}</span>
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