<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pusdiglah | Perpustakaan Digital Sekolah</title>
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
                                        <h3 class="fs-20 fw-semibold">Peminjaman Buku</h3>
                                        <p style="line-height: 1.4;">Silahkan pilih buku yang ingin dipinjam.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div class="card bg-white border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                                    <h3 class="mb-0">Daftar Riwayat Peminjaman Buku</h3>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ route('student.book-orders.create') }}" class="btn btn-primary">
                                            <i class="material-symbols-outlined align-middle">add</i> Pinjam Buku
                                        </a>
                                    </div>
                                </div>
                                <div class="default-table-area all-products">
                                    <div class="table-responsive">
                                        <table class="table align-middle " id="myTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID Buku</th>
                                                    <th scope="col">Nama Buku</th>
                                                    <th scope="col">Penerbit</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Tanggal Pinjam</th>
                                                    <th scope="col">Tanggal Kembali</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Denda</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td class="text-body">IPA0001</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{asset('assets/images/app.png') }}"
                                                                class="wh-40 rounded-3" alt="book image">
                                                            <div class="ms-2 ps-1">
                                                                <h6 class="fw-medium fs-14 mb-0">
                                                                    Judul Buku</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-secondary">Nama Penerbit</td>
                                                    <td class="text-secondary">1</td>
                                                    <td class="text-secondary">Tanggal Pinjam</td>
                                                    <td class="text-secondary">Tanggal Kembali</td>
                                                    <td class="text-secondary">
                                                        <span class="badge text-bg-warning py-1 px-2 text-white rounded-4 fw-medium fs-12">Menunggu</span>
                                                    </td>
                                                    <td class="text-secondary">Denda</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <button
                                                                class="ps-0 border-0 bg-transparent lh-1 position-relative top-2"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="View">
                                                                <i
                                                                    class="material-symbols-outlined fs-16 text-primary">visibility</i>
                                                            </button>
                                                            <button
                                                                class="ps-0 border-0 bg-transparent lh-1 position-relative top-2"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Edit" onclick="location.href=">
                                                                <i
                                                                    class="material-symbols-outlined fs-16 text-body">edit</i>
                                                            </button>
                                                            <button
                                                                class="ps-0 border-0 bg-transparent lh-1 position-relative top-2"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Delete">
                                                                <i
                                                                    class="material-symbols-outlined fs-16 text-danger">delete</i>
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
