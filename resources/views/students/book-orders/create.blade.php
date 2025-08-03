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

                <div class="card bg-white border-0 rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="d-sm-flex justify-content-between align-items-center flex-wrap gap-2">
                            <h4 class="fs-16 fw-medium mb-2 mb-sm-0">Filter</h4>

                            <form class="default-src-form">
                                <div class="d-sm-flex flex-wrap gap-3">
                                    <div class="position-relative mb-2 mb-sm-0">
                                        <input type="text" class="form-control rounded-1" placeholder="Search here">
                                        <i
                                            class="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y fs-18">search</i>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($books as $book)
                        <div class="col-lg-4 col-sm-6">
                            <div class="card bg-white border-0 rounded-3 mb-4 p-4">
                                <div class="mb-4 transition-y">
                                    <div class="position-relative mb-3">
                                        <img src="{{ asset('storage/' . $book->img_books) }}" alt="{{ $book->title }}"
                                            class="rounded-3 w-100 object-fit-cover" style="height: 250px;">
                                        @if ($book->qty_books > 0)
                                            <button type="button"
                                                class="card bg-white pt-2 ps-2 rounded-3 rounded-bottom-0 rounded-end-0 border-0 position-absolute bottom-0 end-0 m-0"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal4-{{ $book->id }}">
                                                <i
                                                    class="material-symbols-outlined wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-24">
                                                    add
                                                </i>
                                            </button>
                                        @endif
                                    </div>

                                    <h3 class="text-secondary fs-16 fw-semibold mb-2">{{ $book->title }}</h3>
                                    <p class="mb-3">{{ $book->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p>
                                            Author: <span class="text-secondary">{{ $book->author }}</span>
                                        </p>
                                        <h4 class="fs-14 fw-medium mb-0">Jumlah Buku: {{ $book->qty_books }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal4-{{ $book->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel-{{ $book->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <form action="{{ route('student.book-orders.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_books" value="{{ $book->id }}">

                                    <div class="modal-content rounded-3 shadow border-0">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalLabel-{{ $book->id }}">Ajukan
                                                Peminjaman Buku</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="fs-16 fw-semibold mb-2 text-secondary">
                                                Judul Buku
                                            </h5>
                                            <h6 class="fw-bold mb-2 text-primary">{{ $book->title }}</h6>
                                            <p class="text-muted small mb-3">{{ Str::limit($book->description, 100) }}
                                            </p>
                                            <hr class="my-3">

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="order_date_{{ $book->id }}"
                                                        class="form-label">Tanggal Peminjaman</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="material-symbols-outlined">event</i>
                                                        </span>
                                                        <input type="date" name="order_date"
                                                            id="order_date_{{ $book->id }}" class="form-control"
                                                            value="{{ now()->toDateString() }}"
                                                            min="{{ now()->toDateString() }}" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="return_date_{{ $book->id }}"
                                                        class="form-label">Tanggal Pengembalian</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="material-symbols-outlined">event_repeat</i>
                                                        </span>
                                                        <input type="date" name="return_date"
                                                            id="return_date_{{ $book->id }}" class="form-control"
                                                            value="{{ now()->addDays(7)->toDateString() }}"
                                                            min="{{ now()->addDays(1)->toDateString() }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger text-white"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary text-white">Ajukan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    @include('partials.footer')
    @include('partials.theme_settings')
    @include('partials.scripts')
</body>

</html>
