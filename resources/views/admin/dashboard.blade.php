<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pusdiglah - Dashboard</title>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card bg-white border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="col-md-7">
                                    <div class="mb-2">
                                        <h3 class="fs-20 fw-semibold">Selamat Datang Kembali, {{ Auth::user()->name }} !
                                        </h3>
                                        <p style="line-height: 1.4;">Selamat datang di dashboard Perpustakaan Digital
                                            Sekolah</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div
                            class="card bg-primary bg-opacity-10 border-primary border-opacity-10 rounded-3 stats-box style-three border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-grow-1 me-3">
                                        <span class="d-block mb-1">Jumlah Buku</span>
                                        <h2 class="text-secondary fs-32">32</h2>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="material-symbols-outlined fs-2">book_2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div
                            class="card bg-secondary bg-opacity-10 border-secondary border-opacity-10 rounded-3 stats-box style-three border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-grow-1 me-3">
                                        <span class="d-block mb-1">Jumlah Siswa</span>
                                        <h2 class="text-secondary fs-32">32</h2>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="material-symbols-outlined fs-2">school</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div
                            class="card bg-info bg-opacity-10 border-info border-opacity-10 rounded-3 stats-box style-three border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-grow-1 me-3">
                                        <span class="d-block mb-1">Jumlah guru</span>
                                        <h2 class="text-secondary fs-32">32</h2>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="material-symbols-outlined fs-2">supervisor_account</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div
                            class="card bg-success bg-opacity-10  text-success border-secondary border-opacity-10 rounded-3 stats-box style-three border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-grow-1 me-3">
                                        <span class="d-block mb-1">Peminjaman Buku</span>
                                        <h2 class="text-secondary fs-32">12</h2>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="material-symbols-outlined fs-2">menu_book</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div
                            class="card bg-danger bg-opacity-10 text-danger border-secondary border-opacity-10 rounded-3 stats-box style-three border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-grow-1 me-3">
                                        <span class="d-block mb-1">Belum Dikembalikan</span>
                                        <h2 class="text-secondary fs-32">5</h2>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="material-symbols-outlined fs-2">event_busy</span>
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
                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
                                    <h3 class="mb-0">Daftar Peminjaman Terbaru</h3>
                                    <a href="/peminjaman" class="btn btn-primary">Lihat Semua Peminjaman</a>
                                </div>
                                <div class="default-table-area style-two all-products">
                                    <div class="table-responsive">
                                        <table class="table align-middle">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Judul Buku</th>
                                                    <th scope="col">Tanggal Pinjam</th>
                                                    <th scope="col">Tanggal Kembali</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-body">#JAN-158</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('assets/images/user-6.jpg') }}"
                                                                class="wh-40 rounded-3" alt="user">
                                                            <div class="ms-2 ps-1">
                                                                <h6 class="fw-medium fs-14 mb-0">Marcia Baker</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-secondary">Sampai Jadi Debu</td>
                                                    <td class="text-secondary">25 Jul 2025</td>
                                                    <td class="text-secondary">30 Jul 2025</td>
                                                    <td class="text-secondary">
                                                        <span
                                                            class="badge text-bg-info py-1 px-2 text-white rounded-1 fw-medium fs-12">Dipinjam</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <button
                                                                class="ps-0 border-0 bg-transparent lh-1 position-relative top-2"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Detail">
                                                                <i
                                                                    class="material-symbols-outlined fs-16 text-primary">visibility</i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-body">#JAN-159</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('assets/images/user-6.jpg') }}"
                                                                class="wh-40 rounded-3" alt="user">
                                                            <div class="ms-2 ps-1">
                                                                <h6 class="fw-medium fs-14 mb-0">Dhelani Baker</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-secondary">Aku Berlutut</td>
                                                    <td class="text-secondary">25 Jul 2025</td>
                                                    <td class="text-secondary">30 Jul 2025</td>
                                                    <td class="text-secondary">
                                                        <span
                                                            class="badge text-bg-danger py-1 px-2 text-white rounded-1 fw-medium fs-12">Tenggat
                                                            Pinjam</span>
                                                    </td>
                                                    <td>
                                                       <div class="d-flex align-items-center gap-1">
                                                            <button
                                                                class="ps-0 border-0 bg-transparent lh-1 position-relative top-2"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Detail">
                                                                <i
                                                                    class="material-symbols-outlined fs-16 text-primary">visibility</i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-body">#JAN-159</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{ asset('assets/images/user-6.jpg') }}"
                                                                class="wh-40 rounded-3" alt="user">
                                                            <div class="ms-2 ps-1">
                                                                <h6 class="fw-medium fs-14 mb-0">Dhelani Baker</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-secondary">Aku Berlutut</td>
                                                    <td class="text-secondary">25 Jul 2025</td>
                                                    <td class="text-secondary">30 Jul 2025</td>
                                                    <td class="text-secondary">
                                                        <span
                                                            class="badge text-bg-success py-1 px-2 text-white rounded-1 fw-medium fs-12">Selesai
                                                            Pinjam</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-1">
                                                            <button
                                                                class="ps-0 border-0 bg-transparent lh-1 position-relative top-2"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Detail">
                                                                <i
                                                                    class="material-symbols-outlined fs-16 text-primary">visibility</i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>

                                    <div
                                        class="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap p-4">
                                        <span class="fs-12 fw-medium">Showing 5 of 30 Results</span>
                                        <div class="d-flex align-items-center">
                                            <span class="fs-13 fw-medium me-2">1 - 10 of 12</span>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination mb-0 justify-content-center">
                                                    <li class="page-item">
                                                        <a class="page-link icon" href="users-list"
                                                            aria-label="Previous">
                                                            <i
                                                                class="material-symbols-outlined">keyboard_arrow_left</i>
                                                        </a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link icon" href="users-list"
                                                            aria-label="Next">
                                                            <i
                                                                class="material-symbols-outlined">keyboard_arrow_right</i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-white border-0 rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="mb-4">
                                        <h3 style="margin-bottom: -2px;">Book Class Terbanyak</h3>
                                    </div>

                                    <ul class="ps-0 mt-4 mb-0 list-unstyled">
                                        <li
                                            class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="material-symbols-outlined">auto_stories</span>
                                                <p class="text-secondary fw-medium ms-2">Ilmu Pengetahuan Umum</p>
                                            </div>
                                            <a href="/marketing" class="text-decoration-none">
                                                <p class="mb-0 fs-12 text-body">Jumlah Buku: 150</p>
                                            </a>
                                        </li>
                                        <li
                                            class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="material-symbols-outlined">auto_stories</span>
                                                <p class="text-secondary fw-medium ms-2">Ilmu Pengetahuan
                                                    Sosial</p>
                                            </div>
                                            <a href="/marketing" class="text-decoration-none">
                                                <p class="mb-0 fs-12 text-body">Jumlah Buku: 120</p>
                                            </a>
                                        </li>
                                        <li
                                            class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="material-symbols-outlined">auto_stories</span>
                                                <p class="text-secondary fw-medium ms-2">Matematika</p>
                                            </div>
                                            <a href="/marketing" class="text-decoration-none">
                                                <p class="mb-0 fs-12 text-body">Jumlah Buku: 100</p>
                                            </a>
                                        </li>
                                        <li
                                            class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="material-symbols-outlined">auto_stories</span>
                                                <p class="text-secondary fw-medium ms-2">Bahasa Indonesia</p>
                                            </div>
                                            <a href="/marketing" class="text-decoration-none">
                                                <p class="mb-0 fs-12 text-body">Jumlah Buku: 100</p>
                                            </a>
                                        </li>
                                        <li
                                            class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="material-symbols-outlined">auto_stories</span>
                                                <p class="text-secondary fw-medium ms-2">Bahasa Inggris</p>
                                            </div>
                                            <a href="/marketing" class="text-decoration-none">
                                                <p class="mb-0 fs-12 text-body">Jumlah Buku: 80</p>
                                            </a>
                                        </li>
                                        <li
                                            class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="material-symbols-outlined">auto_stories</span>
                                                <p class="text-secondary fw-medium ms-2">Agama</p>
                                            </div>
                                            <a href="/marketing" class="text-decoration-none">
                                                <p class="mb-0 fs-12 text-body">Jumlah Buku: 70</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="rounded-3 mb-4 for-dark" style="background-color: #DDE4FF;">
                                <div class="card bg-white border-0 rounded-3 mb-4">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
                                            <h4 class="mb-0 ">Statistik Pengunjung</h4>
                                            <div class="dropdown action-opt">
                                                <button class="btn bg-transparent p-0" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i data-feather="more-horizontal"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <i data-feather="clock"></i>
                                                            Today
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <i data-feather="pie-chart"></i>
                                                            Last 7 Days
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <i data-feather="rotate-cw"></i>
                                                            Last Month
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <i data-feather="calendar"></i>
                                                            Last 1 Year
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <i data-feather="bar-chart"></i>
                                                            All Time
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <i data-feather="eye"></i>
                                                            View
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:;">
                                                            <i data-feather="trash"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div style="margin: -25px -28px -16px -17px;">
                                            <div id="instagram_subscriber"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->


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
