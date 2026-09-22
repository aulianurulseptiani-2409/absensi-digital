<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Absensi Digital</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            width: 220px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .card h2 {
            margin: 0 0 10px;
        }

        .number {
            font-size: 35px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>Dashboard Absensi Digital</h1>

    <div class="container">

        <div class="card">
            <h2>Jumlah Siswa</h2>
            <div class="number">{{ $jumlahSiswa }}</div>
        </div>

        <div class="card">
            <h2>Jumlah Kelas</h2>
            <div class="number">{{ $jumlahKelas }}</div>
        </div>

        <div class="card">
            <h2>Absensi Hari Ini</h2>
            <div class="number">{{ $absensiHariIni }}</div>
        </div>

    </div>

</body>
</html>