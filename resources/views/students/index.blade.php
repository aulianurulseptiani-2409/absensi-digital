<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa | Absensi Digital</title>

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

        /* TABLE CARD */

        .table-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 23px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-header h2 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
            color: #0f172a;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-form {
            margin: 0;
        }

        .filter-form select {
            padding: 8px 12px;
            border: 1px solid #dbeafe;
            border-radius: 9px;
            background: #ffffff;
            color: #334155;
            font-size: 12px;
            outline: none;
            cursor: pointer;
        }

        .filter-form select:focus {
            border-color: #2563eb;
        }

        .total {
            background: #eff6ff;
            color: #2563eb;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
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
            letter-spacing: 0.7px;
            text-align: left;
            padding: 14px 23px;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 16px 23px;
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
            font-size: 12px;
        }

        .student-name {
            font-weight: 600;
            color: #0f172a;
        }

        .nis {
            color: #64748b;
            font-family: monospace;
            font-size: 13px;
        }

        .class-badge {
            display: inline-block;
            background: #eff6ff;
            color: #2563eb;
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .role {
            display: inline-block;
            background: #f0fdf4;
            color: #16a34a;
            padding: 5px 9px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 600;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #94a3b8;
            font-size: 14px;
        }

        /* RESPONSIVE */

        @media (max-width: 1000px) {

            .table-card {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
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

            .table-header {
                align-items: flex-start;
                gap: 12px;
                flex-direction: column;
            }

            .header-actions {
                width: 100%;
                justify-content: space-between;
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

                <div class="menu-icon">
                    ⌂
                </div>

                <span>
                    Dashboard
                </span>

            </a>


            <a href="/students" class="active">

                <div class="menu-icon">
                    👨‍🎓
                </div>

                <span>
                    Data Siswa
                </span>

            </a>


            <a href="/classes">

                <div class="menu-icon">
                    🏫
                </div>

                <span>
                    Data Kelas
                </span>

            </a>


            <a href="/attendance">

                <div class="menu-icon">
                    📋
                </div>

                <span>
                    Absensi
                </span>

            </a>


            <a href="/qr">

                <div class="menu-icon">
                    ▣
                </div>

                <span>
                    QR Code
                </span>

            </a>

        </nav>

    </aside>


    <!-- MAIN -->

    <main class="main">

        <!-- TOPBAR -->

        <div class="topbar">

            <div class="welcome">

                <h1>
                    Data Siswa 👨‍🎓
                </h1>

                <p>
                    Daftar siswa yang terdaftar dalam sistem absensi.
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


        <!-- DATA SISWA -->

        <div class="section-title">
            Daftar Siswa
        </div>


        <div class="table-card">

            <div class="table-header">

                <h2>
                    Data Siswa Terdaftar
                </h2>


                <div class="header-actions">

                    <!-- FILTER KELAS -->

                    <form
                        method="GET"
                        action="/students"
                        class="filter-form"
                    >

                        <select
                            name="class_id"
                            onchange="this.form.submit()"
                        >

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

                    </form>


                    <!-- JUMLAH SISWA -->

                    <div class="total">
                        {{ $students->count() }} Siswa
                    </div>

                </div>

            </div>


            @if ($students->count() > 0)

                <table>

                    <thead>

                        <tr>

                            <th>
                                No
                            </th>

                            <th>
                                NIS
                            </th>

                            <th>
                                Nama Siswa
                            </th>

                            <th>
                                Kelas
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Role
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($students as $student)

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
                                    {{ $student->user->email ?? '-' }}
                                </td>


                                <td>

                                    <span class="role">
                                        {{ $student->user->role ?? '-' }}
                                    </span>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="empty">
                    Belum ada data siswa untuk kelas ini.
                </div>

            @endif

        </div>

    </main>

</div>

</body>
</html>