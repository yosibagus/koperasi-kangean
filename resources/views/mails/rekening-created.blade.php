<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekening Berhasil Dibuat</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background: #f7f7f7; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="480" cellpadding="0" cellspacing="0" style="background: #fff; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); padding: 32px;">
                    <tr>
                        <td align="center" style="padding-bottom: 24px;">
                            <div style="width: 60px; height: 60px; background: #4CAF50; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                                <span style="font-size: 32px; color: #fff;">&#10003;</span>
                            </div>
                            <h2 style="color: #333; margin: 0 0 8px 0;">Rekening Berhasil Dibuat</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: #555; font-size: 16px; padding-bottom: 16px;">
                            Halo {{ $anggota->name }},
                        </td>
                    </tr>
                    <tr>
                        <td style="color: #555; font-size: 16px; padding-bottom: 16px;">
                            Selamat! Rekening Anda telah berhasil dibuat.
                        </td>
                    </tr>
                    <tr>
                        <td style="color: #555; font-size: 16px; padding-bottom: 16px;">
                            Untuk melihat detail rekening Anda, silakan login menggunakan:
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="background: #f1f1f1; border-radius: 6px; padding: 16px; width: 100%; margin-bottom: 16px;">
                                <tr>
                                    <td style="font-size: 15px; color: #333;">
                                        <strong>Email:</strong> {{ $anggota->email }}<br>
                                        <strong>Password:</strong> {{ $password }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: #d32f2f; font-size: 15px; padding-bottom: 16px;">
                            <strong>Peringatan:</strong> Jangan pernah memberikan informasi email dan password ini kepada siapapun. Untuk keamanan akun Anda, segera ubah password setelah login pertama kali.
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 24px;">
                            <a href="{{ url('/login') }}" style="display: inline-block; background: #4CAF50; color: #fff; text-decoration: none; padding: 12px 32px; border-radius: 5px; font-size: 16px; font-weight: bold;">Login Sekarang</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="color: #888; font-size: 14px;">
                            Terima kasih telah bergabung bersama kami.<br>
                            <span style="color: #bbb;">&copy; {{ date('Y') }} Koperasi</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
