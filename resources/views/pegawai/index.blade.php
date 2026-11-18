<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul Staff & Pegawai</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Manajemen Staff & Pegawai Restoran</h1>
        <nav style="margin-top: 10px;">
            @auth
                <span>Halo, <strong>Hekal</strong> ({{ Auth::user()->role }})</span> | 
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:#e74c3c; color:white; border:none; padding:5px 10px; border-radius:4px; cursor:pointer;">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" style="color: #1ef29d;">Login Admin</a>
            @endauth
        </nav>
    </header>

    <hr>

    <main>
        <h2>Daftar Pegawai Restoran</h2>
        
        @auth
        <p>
            <a href="{{ route('pegawai.create') }}">+ Tambah Pegawai Baru</a>
        </p>
        @endauth

        @if(session('success'))
            <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
        @endif
        
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Jabatan</th>
                    <th>Nomor Kontak</th>
                    @auth
                    <th>Aksi</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach($pegawai as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->jabatan }}</td>
                    <td>{{ $d->nomor }}</td>
                    @auth
                    <td>
                        <a href="{{ route('pegawai.edit', $d->id) }}" style="background: #f39c12; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px;">Edit</a>
                        
                        {{-- Tombol Hapus dikunci cuma buat Admin --}}
                        @if(Auth::user()->role === 'admin')
                            <form action="{{ route('pegawai.destroy', $d->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin mau hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #e74c3c; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;">Hapus</button>
                            </form>
                        @endif
                    </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <br>
    <hr>

    <footer style="text-align: left;">
        <p>
            Nama: Haikal Hadamean Siregar
            <br>
            NIM: 102022500237
            <br>
            Kelas: SI-49-06
            <br>
            Kelompok 10
            <br>
            Modul: Modul Staff & Pegawai (Laravel)
        </p>
    </footer>
</body>
</html>