```html
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>QR Code | Absensi Digital</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */

        .sidebar {
            width: 245px;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 25px 16px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px;
            margin-bottom: 42px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }

        .brand-text h2 {
            margin: 0;
            font-size: 16px;
            color: #0f172a;
        }

        .brand-text span {
            display: block;
            margin-top: 3px;
            font-size: 11px;
            color: #94a3b8;
        }

        .menu-title {
            padding: 0 13px;
            margin-bottom: 10px;
            font-size: 10px;
            font-weight: 600;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu a {
            text-decoration: none;
            color: #64748b;
            padding: 12px 14px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #eff6ff;
            color: #2563eb;
        }

        .menu a.active {
            background: #eff6ff;
            color: #2563eb;
            font-weight: 600;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        /* MAIN */

        .main {
            margin-left: 245px;
            width: calc(100% - 245px);
            padding: 32px 40px;
        }

        /* HEADER */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            margin: 0 0 6px;
            font-size: 27px;
            color: #0f172a;
        }

        .page-header p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .header-badge {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #dbeafe;
            padding: 9px 14px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
        }

        /* LOCATION CARD */

        .location-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
        }

        .location-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 22px;
        }

        .location-title {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .location-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .location-title h2 {
            margin: 0 0 4px;
            font-size: 18px;
        }

        .location-title p {
            margin: 0;
            font-size: 12px;
            color: #94a3b8;
        }

        .status {
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .aktif {
            color: #15803d;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
        }

        .nonaktif {
            color: #dc2626;
            background: #fef2f2;
            border: 1px solid #fecaca;
        }

        /* LOCATION INFO */

        .location-info {
            display: flex;
            gap: 10px;
            margin-bottom: 22px;
        }

        .info-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 11px 14px;
        }

        .info-box small {
            display: block;
            color: #94a3b8;
            font-size: 10px;
            margin-bottom: 4px;
        }

        .info-box strong {
            font-size: 13px;
            color: #334155;
        }

        /* TABLE */

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .4px;
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 15px 14px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
            color: #475569;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #fbfdff;
        }

        /* QR */

        .qr-box {
            width: 125px;
            height: 125px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qr-box svg {
            max-width: 100%;
            max-height: 100%;
        }

        .token {
            display: inline-block;
            padding: 7px 9px;
            border-radius: 7px;
            background: #f1f5f9;
            color: #334155;
            font-family: Consolas, monospace;
            font-size: 11px;
        }

        .date {
            color: #334155;
            font-weight: 500;
        }

        .time {
            color: #64748b;
            white-space: nowrap;
        }

        /* EMPTY */

        .empty {
            padding: 35px;
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
        }

        /* RESPONSIVE */

        @media (max-width: 700px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .brand {
                justify-content: center;
                padding: 0;
            }

            .brand-text,
            .menu-title,
            .menu a span {
                display: none;
            }

            .menu a {
                justify-content: center;
            }

            .main {
                margin-left: 70px;
                width: calc(100% - 70px);
                padding: 22px;
            }

            .page-header {
                align-items: flex-start;
            }

            .header-badge {
                display: none;
            }

            .location-header {
                flex-direction: column;
                gap: 15px;
            }

            .location-info {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                ✓
            </div>

            <div class="brand-text">
                <h2>Absensi Digital</h2>
                <span>School Attendance</span>
            </div>

        </div>

        <div class="menu-title">
            Menu Utama
        </div>

        <nav class="menu">

            <a href="/dashboard">
                <div class="menu-icon">⌂</div>
                <span>Dashboard</span>
            </a>

            <a href="#">
                <div class="menu-icon">👨‍🎓</div>
                <span>Data Siswa</span>
            </a>

            <a href="#">
                <div class="menu-icon">🏫</div>
                <span>Data Kelas</span>
            </a>

            <a href="#">
                <div class="menu-icon">📋</div>
                <span>Absensi</span>
            </a>

            <a href="/qr" class="active">
                <div class="menu-icon">▣</div>
                <span>QR Code</span>
            </a>

        </nav>

    </aside>


    <!-- MAIN -->

    <main class="main">

        <div class="page-header">

            <div>
                <h1>QR Code</h1>

                <p>
                    Kelola lokasi dan token QR untuk absensi siswa.
                </p>
            </div>

            <div class="header-badge">
                QR Management
            </div>

        </div>


        @forelse ($locations as $location)

            <div class="location-card">

                <div class="location-header">

                    <div class="location-title">

                        <div class="location-icon">
                            ▣
                        </div>

                        <div>
                            <h2>{{ $location->nama_lokasi }}</h2>

                            <p>
                                Lokasi QR Absensi
                            </p>
                        </div>

                    </div>


                    @if ($location->status)

                        <span class="status aktif">
                            ● Aktif
                        </span>

                    @else

                        <span class="status nonaktif">
                            ● Tidak Aktif
                        </span>

                    @endif

                </div>


                <div class="location-info">

                    <div class="info-box">

                        <small>Kode Lokasi</small>

                        <strong>
                            {{ $location->kode_lokasi }}
                        </strong>

                    </div>

                    <div class="info-box">

                        <small>Total Token</small>

                        <strong>
                            {{ $location->qrTokens->count() }}
                        </strong>

                    </div>

                </div>


                <div class="table-wrapper">

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

                                        <div class="qr-box">
                                            {!! QrCode::size(110)->generate($token->token) !!}
                                        </div>

                                    </td>


                                    <td>

                                        <span class="token">
                                            {{ $token->token }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="date">
                                            {{ $token->tanggal }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="time">
                                            {{ $token->waktu_mulai }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="time">
                                            {{ $token->waktu_berakhir }}
                                        </span>

                                    </td>


                                    <td>

                                        @if ($token->status)

                                            <span class="status aktif">
                                                ● Aktif
                                            </span>

                                        @else

                                            <span class="status nonaktif">
                                                ● Tidak Aktif
                                            </span>

                                        @endif

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td colspan="6">

                                        <div class="empty">
                                            Belum ada token QR untuk lokasi ini.
                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        @empty

            <div class="location-card">

                <div class="empty">
                    Belum ada lokasi QR.
                </div>

            </div>

        @endforelse

    </main>

</div>

</body>

</html>
```
