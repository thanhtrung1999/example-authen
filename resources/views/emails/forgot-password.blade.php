<h1>Xin chào {{ $username }}</h1>
<h3>Ấn vào <a href="{{ route('auth.view-resetPassword', ['token' => $token]) }}">link</a> để đặt lại mật khẩu của bạn nhé!
</h3>
<p><b><i>Sau 10 phút tính từ thời điểm mail được gửi, link sẽ không còn hiệu lực</i></b></p>
