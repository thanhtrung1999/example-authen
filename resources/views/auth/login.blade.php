@extends('layouts.app')
@section('title', 'Đăng nhập')
@section('content')
    <section class="login-section">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            @include('layouts.messages')

                            <form action="{{ route('auth.login') }}" method="POST">
                                @csrf
                                <div class="mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">đăng nhập</h2>
                                    <p class="text-white-50 mb-5">Nhập tên đăng nhập và mật khẩu của bạn</p>

                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="username">Tên đăng nhập</label>
                                        <input type="text" id="username"
                                            class="form-control form-control-lg bg-dark text-white" name="username"
                                            value="{{ old('username') }}" />
                                    </div>

                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="password">Mật khẩu</label>
                                        <input type="password" id="password"
                                            class="form-control form-control-lg bg-dark text-white" name="password" />
                                    </div>

                                    <p class="mb-5 pb-lg-2 text-center"><a class="text-white-50" href="{{ route('auth.view-forgotPassword') }}">Quên mật
                                            khẩu?</a>
                                    </p>

                                    <div class="d-grid gap-2">
                                        <button class="btn btn-block btn-primary btn-lg px-5" type="submit">Đăng
                                            nhập</button>
                                    </div>

                                </div>
                            </form>

                            <div>
                                <p class="mb-0 text-center">Bạn chưa có tài khoản? <a
                                        href="{{ route('auth.view-register') }}" class="text-white-50 fw-bold">Đăng ký</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
