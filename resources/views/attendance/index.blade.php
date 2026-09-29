<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Absensi | Absensi Digital</title>


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
            margin-bottom: 30px;
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


        /* ALERT */

        .alert {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .alert-success {
            background: #f0fdf4;
            color: #15803d;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }


        /* SUMMARY */

        .summary {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 25px;
        }

        .summary-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 18px 20px;
        }

        .summary-label {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 7px;
        }

        .summary-number {
            font-size: 25px;
            font-weight: 700;
        }

        .hadir .summary-number {
            color: #16a34a;
        }

        .izin .summary-number {
            color: #2563eb;
        }

        .sakit .summary-number {
            color: #d97706;
        }

        .alpa .summary-number {
            color: #dc2626;
        }


        /* SECTION */

        .section-title {
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: 600;
        }


        /* TABLE CARD */

        .table-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
        }

        .table-header {
            padding: 20px 23px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 16px;
        }

        .table-header h2 {
            margin: 0;
            font-size: 16px;
        }


        /* FILTER */

        .filter-form {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .filter-form select,
        .filter-form input {
            border: 1px solid #dbe3ed;
            background: white;
            color: #475569;
            padding: 9px 11px;
            border-radius: 8px;
            font-size: 12px;
            outline: none;
        }

        .filter-button {
            border: none;
            background: #2563eb;
            color: white;
            padding: 9px 15px;
            border-radius: 8px;
            font-size: 12px;
            cursor: pointer;
            font-weight: 600;
        }

        .reset-button {
            text-decoration: none;
            background: #f1f5f9;
            color: #64748b;
            padding: 9px 15px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .total {
            background: #eff6ff;
            color: #2563eb;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }


        /* TABLE */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .7px;
            text-align: left;
            padding: 14px 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 13px 20px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
            color: #475569;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #fbfdff;
        }

        .number-cell {
            color: #94a3b8;
        }

        .student-name {
            font-weight: 600;
            color: #0f172a;
        }

        .nis {
            font-family: monospace;
            color: #64748b;
        }

        .class-badge {
            display: inline-block;
            background: #eff6ff;
            color: #2563eb;
            padding: 5px 9px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 600;
        }


        /* STATUS SELECT */

        .status-form {
            margin: 0;
        }

        .status-select {
            border: none;
            outline: none;
            padding: 7px 10px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
        }

        .status-select.hadir {
            background: #f0fdf4;
            color: #16a34a;
        }

        .status-select.izin {
            background: #eff6ff;
            color: #2563eb;
        }

        .status-select.sakit {
            background: #fffbeb;
            color: #d97706;
        }

        .status-select.alpa {
            background: #fef2f2;
            color: #dc2626;
        }

        .status-select.belum {
            background: #f1f5f9;
            color: #64748b;
        }


        /* RESPONSIVE */

        @media (max-width: 1000px) {

            .summary {
                grid-template-columns: repeat(2, 1fr);
            }

            .table-card {
                overflow-x: auto;
            }

            table {
                min-width: 900px;
            }
        }

        @media (max-width: 700px) {

            .sidebar {
                width: 70px;
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

            <div class="brand-icon">
                ✓
            </div>

            <div class="brand-text">

                <h2>
                    Absensi Digital
                </h2>

                <span>
                    School Attendance
                </span>

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

            <a href="/students">
                <div class="menu-icon">👨‍🎓</div>
                <span>Data Siswa</span>
            </a>

            <a href="/classes">
                <div class="menu-icon">🏫</div>
                <span>Data Kelas</span>
            </a>

            <a href="/attendance" class="active">
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


        <!-- TOPBAR -->

        <div class="topbar">

            <div class="welcome">

                <h1>
                    Data Absensi 📋
                </h1>

                <p>
                    Kelola kehadiran seluruh siswa.
                </p>

            </div>


            <div class="profile">

                <div class="avatar">
                    A
                </div>

                <div class="profile-info">

                    <strong>
                        Administrator
                    </strong>

                    <span>
                        Admin
                    </span>

                </div>

            </div>

        </div>


        <!-- ALERT -->

        @if (session('success'))

            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>

        @endif


        @if (session('error'))

            <div class="alert alert-error">
                {{ session('error') }}
            </div>

        @endif


        <!-- SUMMARY -->

        <div class="summary">

            <div class="summary-card hadir">

                <div class="summary-label">
                    Hadir
                </div>

                <div class="summary-number">
                    {{ $jumlahHadir }}
                </div>

            </div>


            <div class="summary-card izin">

                <div class="summary-label">
                    Izin
                </div>

                <div class="summary-number">
                    {{ $jumlahIzin }}
                </div>

            </div>


            <div class="summary-card sakit">

                <div class="summary-label">
                    Sakit
                </div>

                <div class="summary-number">
                    {{ $jumlahSakit }}
                </div>

            </div>


            <div class="summary-card alpa">

                <div class="summary-label">
                    Alpa
                </div>

                <div class="summary-number">
                    {{ $jumlahAlpa }}
                </div>

            </div>

        </div>


        <div class="section-title">
            Daftar Absensi Siswa
        </div>


        <div class="table-card">


            <!-- HEADER -->

            <div class="table-header">

                <div class="table-header-top">

                    <h2>
                        Kehadiran Siswa
                    </h2>

                    <div class="total">
                        {{ $students->count() }} Siswa
                    </div>

                </div>


                <!-- FILTER -->

                <form
                    method="GET"
                    action="/attendance"
                    class="filter-form"
                >

                    <select name="class_id">

                        <option value="">
                            Semua Kelas
                        </option>

                        @foreach ($classes as $class)

                            <option
                                value="{{ $class->id }}"
                                {{ request('class_id') == $class->id ? 'selected' : '' }}
                            >
                                {{ $class->nama_kelas }}
                            </option>

                        @endforeach

                    </select>


                    <input
                        type="date"
                        name="tanggal"
                        value="{{ $tanggal }}"
                    >


                    <button
                        type="submit"
                        class="filter-button"
                    >
                        Tampilkan
                    </button>


                    <a
                        href="/attendance"
                        class="reset-button"
                    >
                        Reset
                    </a>

                </form>

            </div>


            <!-- TABLE -->

            @if ($students->count() > 0)

                <table>

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>NIS</th>

                            <th>Nama Siswa</th>

                            <th>Kelas</th>

                            <th>Status Kehadiran</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($students as $student)

                            @php

                                $attendance =
                                    $attendances->get($student->id);

                                $currentStatus =
                                    $attendance->status ?? 'belum';

                            @endphp


                            <tr>

                                <td>

                                    <span class="number-cell">
                                        {{ $loop->iteration }}
                                    </span>

                                </td>


                                <td>

                                    <span class="nis">
                                        {{ $student->nis }}
                                    </span>

                                </td>


                                <td>

                                    <span class="student-name">
                                        {{ $student->nama }}
                                    </span>

                                </td>


                                <td>

                                    <span class="class-badge">

                                        {{ $student->schoolClass->nama_kelas ?? '-' }}

                                    </span>

                                </td>


                                <td>

                                    <form
                                        method="POST"
                                        action="/attendance/status"
                                        class="status-form"
                                    >

                                        @csrf


                                        <input
                                            type="hidden"
                                            name="student_id"
                                            value="{{ $student->id }}"
                                        >


                                        <input
                                            type="hidden"
                                            name="tanggal"
                                            value="{{ $tanggal }}"
                                        >


                                        <select
                                            name="status"
                                            class="status-select {{ $currentStatus }}"
                                            onchange="this.form.submit()"
                                        >

                                            <option
                                                value="belum"
                                                disabled
                                                {{ $currentStatus === 'belum' ? 'selected' : '' }}
                                            >
                                                Belum Diisi
                                            </option>


                                            <option
                                                value="hadir"
                                                {{ $currentStatus === 'hadir' ? 'selected' : '' }}
                                            >
                                                ✓ Hadir
                                            </option>


                                            <option
                                                value="izin"
                                                {{ $currentStatus === 'izin' ? 'selected' : '' }}
                                            >
                                                Izin
                                            </option>


                                            <option
                                                value="sakit"
                                                {{ $currentStatus === 'sakit' ? 'selected' : '' }}
                                            >
                                                Sakit
                                            </option>


                                            <option
                                                value="alpa"
                                                {{ $currentStatus === 'alpa' ? 'selected' : '' }}
                                            >
                                                Alpa
                                            </option>

                                        </select>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>


            @else

                <div class="empty">

                    Tidak ada data siswa.

                </div>

            @endif


        </div>

    </main>

</div>

</body>

</html>