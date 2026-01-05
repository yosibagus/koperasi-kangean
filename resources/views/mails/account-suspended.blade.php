<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Koperasi</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #dee2e6; border-radius: 5px; padding: 20px;">
        @if ($type == 'suspend')
            <h2 style="color: #dc3545;">Akun Anda Diblokir</h2>
            <p style="color: #212529;">Kami informasikan bahwa akun Anda telah diblokir. Jika Anda ingin membuka kembali akun Anda, harap menghubungi customer service terkait.</p>
        @elseif ($type == 'unsuspend')
            <h2 style="color: #28a745;">Akun Anda Dibuka Kembali</h2>
            <p style="color: #212529;">Kami informasikan bahwa akun Anda telah dibuka kembali. Jika Anda tidak merasa melakukan tindakan ini, harap menghubungi customer service terkait.</p>
        @endif
        <p style="color: #212529;">Terima kasih atas perhatian Anda.</p>
        <p style="color: #212529;">Salam,</p>
        <p style="color: #212529;">Tim Koperasi</p>
    </div>
</body>
</html>
