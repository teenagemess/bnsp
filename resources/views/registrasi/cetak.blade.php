<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f7;
            font-family: 'Inter', sans-serif;
            color: #333;
        }
        .card {
            margin: 50px auto;
            max-width: 500px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .card-header {
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            color: #ffffff;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .card-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }
        .card-body {
            padding: 20px 30px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e5e5e5;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-row span {
            font-size: 0.95rem;
            font-weight: 500;
        }
        .info-row span.label {
            color: #555;
        }
        .btn-modern {
            display: inline-block;
            padding: 10px 20px;
            background: #4f46e5;
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-modern:hover {
            background: #3b82f6;
            text-decoration: none;
        }
        .btn-secondary {
            color: #333;
            background-color: #f5f5f7;
            border: 1px solid #ddd;
        }
        .btn-secondary:hover {
            background-color: #e5e5e7;
        }
        .text-center {
            text-align: center;
        }


    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Cetak Pendaftaran</h2>
            </div>
            <div class="card-body">
                <h4 class="mb-4 text-center">ID Pendaftaran Anda</h4>
                <h1 class="mb-4 text-center" style="font-size: 2.5rem; font-weight: 600;">{{ $registrasi->id }}</h1>
                <div class="info-row">
                    <span class="label">Nama:</span>
                    <span>{{ $registrasi->nama }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Email:</span>
                    <span>{{ $registrasi->email }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Alamat:</span>
                    <span>{{ $registrasi->alamat }}</span>
                </div>
                {{-- <div class="info-row">
                    <span class="label">Agama:</span>
                    <span>{{ $registrasi->agama }}</span>
                </div> --}}
                <div class="info-row">
                    <span class="label">Nomor HP:</span>
                    <span>{{ $registrasi->no_hp }}</span>
                </div>
                {{-- <div class="info-row">
                    <span class="label">Tanggal Lahir:</span>
                    <span>{{ $registrasi->tgl_lahir }}</span>
                </div> --}}
                <div class="mt-4 text-center">
                    <button onclick="window.print()" class="btn-modern no-print">Cetak</button>
                    <a href="/registrasi" class="btn btn-secondary ms-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ZPQjGkwytW1nYJc9puM6HqTAdRa1ZGr8YrOK8A6E8HgFTe1JfRXDw/2KDP0mStbI"
            crossorigin="anonymous"></script>
</body>
</html>
