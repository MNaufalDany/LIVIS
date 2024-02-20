<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Peminjaman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            padding-top: 50px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            color: #333;
        }
        .card-body {
            padding: 30px;
        }
        .gambar-barang {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
            max-height: 300px;
        }
        .btn-back,
        .btn-edit,
        .btn-delete {
            margin-top: 10px;
            margin-right: 10px;
            width: 100%;
        }
        .btn-confirm-delete {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
            transition: background-color 0.3s;
            width: 100%;
        }
        .btn-confirm-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Detail Peminjaman</h2>
                        <p><strong>Nama Barang:</strong> {{ $peminjaman->barang->nama_barang }}</p>
                        <img src="{{ Storage::url('public/posts/' . $peminjaman->barang->gambar) }}" alt="Gambar Barang" class="img-fluid gambar-barang">
                        <p><strong>Tanggal Pinjam:</strong> {{ $peminjaman->tgl_pinjam }}</p>
                        <p><strong>Tanggal Kembali:</strong> {{ $peminjaman->tgl_kembali }}</p>
                        <p><strong>Kondisi:</strong> {{ $peminjaman->kondisi }}</p>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ url()->previous() }}" class="btn btn-back">Kembali</a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-primary btn-edit">Edit</a>
                            </div>
                            <div class="col-md-4">
                                <button onclick="confirmDelete()" class="btn btn-danger btn-delete">Delete</button>
                                <form id="delete-form" action="{{ route('peminjaman.delete', $peminjaman->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function confirmDelete() {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                event.preventDefault();
                document.getElementById('delete-form').submit();
            }
        }
    </script>
</body>
</html>
