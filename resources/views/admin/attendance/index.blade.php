<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #f1f3f5;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Data Absensi</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($attendances as $attendance)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $attendance->student->nama ?? '-' }}</td>
                    <td>{{ $attendance->student->schoolClass->nama_kelas ?? '-' }}</td>
                    <td>{{ $attendance->qrLocation->nama_lokasi ?? '-' }}</td>
                    <td>{{ $attendance->attendance_date }}</td>
                    <td>{{ $attendance->attendance_time }}</td>
                    <td>{{ ucfirst($attendance->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data absensi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>