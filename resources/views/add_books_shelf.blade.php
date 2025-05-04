<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Books shelf</title>
</head>
<body>

    <h1>Add Books Shelf</h1>
    <form action="{{ route('books-shelf.store') }}" method="POST">
        @csrf
        <label for="title">ID Books Shelf</label>
        <input type="text" name="id_bookshelf" id="title" required>
        <br>
        <label for="title">name</label>
        <input type="text" name="name" id="title" required>
        <br>

        <button type="submit">Add Book Shelf</button>
    </form>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
</body>
</html>
