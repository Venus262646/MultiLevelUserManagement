{{-- Extends layout --}}
@extends('layout.fullwidth')



{{-- Content --}}
@section('content')
<div class="col-md-6">
    <div class="authincation-content" style="background: #4fba46">
        <div class="row no-gutters">
            <div class="col-xl-12">
                <div class="auth-form">
                    <div class="text-center mb-3">
                        <a href="{!! url('/index'); !!}"><img src="{{ asset('images/logo-full.png') }}" alt=""></a>
                    </div>
                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                    @if ($errors->has('error'))
                        <div class="alert alert-danger solid alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            <strong>Error!</strong> {{ $errors->first('error') }}
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                            </button>
                        </div>
                    @endif
                    <form action="{!! url('/index_mlum'); !!}" method="POST">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Email</strong></label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="mb-1 text-white"><strong>Password</strong></label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" required>
                        </div>
                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox ml-1 text-white">
                                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                    <label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <a class="text-white" href="{!! url('/page-forgot-password'); !!}">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection