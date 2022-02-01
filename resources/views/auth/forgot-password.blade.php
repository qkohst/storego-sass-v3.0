@extends('layouts.auth')
@section('page-title')
    {{__('Reset Password')}}
@endsection
@section('content')
    <div class="w-100">
        <div class="row justify-content-center">
            <div class="form-group auth-lang">
                <select name="language" id="language" class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    @foreach(\App\Models\Utility::languages() as $language)
                        <option @if($lang == $language) selected @endif value="{{ route('login',$language) }}">{{Str::upper($language)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-8 col-lg-5 col-xl-4">
                <div class="row justify-content-center mb-3">
                    <a class="navbar-brand" href="#">
                        <img src="{{asset(Storage::url('uploads/logo/logo.png'))}}" class="auth-logo" width="250">
                    </a>
                </div>
                <div class="card shadow zindex-100 mb-0">
                    <div class="card-body px-md-5 py-5">
                        <div class="mb-5">
                            <h6 class="h3">{{__('Password Reset')}}</h6>
                            <p class="text-muted mb-0">{{__('Enter your email below to proceed.')}}</p>
                        </div>
                        @if (session('status'))
                            <small class="text-muted">{{ session('status') }}</small>
                        @endif
                        <span class="clearfix"></span>
                        @if(!isset($err))
                            {{Form::open(array('route'=>'password.email','method'=>'post','id'=>'loginForm'))}}
                            <div class="form-group">
                                {{Form::label('email',__('Email'),array('class' => 'form-control-label'))}}
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Your Email')))}}
                                </div>
                                @error('email')
                                <span class="invalid-email text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                {{Form::submit(__(' Send Password Reset Link'),array('class'=>'btn btn-sm btn-primary btn-icon rounded-pill','id'=>'saveBtn'))}}
                            </div>
                            {{Form::close()}}
                        @else
                            <span class="text text-danger font-weight-bold">{{ $err }}</span>
                        @endif
                    </div>
                    <div class="card-footer px-md-5"><small>Back to?</small>
                        <a href="{{ url('login',$lang) }}" class="small font-weight-bold">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
