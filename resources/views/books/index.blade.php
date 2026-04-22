<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="{{ asset('css/bookdesign.css') }}">
</head>

<body>

    <div class="navbar">Book Management</div>

    <div class="wrapper">
        <div class="section-layout">

            <!-- Left Side -->
            <div class="left-side">

                <!-- Form Container -->
                <div class="container form-container">
                    <h1>Books</h1>
                    <form action="/books" method="POST" class="add-book-form">
                        @csrf
                        <div class="form-group">
                            <label>Book Name:</label>
                            <input type="text" name="bookname" placeholder="Book Name">
                        </div>
                        <div class="form-group">
                            <label>Author:</label>
                            <input type="text" name="bookauthor" placeholder="Author">
                        </div>
                        <div class="form-group">
                            <label>Stock:</label>
                            <input type="number" name="bookstock" placeholder="Stock">
                        </div>
                        <div class="form-group">
                            <label>Date:</label>
                            <input type="date" name="bookdate">
                        </div>
                        <button type="submit" class="btn-submit">Add Book</button>
                    </form>
                </div>

                <!-- Stats Container -->
                <div class="container stats-container">
                    <h2>Statistics</h2>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-value">{{ $books->count() }}</div>
                            <div class="stat-label">Total Books</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">{{ $books->sum('stock') }}</div>
                            <div class="stat-label">Total Stock</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">{{ $books->max('stock') }}</div>
                            <div class="stat-label">Highest Stock</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">{{ $books->min('stock') }}</div>
                            <div class="stat-label">Lowest Stock</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Side - Table -->
            <div class="container table-container">
                <h1>Book List</h1>
                <table class="book-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Stock</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>{{ $book->date }}</td>
                            <td>
                                <a href="/books/{{ $book->id }}/edit" class="btn-edit">Edit</a>
                                <form action="/books/{{ $book->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
</html>