<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        .cke {
            visibility: hidden;
        }
        /* Custom Dropdown CSS */
        .custom-dropdown {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .selected-option {
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .dropdown-list {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ced4da;
            border-top: none;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            list-style: none;
            margin: 0;
            padding: 0;
            width: 100%;
            z-index: 1;
        }

        .dropdown-list li {
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }

        .dropdown-list li:hover {
            background-color: #f8f9fa;
        }

        .custom-dropdown img {
            max-width: 20px;
            max-height: 20px;
            margin-right: 5px;
            vertical-align: middle;
        }
    </style>
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="/peminjaman/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <select class="form-control " name="id_siswa" id="namaDropdown">
                                    <option value="">Select Nama Siswa</option>
                                    @foreach($data as $siswa)
                                        <option value="{{ $siswa->id }}">{{ $siswa->nama }} ({{$siswa->kelas}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Pilih Barang</label>
                                <div class="custom-dropdown">
                                    <div class="selected-option">Pilih Barang</div>
                                    <ul class="dropdown-list">
                                        @foreach ($data2 as $barang)
                                            <li data-value="{{ $barang->id }}">
                                                <img src="{{ Storage::url('public/posts/') . $barang->gambar }}" class="rounded">
                                                {{ $barang->nama_barang }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <input type="hidden" name="id_barang" id="selected-gambar">
                            </div>
                            <label class="font-weight-bold">Tanggal Pinjam</label>
                            <div class="form-group">
                                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam">
                            </div>
                            <div class="d-flex justify-content-end ">
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
    <!-- Add Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <style>
        .custom-dropdown {
            position: relative;
            display: inline-block;
            width: 100%;
            /* Sesuaikan lebar dengan form-group */
        }

        .selected-option {
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            /* Sesuaikan lebar dengan form-group */
        }

        .dropdown-list {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ced4da;
            border-top: none;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px;
            list-style: none;
            margin: 0;
            padding: 0;
            width: 100%;
            /* Sesuaikan lebar dengan form-group */
            z-index: 1;
        }

        .dropdown-list li {
            padding: 10px;
            cursor: pointer;
            width: 100%;
            /* Sesuaikan lebar dengan form-group */
        }

        .dropdown-list li:hover {
            background-color: #f8f9fa;
        }
    </style>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const customDropdown = document.querySelector('.custom-dropdown');
            const selectedOption = document.querySelector('.selected-option');
            const dropdownList = document.querySelector('.dropdown-list');
            const hiddenInput = document.getElementById('selected-gambar');

            customDropdown.addEventListener('click', function() {
                dropdownList.style.display = dropdownList.style.display === 'none' ? 'block' : 'none';
            });

            dropdownList.addEventListener('click', function(event) {
                if (event.target.tagName === 'LI') {
                    selectedOption.textContent = event.target.textContent;
                    hiddenInput.value = event.target.getAttribute('data-value');
                    dropdownList.style.display = 'none';
                }
            });

            document.addEventListener('click', function(event) {
                if (!customDropdown.contains(event.target)) {
                    dropdownList.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
