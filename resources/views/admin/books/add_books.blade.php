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
                <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-xxl-8 col-lg-7">
                            <div class="card bg-white border-0 rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="mb-4">
                                        <h3 class="fs-20 fw-semibold">Tambah Buku</h3>
                                        <p>Silakan isi form berikut untuk menambahkan buku baru.</p>
                                    </div>

                                    <div class="row">
                                      

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Title</label>
                                                <input type="text" class="form-control h-55" name="title" required
                                                    placeholder="Enter Title">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Author</label>
                                                <input type="text" class="form-control h-55" name="author" required
                                                    placeholder="Enter Author">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Description</label>
                                                <textarea name="description" class="form-control h-55" rows="3" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Pages</label>
                                                <input type="number" class="form-control h-55" name="pages" required
                                                    placeholder="Enter Pages">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Publisher</label>
                                                <input type="text" class="form-control h-55" name="publisher"
                                                    required placeholder="Enter Publisher">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Quantity</label>
                                                <input type="number" class="form-control h-55" name="quantity" required
                                                    placeholder="Enter Quantity">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Year Publish</label>
                                                <input type="number" class="form-control h-55" name="year_publish"
                                                    required placeholder="Enter Year" min="1900" max="2099">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Upload Cover Image</label>
                                                <div
                                                    class="form-control h-100 text-center position-relative p-4 p-lg-5">
                                                    <div class="product-upload">
                                                        <label for="file-upload" class="file-upload mb-0">
                                                            <i
                                                                class="ri-folder-image-line bg-primary bg-opacity-10 p-2 rounded-1 text-primary"></i>
                                                            <span class="d-block text-body fs-14">
                                                                Drag and drop an image or
                                                                <span
                                                                    class="text-primary text-decoration-underline">Browse</span>
                                                            </span>
                                                        </label>
                                                        <input id="file-upload" type="file" name="image"
                                                            accept="image/*" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Submit -->
                                        <div class="col-lg-12">
                                            <div class="d-flex flex-wrap gap-3 justify-content-end">
                                                <a href="{{ route('admin.books.index') }}"
                                                    class="btn btn-danger py-2 px-4 fw-medium fs-16 text-white">Cancel</a>
                                                <button type="submit"
                                                    class="btn btn-primary py-2 px-4 fw-medium fs-16">
                                                    <i class="ri-add-line text-white fw-medium"></i> Create Book
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-xxl-4 col-lg-5">
                            <div class="card bg-white border-0 rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <h3 class="mb-3 mb-lg-4">Book Category & Shelf</h3>

                                    <div class="form-group mb-4">
                                        <label class="label text-secondary">Category</label>
                                        <select name="category" id="category" required
                                            class="form-select form-control h-55">
                                            <option value="">-- Select a Book Class --</option>
                                            @foreach ($bookClasses as $class)
                                                <option value="{{ $class->id_books_classes }}">{{ $class->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="label text-secondary">Book Shelf</label>
                                        <select name="bookshelf" required class="form-select form-control h-55">
                                            <option value="">-- Select a Book Shelf --</option>
                                            @foreach ($bookShelfs as $shelf)
                                                <option value="{{ $shelf->id_bookshelf }}">{{ $shelf->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>

            <div class="flex-grow-1"></div>
            @include('partials.footer')
        </div>
    </div>

    @include('partials.theme_settings')
    @include('partials.scripts')
    <script>
        const categorySelect = document.getElementById('category');
        const bookshelfSelect = document.querySelector('select[name="bookshelf"]');
        const idBooksInput = document.getElementById('id_books');

        function generateId() {
            const categoryId = categorySelect.value;
            const shelfId = bookshelfSelect.value;

            if (!categoryId || !shelfId) {
                idBooksInput.value = '';
                return;
            }

            fetch(`/admin/books/generate-id/${categoryId}/${shelfId}`)
                .then(response => response.json())
                .then(data => {
                    idBooksInput.value = data.new_id;
                })
                .catch(error => {
                    console.error('Gagal generate ID:', error);
                });
        }

        categorySelect.addEventListener('change', generateId);
        bookshelfSelect.addEventListener('change', generateId);
    </script>
</body>

</html>
