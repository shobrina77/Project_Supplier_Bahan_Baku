<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Supplier Bahan Baku</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header>
        <h1>Sistem Informasi Restoran & Cafe</h1>
        <p>Modul Supplier Bahan Baku</p>
    </header>
    
    <nav style="display: flex; justify-content: center; align-items: center; gap: 15px; flex-wrap: wrap;">
        <a href="{{ route('supplier.index') }}">Daftar Supplier</a>
        <a href="{{ route('supplier.create') }}">Tambah Supplier</a>
        
        @auth
            <span style="background: rgba(255, 255, 255, 0.3); padding: 4px 10px; border-radius: 4px; font-size: 13px; font-weight: 600; color: #1E293B;">
                👤 {{ Auth::user()->name }} (Role: <strong>{{ Auth::user()->role }}</strong>)
            </span>

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin keluar?')" style="background: #D9534F; color: white; border: none; padding: 6px 12px; border-radius: 6px; cursor: pointer; font-weight: bold; font-family: 'Poppins', sans-serif;">
                    Logout
                </button>
            </form>
        @endauth
    </nav>

    <main>
        <h2>Daftar Supplier Bahan Baku</h2>

        @if(session('success'))
            <div style="background: #D4EDDA; color: #155724; padding: 10px; border-radius: 6px; margin-bottom: 15px; font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif

        <p>Berikut adalah data supplier bahan baku restoran dan cafe.</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Jenis Pasokan</th>
                    <th>Nomor Kontak</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($suppliers as $index => $supplier)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->alamat }}</td>
                    <td>{{ $supplier->jenis_pasokan }}</td>
                    <td>{{ $supplier->nomor_kontak }}</td>
                    <td>{{ $supplier->catatan }}</td>
                    <td>
                        <a href="{{ route('supplier.edit', $supplier->id_supplier) }}" style="background: #81A6C6; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 12px; display: inline-block; margin-bottom: 3px;">Edit</a>
                        
                        @if(Auth::check() && Auth::user()->role === 'admin')
                            <form action="{{ route('supplier.destroy', $supplier->id_supplier) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')" style="background: #D9534F; color: white; padding: 5px 10px; border: none; border-radius: 4px; font-size: 12px; cursor: pointer;">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Belum ada data supplier.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </main>
    <footer>
        Nama: Nadiya Laela Shobrina | NIM: 102022500078 | Kelas: SI-4906 | Kelompok: 10 | Modul: Supplier Bahan Baku
    </footer>
</body>
</html>