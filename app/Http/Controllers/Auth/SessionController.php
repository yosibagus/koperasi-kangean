<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SessionBank;
use App\Models\Admin\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class SessionController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $bank = new SessionBank();
            $bank->index();

            return redirect()->intended(auth()->user()->role.'/dashboard')->with('login', 'Login success');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // function session_bank($user)
    // {
    //     $profile = Profile::where('id_profile', $user->profile_id)->first();

    //     Session::put('bank', $profile->id_profile);
    // }

    function logout(Request $request)
    {
        Session::forget('bank');
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    function register()
    {
        $profiles = Profile::select('token_profile', 'nama_profile', 'alamat')->get();
        return view('auth.register', compact('profiles'));
    }

    function regist(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'name.string' => 'Nama harus berupa string',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.string' => 'Password harus berupa string',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        $token = Str::random(8);
        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);
        $profile = Profile::where('id_profile', 1)->first()->id_profile;

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'otp' => mt_rand(000000, 999999),
            'password' => $password,
            'profile_id' => $profile,
            'token_user' => $token,
            'foto_user' => 'default.jpg',
        ]);

        Mail::to($user->email)->send(new VerifyEmail($user));

        return redirect()->route('login')->with('success', 'Registration successful! Please check your email to verify your account.');
    }

    function verifyEmail(Request $request, $token)
    {
        $request->validate(['otp' => 'required|exists:users,otp']);
        $user_otp = User::where('token_user', $token)->first()->otp;
        if($user_otp != $request->otp){
            return redirect()->back()->with('error', 'kode OTP anda Salah');
        }
        $user = User::where('token_user', $token)->update(['email_verified_at' => now()]);

        return redirect()->route(auth()->user()->role.'.dashboard')->with('success', 'Email verified successfully! You can now log in.');
    }

    function resendEmail($token)
    {
        $user = User::where('token_user', $token)->firstOrFail();
        $otp = mt_rand(000000, 999999);
        $user->update(['otp' => $otp]);
        Mail::to($user->email)->send(new VerifyEmail($user));

        return redirect()->back()->with('success', 'Verification email sent! Please check your email.');
    }
}
