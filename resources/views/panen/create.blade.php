<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Panen</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    <h2>Tambah Data Hasil Panen</h2>
    <hr>

    {{-- Tampilkan error validasi --}}
    @if($errors->any())
        <div style="background-color: #ffe0e0; padding: 10px; margin-bottom: 15px; border: 1px solid red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/data-panen/store" method="POST">
        @csrf
        <table cellpadding="8">
            <tr>
                <td>Nama Komoditas</td>
                <td>:</td>
                <td><input type="text" name="nama_komoditas" value="{{ old('nama_komoditas') }}"></td>
            </tr>
            <tr>
                <td>Jumlah (Kg)</td>
                <td>:</td>
                <td><input type="number" name="jumlah_kg" value="{{ old('jumlah_kg') }}"></td>
            </tr>
            <tr>
                <td>Tanggal Panen</td>
                <td>:</td>
                <td><input type="date" name="tanggal_panen"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit">Simpan</button>
                    <a href="/data-panen">Kembali</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>