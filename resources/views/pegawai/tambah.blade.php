<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pegawai - Restoran</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Form Tambah Pegawai</h1>
        <nav>
            <a href="{{ route('pegawai.index') }}">&larr; Kembali ke Daftar Pegawai</a>
        </nav>
    </header>

    <hr>

    <main>
        <h2>Input Data Staff Baru</h2>

        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf
            <p>
                <label>Nama Lengkap:</label><br>
                <input type="text" name="nama" placeholder="Masukkan nama pegawai" value="{{ old('nama') }}" required>
            </p>
            
            <p>
                <label>Jabatan:</label><br>
                <select name="jabatan">
                    <option value="chef">chef</option>
                    <option value="Waiter">Waiter</option>
                    <option value="Kasir">Kasir</option>
                </select>
            </p>

            <p>
                <label>Nomor Kontak:</label><br>
                <input type="number" name="nomor" placeholder="Contoh: 08123456789" value="{{ old('nomor') }}" required>
            </p>

            <p>
                <button type="submit">Simpan Data</button>
            </p>
        </form>
    </main>

    <br><hr>

    <footer>
        <p>Sistem Restoran & Cafe - Modul Staff & Pegawai</p>
    </footer>
</body>
</html>