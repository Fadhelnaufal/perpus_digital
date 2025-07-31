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
                <div class="row">
                    <div class="col-xxl col-lg">
                        <div class="card bg-white border-0 rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <h3 class="fs-20 fw-semibold">Tambah Book Class</h3>
                                    <p style="line-height: 1.4;">Silakan isi form berikut untuk menambahkan buku baru.
                                    </p>
                                </div>
                                <form action="{{ route('admin.books-classes.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Id Book</label>
                                                <input type="text" class="form-control h-55" name="id_books_classes" id="title"
                                                    placeholder="Enter Id Book">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Class Name</label>
                                                <input type="text" class="form-control h-55" name="name" id="title"
                                                    placeholder="Enter Class Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-flex flex-wrap gap-3">
                                                <button
                                                    class="btn btn-danger py-2 px-4 fw-medium fs-16 text-white">Cancel</button>
                                                <button class="btn btn-primary py-2 px-4 fw-medium fs-16"> <i
                                                        class="ri-add-line text-white fw-medium"></i> Create
                                                    Product</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
