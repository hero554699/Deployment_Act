<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="{{ asset('css/bookdesign.css') }}">
</head>
<body>
<div class="wrapper">
    <div class="container">
        <h1>Edit Book</h1>

        <form action="/books/{{ $book->id }}" method="POST" class="add-book-form">
            @csrf
            @method('PUT')
        
            <div class="form-group">
                <label>Book Name: </label>
                <input type="text" name="bookname" value="{{ $book->name }}">
            </div>
            
            <div class="form-group">
                <label>Author: </label>
                <input type="text" name="bookauthor" value="{{ $book->author }}">
            </div>

            <div class="form-group">
                <label>Stock: </label>
                <input type="number" name="bookstock" value="{{ $book->stock }}">
            </div>

            <div class="form-group">
                <label>Date: </label>
                <input type="date" name="bookdate" value="{{ $book->date }}">
            </div>

            <button type="submit" class="btn-submit">Update</button>
        </form>

        <br>

        <a href="/books">Back</a>
    </div>
</div>
</body>
</html>