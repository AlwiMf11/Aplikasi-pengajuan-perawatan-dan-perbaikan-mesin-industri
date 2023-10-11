@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Edit User')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="/user/update" autocomplete="off" class="form-horizontal">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit User') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
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
                      <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" id="input-username" type="text" placeholder="{{ __('username') }}" value="{{$data->username }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" id="input-nama" type="text" placeholder="{{ __('nama') }}" value="{{$data->nama }}" required="true" aria-required="true"/>
                      @if ($errors->has('nama'))
                        <span id="nama-error" class="error text-danger" for="input-nama">{{ $errors->first('nama') }}</span>
                      @endif
                    </div>
                  </div>
                </div>   
                <div class="row">
                  <label class="col-sm-2 col-form-label">level</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('level') ? ' has-danger' : '' }}">
                      @if($data->level !='Admin')
                      <input class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" id="input-level" type="text" placeholder="{{ __('level') }}" value="{{$data->level }}" required="true" aria-required="true" disabled/>
                      @else
                      <input class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" id="input-level" type="text" placeholder="{{ __('level') }}" value="{{$data->level }}" required="true" aria-required="true"/>
                      @endif
                      @if ($errors->has('level'))
                        <span id="level-error" class="error text-danger" for="input-level">{{ $errors->first('level') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">Divisi</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('divisi_id') ? ' has-danger' : '' }}">
                    <select name="divisi_id" id="divisi_id" class="form-control{{ $errors->has('divisi_id') ? ' is-invalid' : '' }}" >
                    @foreach($divisi as $val)
                      @if($data->divisi_id == $val->id)
                        <option value="{{$val->id}}" selected>{{$val->nama}}</option>
                      @else
                        <option value="{{$val->id}}">{{$val->nama}}</option>
                      @endif
                    @endforeach
                    </select>
                      @if ($errors->has('divisi_id'))
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
      <!-- <div class="row">
        <div class="col-md-12">
          <form method="post" action="" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Change password') }}</h4>
                <p class="card-category">{{ __('Password') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status_password'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status_password') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Current Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div> -->
    </div>
  </div>
@endsection