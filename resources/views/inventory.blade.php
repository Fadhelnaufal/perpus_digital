<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory</title>
</head>
<body>
    <h1>Inventory</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Pages</th>
                <th>Publisher</th>
                <th>Year Published</th>
                <th>Quantity</th>
                <th>Shelf</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->id }}</td>
                    <td>{{ $inventory->book->title_books ?? 'No Book' }}</td>
                    <td>{{ $inventory->book->author ?? 'No Author' }}</td>
                    <td>{{ $inventory->book->description ?? 'No Description' }}</td>
                    <td>{{ $inventory->book->pages ?? 'No Pages' }}</td>
                    <td>{{ $inventory->book->publisher ?? 'No Publisher' }}</td>
                    <td>{{ $inventory->book->year_published ?? 'No Year' }}</td>
                    <td>{{ $inventory->qty_books }}</td>
                    <td>{{ $inventory->shelf->name ?? 'No Shelf' }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</body>
</html>
