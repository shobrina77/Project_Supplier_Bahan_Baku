<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Restoran & Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            background: linear-gradient(135deg, #F3E3D0 0%, #AACDDC 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #1E293B;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(10px);
        }
        .brand { font-weight: 700; font-size: 18px; color: #1E293B; }
        .nav-links a {
            text-decoration: none;
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            margin-left: 10px;
            transition: 0.2s;
        }
        .btn-login { color: #1E293B; border: 1.5px solid #81A6C6; }
        .btn-login:hover { background: #81A6C6; color: white; }
        .btn-register { background: #81A6C6; color: white; }
        .btn-register:hover { background: #6b91b2; }
        
        .hero {
            max-width: 750px;
            margin: auto;
            text-align: center;
            background: rgba(255, 255, 255, 0.88);
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
        }
        .badge {
            display: inline-block;
            background: #F3E3D0;
            color: #7c5e3c;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
            border: 1px solid #D2C4B4;
        }
        h1 { font-size: 30px; font-weight: 700; margin-bottom: 15px; color: #1E293B; }
        p { font-size: 15px; color: #475569; margin-bottom: 30px; line-height: 1.6; }
        .cta-btn {
            display: inline-block;
            background: #81A6C6;
            color: white;
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            box-shadow: 0 4px 12px rgba(129, 166, 198, 0.4);
            transition: 0.2s;
        }
        .cta-btn:hover { background: #6b91b2; transform: translateY(-2px); }
        footer {
            text-align: center;
            padding: 15px;
            font-size: 13px;
            color: #475569;
            background: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>
    <nav>
        <div class="brand">🍽️ Resto & Cafe System</div>
        <div class="nav-links">
            @auth
                <a href="{{ route('supplier.index') }}" class="btn-register">Masuk ke Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-login">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-register">Register</a>
                @endif
            @endauth
        </div>
    </nav>

    <div class="hero">
        <span class="badge">Modul Manajemen Bahan Baku</span>
        <h1>Sistem Informasi Restoran & Cafe</h1>
        <p>Platform terintegrasi untuk mengelola data supplier bahan baku, memantau stok pasokan, serta mengatur hak akses operasional antara Admin dan Staff secara aman.</p>
        
        @auth
            <a href="{{ route('supplier.index') }}" class="cta-btn">Buka Data Supplier →</a>
        @else
            <a href="{{ route('login') }}" class="cta-btn">Mulai Login Sekarang →</a>
        @endauth
    </div>

    <footer>
        Nama: Nadiya Laela Shobrina | NIM: 102022500078 | Kelas: SI-4906 | Kelompok: 10 | Modul : Supplier Bahan Baku
    </footer>
</body>
</html>