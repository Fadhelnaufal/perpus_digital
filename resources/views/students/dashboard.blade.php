<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pusdiglah | Perpustakaan Digital Sekolah</title>
    <!-- Styles -->
    @include('partials.styles')
</head>

<body class="boxed-size">
    @include('partials.preloader')
    @include('partials.sidebar')

    <div class="container-fluid">
        <div class="main-content d-flex flex-column">
            <!-- Start Header Area -->
            @include('partials.header')
            <!-- End Header Area -->

            <div class="main-content-container overflow-hidden">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="card bg-white border-0 rounded-3 p-4">
                            <h3 class="fs-20 fw-semibold">Selamat Datang Kembali, {{ Auth::user()->name }}!</h3>
                            <p>Selamat datang di Dashboard Perpustakaan Digital Sekolah.</p>
                        </div>
                    </div>
                </div>

                <!-- Ringkasan Info -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card bg-white border-0 rounded-3 p-4">
                            <h6 class="">Total Buku Dipinjam</h6>
                            <h2 class="fw-bold">3</h2>
                            <p class="text-success small mt-1">📚 Aktif</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-white border-0 rounded-3 p-4">
                            <h6 class="">Buku Terlambat</h6>
                            <h2 class="fw-bold text-danger">1</h2>
                            <p class="text-danger small mt-1">⚠️ Harap segera dikembalikan</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-white border-0 rounded-3 p-4">
                            <h6 class="">Total Buku Pernah Dipinjam</h6>
                            <h2 class="fw-bold">12</h2>
                            <p class="text-muted small mt-1">📖 Riwayat lengkap</p>
                        </div>
                    </div>
                </div>


                <!-- Daftar Buku -->
                <div class="row">
                    <div class="col-lg">
                        <div class="card bg-white border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                                    <h3 class="mb-0">Daftar Buku</h3>
                                </div>
                                <div class="default-table-area all-products">
                                    <div class="table-responsive">
                                        <table class="table align-middle " id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>Judul Buku</th>
                                                    <th>Tanggal Pinjam</th>
                                                    <th>Jatuh Tempo</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Harry Potter</td>
                                                    <td>2022-01-01</td>
                                                    <td>2022-01-01</td>
                                                    <td><span class="badge bg-danger">Terlambat</span></td>
                                                </tr>
                                                <tr>
                                                    <td>The Hobbit</td>
                                                    <td>2022-01-05</td>
                                                    <td>2022-01-15</td>
                                                    <td><span class="badge bg-primary">Aktif</span></td>
                                                </tr>
                                                <tr>
                                                    <td>1984</td>
                                                    <td>2022-01-10</td>
                                                    <td>2022-01-20</td>
                                                    <td><span class="badge bg-success">Dikembalikan</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Rekomendasi Buku --}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card bg-white border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <h3 class="mb-4">Rekomendasi Buku</h3>
                                <div class="row g-3 d-flex ">
                                    <div class="col-md-4">
                                        <div class="card bg-white border-white. rounded-3 mb-4 shadow-md">
                                            <div class="card-body p-4">
                                                <img src="{{ asset('assets/images/card-1.jpg') }}"
                                                    class="mb-4 rounded-3" alt="card">
                                                <h3 class="mb-3 fs-16 fw-semibold">Nesta Technologies</h3>
                                                <p class="mb-20">When you enter into any new area of science, you
                                                    almost always find.</p>
                                                <a href="#"
                                                    class="btn btn-primary py-2 px-4 bg-primary bg-opacity-10 fw-semibold text-primary border-0 hover-bg">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-white border-white. rounded-3 mb-4 shadow-md">
                                            <div class="card-body p-4">
                                                <img src="{{ asset('assets/images/card-1.jpg') }}"
                                                    class="mb-4 rounded-3" alt="card">
                                                <h3 class="mb-3 fs-16 fw-semibold">Nesta Technologies</h3>
                                                <p class="mb-20">When you enter into any new area of science, you
                                                    almost always find.</p>
                                                <a href="#"
                                                    class="btn btn-primary py-2 px-4 bg-primary bg-opacity-10 fw-semibold text-primary border-0 hover-bg">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-white border-white. rounded-3 mb-4 shadow-md">
                                            <div class="card-body p-4">
                                                <img src="{{ asset('assets/images/card-1.jpg') }}"
                                                    class="mb-4 rounded-3" alt="card">
                                                <h3 class="mb-3 fs-16 fw-semibold">Nesta Technologies</h3>
                                                <p class="mb-20">When you enter into any new area of science, you
                                                    almost always find.</p>
                                                <a href="#"
                                                    class="btn btn-primary py-2 px-4 bg-primary bg-opacity-10 fw-semibold text-primary border-0 hover-bg">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="flex-grow-1"></div>

            <!-- Start Footer Area -->
            @include('partials.footer')
            <!-- End Footer Area -->
        </div>
    </div>


    @include('partials.theme_settings')
    @include('partials.scripts')
</body>

</html>
