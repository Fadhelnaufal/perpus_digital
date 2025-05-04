<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Book</title>
</head>

<body>

    <h1>Add Books</h1>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <label for="id_books">Id Book</label>
        <input type="text" name="id_books" id="id_books" required>
        <br>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="author">Author</label>
        <input type="text" name="author" id="author" required>
        <br>
        <label for="description">Description</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <label for="pages">Pages:</label>
        <input type="text" name="pages" id="pages" required>
        <br>
        <label for="publisher">Publisher</label>
        <input type="text" name="publisher" id="publisher" required>
        <br>
        <label for="year_publish">Year Publish</label>
        <input type="text" name="year_publish" id="year_publish" min="1900" max="2099" step="1"
            value="2016" required>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" required>
        <br>

        <!-- Book Category -->
        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <option value="">-- Select a Book Class --</option>
            @foreach ($bookClasses as $class)
                <option value="{{ $class->id_books_classes }}">{{ $class->name }}</option>
            @endforeach
        </select>
        <br>

        <!-- Book Shelf -->
        <label for="bookshelf">Book Shelf:</label>
        <select name="bookshelf" id="bookshelf" required>
            <option value="">-- Select a Book Shelf --</option>
            @foreach ($bookShelfs as $shelf)  <!-- Use $bookShelfs here -->
        <option value="{{ $shelf->id_bookshelf }}">{{ $shelf->name }}</option>
    @endforeach
        </select>
        <input type="hidden" name="book_class_id" id="book_class_id" value="">
        <br>

        <!-- Book Image -->
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept="image/*" required>
        <br>
        <button type="submit">Add Book</button>
    </form>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

</body>

</html>
