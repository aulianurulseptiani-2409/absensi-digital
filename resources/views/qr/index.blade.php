<!DOCTYPE html>
<html>
<head>
    <title>QR Management</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background: #f4f6f9;
        }

        h1 {
            margin-bottom: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f0f0f0;
        }

        .aktif {
            color: green;
            font-weight: bold;
        }

        .nonaktif {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>QR Management</h1>

    @forelse ($locations as $location)

        <div class="card">

            <h2>{{ $location->nama_lokasi }}</h2>

            <p>
                Kode Lokasi:
                <strong>{{ $location->kode_lokasi }}</strong>
            </p>

            <p>
                Status:
                @if ($location->status)
                    <span class="aktif">Aktif</span>
                @else
                    <span class="nonaktif">Tidak Aktif</span>
                @endif
            </p>

            <table>

                <thead>
                    <tr>
                        <th>QR Code</th>
                        <th>Token</th>
                        <th>Tanggal</th>
                        <th>Mulai</th>
                        <th>Berakhir</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($location->qrTokens as $token)

                        <tr>

                            <td>
                                {!! QrCode::size(150)->generate($token->token) !!}
                            </td>

                            <td>
                                {{ $token->token }}
                            </td>

                            <td>
                                {{ $token->tanggal }}
                            </td>

                            <td>
                                {{ $token->waktu_mulai }}
                            </td>

                            <td>
                                {{ $token->waktu_berakhir }}
                            </td>

                            <td>
                                @if ($token->status)
                                    <span class="aktif">Aktif</span>
                                @else
                                    <span class="nonaktif">Tidak Aktif</span>
                                @endif
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6">
                                Belum ada token QR.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    @empty

        <div class="card">
            Belum ada lokasi QR.
        </div>

    @endforelse

</body>
</html>