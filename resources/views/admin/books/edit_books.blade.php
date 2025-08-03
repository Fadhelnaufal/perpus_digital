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
                <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-xxl-8 col-lg-7">
                            <div class="card bg-white border-0 rounded-3 mb-4">
                                <div class="card-body p-4">
                                    <div class="mb-4">
                                        <h3 class="fs-20 fw-semibold">Edit Buku</h3>
                                        <p>Silakan isi form berikut untuk mengedit buku.</p>
                                    </div>

                                    <div class="row">


                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Title</label>
                                                <input type="text" class="form-control h-55" name="title" required
                                                    placeholder="Enter Title" value="{{ $book->title_books }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Author</label>
                                                <input type="text" class="form-control h-55" name="author" required
                                                    placeholder="Enter Author" value="{{ $book->author }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Description</label>
                                                <textarea name="description" class="form-control h-55" rows="3" required>{{ $book->description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Pages</label>
                                                <input type="number" class="form-control h-55" name="pages" required
                                                    placeholder="Enter Pages" value="{{ $book->pages }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Publisher</label>
                                                <input type="text" class="form-control h-55" name="publisher"
                                                    required placeholder="Enter Publisher"
                                                    value="{{ $book->publisher }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Quantity</label>
                                                <input type="number" class="form-control h-55" name="quantity" required
                                                    placeholder="Enter Quantity" value="{{ $book->qty_books }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group mb-4">
                                                <label class="label text-secondary">Year Publish</label>
                                                <input type="number" class="form-control h-55" name="year_publish"
                                                    required placeholder="Enter Year" min="1900" max="2099"
                                                    value="{{ $book->year_published }}">
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
                                                            accept="image/*">
                                                    </div>
                                                </div>
                                                @if ($book->img_books)
                                                    <div class="mt-3">
                                                        <small class="text-muted">Current Image:</small><br>
                                                        <img src="{{ asset('storage/' . $book->img_books) }}"
                                                            alt="Current Book Image" class="img-fluid rounded-3"
                                                            style="max-width: 200px; max-height: 200px;">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Submit -->
                                        <div class="col-lg-12">
                                            <div class="d-flex flex-wrap gap-3 justify-content-end">
                                                <a href="{{ route('admin.books.index') }}"
                                                    class="btn btn-danger py-2 px-4 fw-medium fs-16 text-white">Cancel</a>
                                                <button type="submit"
                                                    class="btn btn-primary py-2 px-4 fw-medium fs-16">
                                                    <i class="ri-add-line text-white fw-medium"></i> Update Book
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

                                    {{-- Category --}}
                                    <div class="form-group mb-4">
                                        <label class="label text-secondary">Category</label>
                                        <select name="category" id="category" required class="form-control">
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach ($bookClasses as $class)
                                                <option value="{{ $class->id }}">{{ $class->code }} -
                                                    {{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Shelf --}}
                                    <div class="form-group mb-4">
                                        <label class="label text-secondary">Book Shelf</label>
                                        <select name="bookshelf" required class="form-select form-control h-55">
                                            <option value="">-- Select a Book Shelf --</option>
                                            @foreach ($bookShelfs as $shelf)
                                                <option value="{{ $shelf->id_bookshelf }}"
                                                    {{ $shelf->id_bookshelf == $book->id_bookshelf ? 'selected' : '' }}>
                                                    {{ $shelf->name }}
                                                </option>
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
        const idBooksInput = document.getElementById('code_books');

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
