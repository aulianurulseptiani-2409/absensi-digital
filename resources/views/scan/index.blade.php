<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Scan QR Absensi</title>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }

        .container {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        h1 {
            margin-top: 0;
            text-align: center;
        }

        .info {
            text-align: center;
            color: #64748b;
            margin-bottom: 20px;
        }

        #reader {
            width: 100%;
        }

        select,
        button {
            width: 100%;
            padding: 13px;
            margin-top: 15px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            font-size: 15px;
        }

        button {
            background: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>📷 Scan QR Absensi</h1>

        <p class="info">
            Pilih siswa, lalu arahkan kamera ke QR absensi.
        </p>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        <select id="student_id">
            <option value="">-- Pilih Siswa --</option>

            @foreach($students as $student)
                <option value="{{ $student->id }}">
                    {{ $student->nama }} - {{ $student->nis }}
                </option>
            @endforeach
        </select>

        <div id="reader"></div>

        <form id="scanForm" method="POST" action="{{ url('/scan/process') }}">
            @csrf

            <input type="hidden" name="token" id="token">
            <input type="hidden" name="student_id" id="studentInput">

        </form>

    </div>

</div>

<script>

let sudahScan = false;

function onScanSuccess(decodedText, decodedResult) {

    if (sudahScan) {
        return;
    }

    const studentId = document.getElementById('student_id').value;

    if (!studentId) {
        alert('Pilih siswa terlebih dahulu!');
        return;
    }

    sudahScan = true;

    document.getElementById('token').value = decodedText;
    document.getElementById('studentInput').value = studentId;

    document.getElementById('scanForm').submit();
}

function onScanFailure(error) {
    // Abaikan error ketika kamera sedang mencari QR
}

const scanner = new Html5QrcodeScanner(
    "reader",
    {
        fps: 10,
        qrbox: {
            width: 250,
            height: 250
        }
    },
    false
);

scanner.render(onScanSuccess, onScanFailure);

</script>

</body>
</html>