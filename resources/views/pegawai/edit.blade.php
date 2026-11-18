<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pegawai - Restoran</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Form Edit Pegawai</h1>
        <nav>
            <a href="{{ route('pegawai.index') }}">&larr; Kembali ke Daftar Pegawai</a>
        </nav>
    </header>

    <hr>

    <main>
        <h2>Ubah Data Staff</h2>

        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
            @csrf
            @method('PUT')
            <p>
                <label>Nama Lengkap:</label><br>
                <input type="text" name="nama" value="{{ old('nama', $pegawai->nama) }}" required>
            </p>
            
            <p>
                <label>Jabatan:</label><br>
                <select name="jabatan">
                    <option value="chef" {{ $pegawai->jabatan == 'chef' ? 'selected' : '' }}>chef</option>
                    <option value="Waiter" {{ $pegawai->jabatan == 'Waiter' ? 'selected' : '' }}>Waiter</option>
                    <option value="Kasir" {{ $pegawai->jabatan == 'Kasir' ? 'selected' : '' }}>Kasir</option>
                </select>
            </p>

            <p>
                <label>Nomor Kontak:</label><br>
                <input type="number" name="nomor" value="{{ old('nomor', $pegawai->nomor) }}" required>
            </p>

            <p>
                <button type="submit">Simpan Perubahan</button>
            </p>
        </form>
    </main>

    <br><hr>

    <footer>
        <p>Sistem Restoran & Cafe - Modul Staff & Pegawai</p>
    </footer>
</body>
</html>