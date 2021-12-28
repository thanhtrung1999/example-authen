@extends('layouts.app')
@section('title', 'Quên mật khẩu')
@section('content')
    <section class="change-password-section">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            @include('layouts.messages')

                            <form action="{{ route('auth.forgotPassword') }}" method="POST">
                                @csrf
                                <div class="mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">Quên mật khẩu</h2>
                                    <p class="text-white-50 mb-5">
                                        Vui lòng nhập địa chỉ email bạn đã đăng ký để lấy lại mật khẩu
                                    </p>

                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="email">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                                            class="form-control form-control-lg bg-dark text-white" />
                                        @error('email')
                                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        @enderror
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button class="btn btn-block btn-primary btn-lg px-5" type="submit">
                                            Lấy lại mật khẩu
                                        </button>
                                        <a class="text-white" href="{{ route('auth.view-login') }}">Trở về đăng
                                            nhập</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
