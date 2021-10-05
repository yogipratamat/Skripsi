@extends('layouts.appmodif')

@section('asset')
    <script src="/assets/js/app.js"></script>

@endsection

@section('content')
    <!-- Content area -->
    <div class="content d-flex justify-content-center align-items-center">

        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div>
                            <img src="/image/padi.png" alt="" width="150px">
                        </div>
                        {{-- <i
                            class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1">
                        </i> --}}
                        <h3 class="mb-0 text-black-100 bold">SI-GOTANI</h3>
                        <span class="d-block text-muted">Masukan Email & Password Anda!</span>
                    </div>
                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-control-feedback">
                            <i class="icon-envelop4 text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">LOGIN<i
                                class="icon-circle-right2 ml-2"></i></button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- /content area -->
@endsection
