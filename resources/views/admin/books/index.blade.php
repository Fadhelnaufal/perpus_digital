<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusdiglah - Dashboard</title>
    @include('partials.styles')
</head>

<body class="boxed-size">
    @include('partials.preloader')
    @include('partials.sidebar')

    <div class="container-fluid">
        <div class="main-content d-flex flex-column">
            @include('partials.header')

            <div class="main-content-container overflow-hidden">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card bg-white border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="col-md-7">
                                    <div class="mb-2">
                                        <h3 class="fs-20 fw-semibold">Kelolahan Buku</h3>
                                        <p style="line-height: 1.4;">Silakan kelola buku sesuai kebutuhan anda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success mx-3">{{ session('success') }}</div>
                @endif

                <div class="row">
                    <div class="col-lg">
                         <div class="card bg-white border-0 rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                                <h3 class="mb-0">Daftar Buku</h3>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="{{ route('admin.books.create') }}" class="btn btn-primary">
                                        <i class="material-symbols-outlined align-middle">add</i> Tambah Buku
                                    </a>
                                    <button class="btn btn-secondary" id="exportButton">
                                        <i class="material-symbols-outlined align-middle">download</i> Ekspor
                                    </button>
                                </div>
                            </div>
                            <div class="default-table-area all-products">
                                <div class="table-responsive">
                                    <table class="table align-middle " id="myTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID Buku</th>
                                                <th scope="col">Nama Buku</th>
                                                <th scope="col">Penulis</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Jumlah Halaman</th>
                                                <th scope="col">Penerbit</th>
                                                <th scope="col">Tahun Terbit</th>
                                                <th scope="col">Jumlah Buku</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-body">#IPA0001</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/images/user-6.jpg') }}" class="wh-40 rounded-3" alt="user">
                                                        <div class="ms-2 ps-1">
                                                            <h6 class="fw-medium fs-14 mb-0">Pembelajaran Fotosintesis</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-secondary">Marcia Baker</td>
                                                <td class="text-secondary">Pembelajaran Fotosintesis</td>
                                                <td class="text-secondary">50</td>
                                                <td class="text-secondary">Airlangga</td>
                                                <td class="text-secondary">2024</td>
                                                <td class="text-secondary">56</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <button class="ps-0 border-0 bg-transparent lh-1 position-relative top-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View">
                                                            <i class="material-symbols-outlined fs-16 text-primary">visibility</i>
                                                        </button>
                                                        <button class="ps-0 border-0 bg-transparent lh-1 position-relative top-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                                            <i class="material-symbols-outlined fs-16 text-body">edit</i>
                                                        </button>
                                                        <button class="ps-0 border-0 bg-transparent lh-1 position-relative top-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">
                                                            <i class="material-symbols-outlined fs-16 text-danger">delete</i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('partials.footer')
    @include('partials.theme_settings')
    @include('partials.scripts')


</body>

</html>
