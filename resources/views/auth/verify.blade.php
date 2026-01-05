<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Alamat Email Anda</title>
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .card p {
            margin-bottom: 10px;
        }
        .card a {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Verifikasi Alamat Email Anda</h1>
        <p>Hai {{ $user->name }},</p>
        <p>Terima kasih telah mendaftar. Silakan klik tautan di bawah ini untuk memverifikasi alamat email Anda:</p>
        <p>Dan Masukkan kode OTP untuk verifikasi: <strong>{{ $user->otp }}</strong></p>
        <a href="{{ $verificationUrl }}">Verifikasi Email</a>
        <p>Jika Anda tidak membuat akun, tidak ada tindakan lebih lanjut yang diperlukan.</p>
        <p>Salam,<br>{{ config('app.name') }}</p>
    </div>
</body>
</html>
