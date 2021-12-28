@extends('layouts.app')
@section('title', 'Đổi mật khẩu')
@section('content')
    <section class="change-password-section">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            @include('layouts.messages')

                            <form action="{{ route('auth.changePassword') }}" method="POST">
                                @csrf
                                <div class="mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-5 text-uppercase">Đổi mật khẩu</h2>

                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="currentPassword">Mật khẩu hiện tại</label>
                                        <input type="password" id="currentPassword"
                                            class="form-control form-control-lg bg-dark text-white"
                                            name="current_password" />
                                        @error('current_password')
                                            <strong class="text-danger">{{ $errors->first('current_password') }}</strong>
                                        @enderror
                                    </div>

                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="newPassword">Mật khẩu mới</label>
                                        <input type="password" id="newPassword"
                                            class="form-control form-control-lg bg-dark text-white" name="new_password" />
                                        @error('new_password')
                                            <strong class="text-danger">{{ $errors->first('new_password') }}</strong>
                                        @enderror
                                    </div>

                                    <div class="form-group form-white mb-4">
                                        <label class="form-label" for="reNewPassword">Nhập lại mật khẩu mới</label>
                                        <input type="password" id="reNewPassword"
                                            class="form-control form-control-lg bg-dark text-white"
                                            name="new_password_confirmation" />
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button class="btn btn-block btn-primary btn-lg px-5" type="submit">
                                            Lưu thay đổi
                                        </button>
                                        <button class="bg-light btn btn-block btn-default btn-lg px-5" type="reset">
                                            Nhập lại
                                        </button>
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
