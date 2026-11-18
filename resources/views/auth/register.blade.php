<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Informasi Restoran & Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            background: linear-gradient(135deg, #F3E3D0 0%, #AACDDC 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .register-card {
            background: #ffffff;
            width: 100%;
            max-width: 440px;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #D2C4B4;
        }
        .header { text-align: center; margin-bottom: 24px; }
        .header h2 { font-size: 22px; font-weight: 700; color: #1E293B; }
        .header p { font-size: 13px; color: #64748B; margin-top: 4px; }
        
        .form-group { margin-bottom: 15px; }
        label { display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 5px; }
        input {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid #D2C4B4;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }
        input:focus { border-color: #81A6C6; box-shadow: 0 0 0 3px rgba(129, 166, 198, 0.2); }
        .error-msg { color: #D9534F; font-size: 12px; margin-top: 4px; }
        
        .btn-submit {
            width: 100%;
            background: #81A6C6;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            transition: 0.2s;
        }
        .btn-submit:hover { background: #6b91b2; }
        .login-link { text-align: center; margin-top: 18px; font-size: 13px; color: #64748B; }
        .login-link a { color: #81A6C6; font-weight: 600; text-decoration: none; }
        .login-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="register-card">
        <div class="header">
            <h2>Buat Akun Baru ✨</h2>
            <p>Sistem Informasi Restoran & Cafe</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Masukkan nama lengkap">
                @error('name') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com">
                @error('email') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required placeholder="Minimal 8 karakter">
                @error('password') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="Ulangi password">
                @error('password_confirmation') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn-submit">Daftar (Register)</button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </div>
    </div>
</body>
</html>