@extends('layouts.app')
@section('title', 'Đăng nhập')
@section('content')
    <section class="register-section">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            @include('layouts.messages')

                            <form action="{{ route('auth.register') }}" method="POST">
                                @csrf
                                <div class="mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-5 text-uppercase">đăng ký</h2>
                                    {{-- <p class="text-white-50 mb-5">Nhập tên đăng nhập và mật khẩu của bạn</p> --}}

                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="username">Tên đăng nhập <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                                            class="form-control form-control-lg bg-dark text-white" />
                                        @error('username')
                                            <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                        @enderror
                                    </div>

                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="password">Mật khẩu <span
                                                class="text-danger">*</span></label>
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg bg-dark text-white" />
                                        @error('password')
                                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="rePassword">Nhập lại mật khẩu <span
                                                class="text-danger">*</span></label>
                                        <input type="password" id="rePassword" name="password_confirmation"
                                            class="form-control form-control-lg bg-dark text-white" />
                                    </div>

                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="email">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                                            class="form-control form-control-lg bg-dark text-white" />
                                        @error('email')
                                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="phoneNumber">Số điện thoại</label>
                                        <input type="text" id="phoneNumber" name="phone_number"
                                            value="{{ old('phone_number') }}"
                                            class="form-control form-control-lg bg-dark text-white" />
                                        @error('phone_number')
                                            <strong class="text-danger">{{ $errors->first('phone_number') }}</strong>
                                        @enderror
                                    </div>

                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="address">Địa chỉ</label>
                                        <input type="text" id="address" name="address" value="{{ old('address') }}"
                                            class="form-control form-control-lg bg-dark text-white" />
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button class="btn btn-block btn-primary btn-lg px-5" type="submit">Đăng
                                            ký</button>
                                        <button class="bg-light btn btn-block btn-default btn-lg px-5" type="reset">
                                            Nhập lại
                                        </button>
                                    </div>

                                </div>
                            </form>

                            <div>
                                <p class="mb-0 text-center">Đã có tài khoản? <a href="{{ route('auth.view-login') }}"
                                        class="text-white-50 fw-bold">Đăng nhập</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
