<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Absensi Digital</title>

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

        /* TOPBAR */

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 36px;
        }

        .welcome h1 {
            margin: 0 0 6px;
            font-size: 27px;
            font-weight: 700;
            color: #0f172a;
        }

        .welcome p {
            margin: 0;
            font-size: 14px;
            color: #64748b;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #ffffff;
            padding: 7px 14px 7px 7px;
            border: 1px solid #e2e8f0;
            border-radius: 30px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .profile-info strong {
            display: block;
            font-size: 13px;
            color: #0f172a;
        }

        .profile-info span {
            font-size: 11px;
            color: #94a3b8;
        }

        /* SECTION */

        .section-title {
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: 600;
            color: #0f172a;
        }

        /* STAT CARDS */

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 23px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.07);
        }

        .card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .card-label {
            font-size: 13px;
            color: #64748b;
        }

        .card-icon {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .icon-blue {
            background: #eff6ff;
            color: #2563eb;
        }

        .icon-sky {
            background: #f0f9ff;
            color: #0284c7;
        }

        .icon-green {
            background: #f0fdf4;
            color: #16a34a;
        }

        .number {
            font-size: 34px;
            font-weight: 700;
            color: #0f172a;
        }

        .card-description {
            margin-top: 6px;
            font-size: 12px;
            color: #94a3b8;
        }

        /* QUICK ACCESS */

        .quick-section {
            margin-top: 32px;
        }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .quick-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            padding: 20px;
            text-decoration: none;
            color: #0f172a;
            transition: 0.2s;
        }

        .quick-card:hover {
            border-color: #bfdbfe;
            background: #fbfdff;
            transform: translateY(-2px);
        }

        .quick-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #eff6ff;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 13px;
        }

        .quick-card strong {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .quick-card span {
            font-size: 12px;
            color: #64748b;
            line-height: 1.5;
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {
            .stats,
            .quick-grid {
                grid-template-columns: 1fr;
            }
        }

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

            .welcome h1 {
                font-size: 22px;
            }

            .profile-info {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-icon">✓</div>

            <div class="brand-text">
                <h2>Absensi Digital</h2>
                <span>School Attendance</span>
            </div>
        </div>

        <div class="menu-title">
            Menu Utama
        </div>

        <nav class="menu">

            <a href="/dashboard" class="active">
                <div class="menu-icon">⌂</div>
                <span>Dashboard</span>
            </a>

            <a href="/students">
                <div class="menu-icon">👨‍🎓</div>
                <span>Data Siswa</span>
            </a>

            <a href="/classes">
                <div class="menu-icon">🏫</div>
                <span>Data Kelas</span>
            </a>

            <a href="/attendance">
                <div class="menu-icon">📋</div>
                <span>Absensi</span>
            </a>

            <a href="/qr">
                <div class="menu-icon">▣</div>
                <span>QR Code</span>
            </a>

        </nav>

    </aside>


    <!-- MAIN -->
    <main class="main">

        <div class="topbar">

            <div class="welcome">
                <h1>Dashboard 👋</h1>

                <p>
                    Selamat datang di sistem Absensi Digital Sekolah.
                </p>
            </div>

            <div class="profile">

                <div class="avatar">
                    A
                </div>

                <div class="profile-info">
                    <strong>Administrator</strong>
                    <span>Admin</span>
                </div>

            </div>

        </div>


        <!-- STATISTICS -->

        <div class="section-title">
            Ringkasan
        </div>

        <div class="stats">

            <div class="card">

                <div class="card-top">

                    <div class="card-label">
                        Jumlah Siswa
                    </div>

                    <div class="card-icon icon-blue">
                        👨‍🎓
                    </div>

                </div>

                <div class="number">
                    {{ $jumlahSiswa }}
                </div>

                <div class="card-description">
                    Total siswa terdaftar
                </div>

            </div>


            <div class="card">

                <div class="card-top">

                    <div class="card-label">
                        Jumlah Kelas
                    </div>

                    <div class="card-icon icon-sky">
                        🏫
                    </div>

                </div>

                <div class="number">
                    {{ $jumlahKelas }}
                </div>

                <div class="card-description">
                    Total kelas tersedia
                </div>

            </div>


            <div class="card">

                <div class="card-top">

                    <div class="card-label">
                        Absensi Hari Ini
                    </div>

                    <div class="card-icon icon-green">
                        ✓
                    </div>

                </div>

                <div class="number">
                    {{ $absensiHariIni }}
                </div>

                <div class="card-description">
                    Kehadiran tercatat hari ini
                </div>

            </div>

        </div>


        <!-- QUICK ACCESS -->

        <div class="quick-section">

            <div class="section-title">
                Akses Cepat
            </div>

            <div class="quick-grid">

                <a href="/qr" class="quick-card">

                    <div class="quick-icon">
                        ▣
                    </div>

                    <strong>
                        Kelola QR Code
                    </strong>

                    <span>
                        Buat dan kelola QR untuk absensi siswa.
                    </span>

                </a>


                <a href="/attendance" class="quick-card">

                    <div class="quick-icon">
                        📋
                    </div>

                    <strong>
                        Lihat Absensi
                    </strong>

                    <span>
                        Lihat data kehadiran siswa.
                    </span>

                </a>


                <a href="/students" class="quick-card">

                    <div class="quick-icon">
                        👨‍🎓
                    </div>

                    <strong>
                        Data Siswa
                    </strong>

                    <span>
                        Kelola informasi siswa sekolah.
                    </span>

                </a>

            </div>

        </div>

    </main>

</div>

</body>
</html>