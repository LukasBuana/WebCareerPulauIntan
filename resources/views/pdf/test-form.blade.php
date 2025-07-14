<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uji PDF Generator</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        form div { margin-bottom: 10px; }
        label { display: inline-block; width: 150px; }
        input[type="text"] { width: 300px; padding: 5px; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Uji Pembuatan PDF Aplikasi Karyawan</h1>

    <form action="{{ route('generate.pdf') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nama Lengkap:</label>
            <input type="text" id="name" name="name" value="{{ $user->name ?? 'John Doe' }}">
        </div>
        <div>
            <label for="gender">Jenis Kelamin (L/P):</label>
            <input type="text" id="gender" name="gender" value="{{ $user->gender ?? 'L' }}" maxlength="1" style="width: 50px;">
        </div>
        <div>
            <label for="address_ktp">Alamat Sesuai KTP:</label>
            <input type="text" id="address_ktp" name="address_ktp" value="{{ $user->address_ktp ?? 'Jl. Merdeka No. 1, Jakarta' }}">
        </div>
        <div>
            <label for="address_now">Alamat Sekarang:</label>
            <input type="text" id="address_now" name="address_now" value="{{ $user->address_now ?? 'Jl. Damai No. 10, Bandung' }}">
        </div>
        {{-- Anda bisa menambahkan input lain sesuai kebutuhan template PDF --}}
        <button type="submit">Buat & Unduh PDF</button>
    </form>

    @if(isset($user))
        <p style="margin-top: 20px;">Data dari database (User ID: {{ $user->id }}):</p>
        <ul>
            <li>Nama: {{ $user->name }}</li>
            <li>Alamat KTP: {{ $user->address_ktp }}</li>
            <li>Alamat Sekarang: {{ $user->address_now }}</li>
        </ul>
    @else
        <p style="margin-top: 20px;">Tidak ada data user yang ditemukan di database untuk contoh ini.</p>
    @endif
</body>
</html>