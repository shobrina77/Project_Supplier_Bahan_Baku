<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Restoran & Cafe</title>
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
        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            padding: 40px 35px;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #D2C4B4;
        }
        .header { text-align: center; margin-bottom: 28px; }
        .header h2 { font-size: 22px; font-weight: 700; color: #1E293B; }
        .header p { font-size: 13px; color: #64748B; margin-top: 5px; }
        
        .form-group { margin-bottom: 18px; }
        label { display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px; }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid #D2C4B4;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }
        input:focus { border-color: #81A6C6; box-shadow: 0 0 0 3px rgba(129, 166, 198, 0.2); }
        
        .error-msg { color: #D9534F; font-size: 12px; margin-top: 5px; }
        .remember-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: #475569;
            margin-bottom: 22px;
        }
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
            transition: 0.2s;
        }
        .btn-submit:hover { background: #6b91b2; }
        .register-link { text-align: center; margin-top: 20px; font-size: 13px; color: #64748B; }
        .register-link a { color: #81A6C6; font-weight: 600; text-decoration: none; }
        .register-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="header">
            <h2>Selamat Datang 👋</h2>
            <p>Login ke Sistem Informasi Restoran & Cafe</p>
        </div>

        @if (session('status'))
            <div style="background: #D4EDDA; color: #155724; padding: 10px; border-radius: 8px; font-size: 13px; margin-bottom: 15px;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="nama@email.com">
                @error('email')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required placeholder="••••••••">
                @error('password')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember-row">
                <label style="display: flex; align-items: center; gap: 6px; margin: 0; font-weight: 400; cursor: pointer;">
                    <input type="checkbox" name="remember"> Ingat saya
                </label>
            </div>

            <button type="submit" class="btn-submit">Masuk (Log In)</button>
        </form>

        @if (Route::has('register'))
            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
            </div>
        @endif
    </div>
</body>
</html>