@extends('layouts.app')
@section('title', 'Đặt lại mật khẩu')
@section('content')
    <section class="reset-password-section">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            @include('layouts.messages')

                            <form action="{{ route('auth.resetPassword') }}" method="POST">
                                @csrf
                                <div class="mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-5 text-uppercase">Đặt lại mật khẩu</h2>

                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="email">Email <span
                                                class="text-danger">*</span></label>
                                        <input disabled type="email" id="email" value="{{ $email }}"
                                            class="form-control form-control-lg bg-dark text-white" />
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

                                    <div class="d-grid gap-2">
                                        <button class="btn btn-block btn-primary btn-lg px-5" type="submit">
                                            Đặt lại mật khẩu
                                        </button>
                                        <button class="bg-light btn btn-block btn-default btn-lg px-5" type="reset">
                                            Nhập lại
                                        </button>
                                    </div>
                                    <input type="hidden" name="email" value="{{ $email }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
