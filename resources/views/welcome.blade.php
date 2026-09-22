<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Absensi Digital</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }

        .navbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: bold;
            color: #2563eb;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .nav-link {
            text-decoration: none;
            color: #475569;
            font-size: 14px;
        }

        .hero {
            min-height: calc(100vh - 70px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 7%;
        }

        .hero-content {
            max-width: 1100px;
            width: 100%;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 60px;
            align-items: center;
        }

        .badge {
            display: inline-block;
            background: #eff6ff;
            color: #2563eb;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 48px;
            line-height: 1.15;
            margin-bottom: 20px;
            color: #0f172a;
        }

        h1 span {
            color: #2563eb;
        }

        .description {
            font-size: 17px;
            line-height: 1.7;
            color: #64748b;
            max-width: 580px;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            text-decoration: none;
            padding: 13px 22px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: white;
            color: #2563eb;
            border: 1px solid #dbeafe;
        }

        .btn-secondary:hover {
            background: #eff6ff;
        }

        .illustration {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(15, 23, 42, 0.08);
        }

        .qr-card {
            background: #eff6ff;
            border-radius: 18px;
            padding: 30px;
            text-align: center;
        }

        .qr-icon {
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
            background: white;
            border: 8px solid white;
            border-radius: 14px;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 5px;
            padding: 10px;
        }

        .qr-icon span {
            background: #0f172a;
            border-radius: 2px;
        }

        .qr-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .qr-text {
            color: #64748b;
            font-size: 14px;
        }

        .features {
            display: flex;
            gap: 25px;
            margin-top: 35px;
            flex-wrap: wrap;
        }

        .feature {
            color: #64748b;
            font-size: 14px;
        }

        .feature strong {
            color: #0f172a;
            display: block;
            margin-bottom: 4px;
        }

        @media (max-width: 800px) {
            .hero-content {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 38px;
            }

            .illustration {
                max-width: 450px;
                margin: auto;
            }
        }

        @media (max-width: 500px) {
            .navbar {
                padding: 0 5%;
            }

            .hero {
                padding: 40px 5%;
            }

            h1 {
                font-size: 32px;
            }

            .nav-link {
                display: none;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <div class="logo-icon">✓</div>
            Absensi Digital
        </div>

        <a href="/dashboard" class="nav-link">
            Dashboard →
        </a>
    </nav>

    <section class="hero">
        <div class="hero-content">

            <div>
                <div class="badge">
                    SISTEM ABSENSI SEKOLAH
                </div>

                <h1>
                    Absensi lebih <span>mudah</span> dan teratur.
                </h1>

                <p class="description">
                    Sistem absensi digital berbasis QR Code untuk membantu
                    sekolah mencatat kehadiran siswa dengan lebih cepat,
                    praktis, dan terorganisir.
                </p>

                <div class="buttons">
                    <a href="/dashboard" class="btn btn-primary">
                        Buka Dashboard
                    </a>

                    <a href="/qr" class="btn btn-secondary">
                        Kelola QR Code
                    </a>
                </div>

                <div class="features">
                    <div class="feature">
                        <strong>QR Code</strong>
                        Absensi cepat
                    </div>

                    <div class="feature">
                        <strong>Data Siswa</strong>
                        Terorganisir
                    </div>

                    <div class="feature">
                        <strong>Monitoring</strong>
                        Lebih mudah
                    </div>
                </div>
            </div>

            <div class="illustration">
                <div class="qr-card">

                    <div class="qr-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>

                        <span></span>
                        <span style="background:white"></span>
                        <span></span>
                        <span style="background:white"></span>
                        <span></span>

                        <span></span>
                        <span></span>
                        <span style="background:white"></span>
                        <span></span>
                        <span></span>

                        <span></span>
                        <span style="background:white"></span>
                        <span></span>
                        <span></span>
                        <span style="background:white"></span>

                        <span></span>
                        <span></span>
                        <span></span>
                        <span style="background:white"></span>
                        <span></span>
                    </div>

                    <div class="qr-title">
                        Scan QR Code
                    </div>

                    <div class="qr-text">
                        Proses absensi menjadi lebih praktis
                    </div>

                </div>
            </div>

        </div>
    </section>

</body>
</html>