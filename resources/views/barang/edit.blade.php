<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .cke {
            visibility: hidden;
        }

        /* CSS untuk menyesuaikan ukuran gambar */
        .gambar-barang {
            max-width: 200px;
            height: auto;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Gambar</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" placeholder="Masukkan Nama Gambar">
                            </div>
                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Upload Gambar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*" onchange="updateFileName()">
                                    <label class="custom-file-label" for="gambar" id="customFileLabel">Pilih dan Upload Gambar</label>
                                </div>
                                @if ($barang->gambar)
                                    <img src="{{ asset('storage/posts/' . $barang->gambar) }}" alt="Gambar Lama" class="img-fluid mt-2 gambar-barang">
                                @endif
                            </div>

                            <div class="d-flex justify-content-end mb-4">
                                <button type="submit" class="btn btn-md btn-primary mx-1">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning mx-1">RESET</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        // Use the appropriate ID for the file input in the function
        function updateFileName() {
            var fileName = $('#gambar')[0].files[0].name;
            $('#customFileLabel').text(fileName);
        }
    </script>
</body>

</html>
