<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR {{ $qr_location->nama_lokasi }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            margin: 0;
            padding: 40px;
            text-align: center;
        }

        .card {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        h1 {
            margin-bottom: 8px;
        }

        .info {
            color: #666;
            margin-bottom: 25px;
        }

        .token {
            background: #f1f3f5;
            padding: 12px;
            border-radius: 8px;
            word-break: break-all;
            margin-top: 20px;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            text-decoration: none;
            color: white;
            background: #111827;
            padding: 10px 18px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="card">

    <h1>{{ $qr_location->nama_lokasi }}</h1>

    <div class="info">
        Kode Lokasi: {{ $qr_location->kode_lokasi }}
    </div>

    @if($qrToken)
        <div id="qrcode"></div>

        <div class="token">
            {{ $qrToken->token }}
        </div>

        <p>
            Berlaku: {{ $qrToken->waktu_mulai }}
            - {{ $qrToken->waktu_berakhir }}
        </p>
    @else
        <p>Belum ada QR aktif untuk hari ini.</p>
    @endif

    <a class="back" href="{{ route('admin.qr-locations.index') }}">
        ← Kembali
    </a>

</div>

@if($qrToken)
<script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

<script>
    new QRCode(document.getElementById("qrcode"), {
        text: @json($qrToken->token),
        width: 250,
        height: 250
    });
</script>
@endif

</body>
</html>