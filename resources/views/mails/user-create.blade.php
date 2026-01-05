<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Koperasi</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #dee2e6; border-radius: 5px; padding: 20px;">
        <h2 style="color: #007bff;">Selamat Datang di Koperasi</h2>
        <p style="color: #212529;">Akun Anda telah berhasil dibuat. Berikut adalah informasi login Anda:</p>
        <p style="color: #212529;"><strong>Email:</strong> {{ $email }}</p>
        <p style="color: #212529;"><strong>Password:</strong> {{ $password }}</p>
        <p style="color: #212529;">Silakan login ke aplikasi dan segera ubah password Anda agar akun tetap aman.</p>
        <p style="color: #212529; margin-top: 20px;">Jika Anda tidak membuat akun ini, harap abaikan email ini.</p>
        <p style="color: #212529;">Terima kasih,</p>
        <p style="color: #212529;">Tim Koperasi</p>
    </div>
</body>
</html>
