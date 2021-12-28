<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\ForgotPassword;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['username', 'password']))) {
            return redirect()->route('home')->with('success', 'Đăng nhập thành công');
        }
        return redirect()->back()->withInput()->with('error', 'Đăng nhập thất bại');
    }

    public function viewRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();
            User::create($request->validated());
            DB::commit();
            return redirect()->route('auth.view-login')->with('success', 'Đăng ký thành công');
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
        return redirect()->back()->withInput()->with('error', 'Đăng ký thất bại');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.view-login')->with('success', 'Đăng xuất thành công');
    }

    public function viewChangePassword()
    {
        return view('auth.change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        $user->update(['password' => $request->get('new_password')]);
        return redirect()->route('home')->with('success', 'Đổi mật khẩu thành công');
    }

    public function viewForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email'
        ], [
            'email.required' => 'Không được để trống',
            'email.email' => 'Email sai định dạng'
        ])->validate();
        $user = User::where('email', $request->get('email'))->first();
        if (empty($user)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email không thuộc tài khoản nào. Vui lòng nhập lại');
        }
        try {
            DB::beginTransaction();
            $reset = PasswordReset::create([
                'email' => $user->email,
                'token' => Str::uuid(),
                'expired_time' => Carbon::now()->addMinutes(10),
                'created_at' => Carbon::now()
            ]);
            Mail::to($user->email)->queue(new ForgotPassword($user->username, $reset->token));
            DB::commit();
            return redirect()->back()
                ->withInput()
                ->with('success', 'Email lấy lại mật khẩu đã được gửi đến bạn thành công!');
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
        return redirect()->back()
            ->withInput()
            ->with('error', 'Lỗi gửi email');
    }

    public function viewResetPassword($token)
    {
        if (empty($token)) {
            return redirect()->route('auth.view-login');
        }
        $reset = PasswordReset::where('token', $token)->first();
        if (empty($reset)) {
            return redirect()->route('auth.view-login');
        }
        if (Carbon::createFromFormat('Y-m-d H:i:s', $reset->expired_time)->lessThan(Carbon::now())) {
            return redirect()->route('auth.view-login')->with('error', 'Email đặt lại mật khẩu đã hết hạn');
        }
        return view('auth.reset-password', [
            'email' => $reset->email
        ]);
    }

    public function resetPassword(Request $request)
    {
        Validator::make($request->all(), [
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
                'confirmed',
            ],
        ], [
            'password.required' => 'Mật khẩu là bắt buộc',
            'password.min' => 'Mật khẩu phải có độ dài tối thiểu 8 ký tự',
            'password.confirmed' => 'Nhập lại mật khẩu không hợp lệ',
            'password.regex' => 'Mật khẩu phải bao gồm chữ hoa, chữ thường, chữ số và kí tự đặc biệt',
        ])->validate();
        $user = User::where('email', $request->get('email'))->first();
        $user->update(['password' => $request->get('password')]);
        return redirect()->route('auth.view-login')->with('success', 'Đặt lại mật khẩu thành công');
    }
}
