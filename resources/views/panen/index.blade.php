<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Hasil Panen</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    <h2>Data Hasil Panen Pertanian</h2>
    <hr>

    <a href="/data-panen/create">
        <button>+ Tambah Data</button>
    </a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th>No</th>
                <th>Nama Komoditas</th>
                <th>Jumlah (Kg)</th>
                <th>Tanggal Panen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataPanen as $index => $item)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td>{{ $item->nama_komoditas }}</td>
                <td align="center">{{ $item->jumlah_kg }}</td>
                <td align="center">{{ $item->tanggal_panen }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>