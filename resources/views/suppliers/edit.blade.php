<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header>
        <h1>Sistem Informasi Restoran & Cafe</h1>
        <p>Modul Supplier Bahan Baku</p>
    </header>
    <nav style="display: flex; justify-content: center; align-items: center; gap: 15px;">
        <a href="{{ route('supplier.index') }}">Daftar Supplier</a>
        <a href="{{ route('supplier.create') }}">Tambah Supplier</a>
        
        <!-- Tombol Logout -->
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin keluar?')" style="background: red; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; font-weight: bold;">
                Logout
            </button>
        </form>
    </nav>
    <main>
        <h2>Edit Data Supplier</h2>

        @if ($errors->any())
            <div style="background: #F8D7DA; color: #721C24; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                <ul style="margin: 0; padding-left: 15px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('supplier.update', $supplier->id_supplier) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label>Nama Supplier</label>
            <input type="text" name="nama_supplier" value="{{ old('nama_supplier', $supplier->nama_supplier) }}" required>

            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', $supplier->alamat) }}" required>

            <label>Jenis Pasokan</label>
            <select name="jenis_pasokan" required>
                <option value="Sayur & Buah" {{ old('jenis_pasokan', $supplier->jenis_pasokan) == 'Sayur & Buah' ? 'selected' : '' }}>Sayur & Buah</option>
                <option value="Daging & Unggas" {{ old('jenis_pasokan', $supplier->jenis_pasokan) == 'Daging & Unggas' ? 'selected' : '' }}>Daging & Unggas</option>
                <option value="Ikan & Hasil Laut" {{ old('jenis_pasokan', $supplier->jenis_pasokan) == 'Ikan & Hasil Laut' ? 'selected' : '' }}>Ikan & Hasil Laut</option>
                <option value="Bumbu & Rempah" {{ old('jenis_pasokan', $supplier->jenis_pasokan) == 'Bumbu & Rempah' ? 'selected' : '' }}>Bumbu & Rempah</option>
            </select>

            <label>Nomor Kontak (Wajib Angka)</label>
            <input type="text" name="nomor_kontak" value="{{ old('nomor_kontak', $supplier->nomor_kontak) }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>

            <label>Catatan</label>
            <textarea name="catatan" rows="4">{{ old('catatan', $supplier->catatan) }}</textarea>

            <button type="submit">Update</button>
        </form>
        <br>
        <a href="{{ route('supplier.index') }}">Kembali ke Daftar Supplier</a>
    </main>
    <footer>
        Nama: Nadiya Laela Shobrina | NIM: 102022500078 | Kelas: SI-4906 | Kelompok: 10 | Modul: Supplier Bahan Baku
    </footer>
</body>
</html>