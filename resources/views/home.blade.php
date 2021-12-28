@extends('layouts.app')
@section('title', 'Trang chủ')
@section('content')
    <div class="home-page">
        <div class="container py-5 h-100">
            <div class="row h-100 justify-content-center">
                <div class="col-12 col-md-8">
                    @include('layouts.messages')

                    <h1 class="text-white">Trang chủ</h1>
                    <p>
                        <a class="text-white" style="font-size: 16px;" href="{{ route('auth.view-changePassword') }}">
                            Đổi mật khẩu
                        </a>
                    </p>
                    <p>
                        <a class="text-white" style="font-size: 16px;" href="{{ route('auth.logout') }}">Đăng xuất</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
