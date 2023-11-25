<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Book Details</title>
</head>

<body>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
                <h1>Book Details</h1>
                <hr>
                <form class="" method="" action="{{ route('bookDetail', ['id' => $bookDetail->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="book-title">Book Title</label>
                        <input type="text" class="form-control" name="bookTitle"
                            value="{{ old('bookTitle', $bookDetail->bookTitle) }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="book-author">Book Author</label>
                        <input type="text" class="form-control" name="bookAuthor"
                            value="{{ old('bookAuthor', $bookDetail->bookAuthor) }}" disabled>
                        @error('bookAuthor')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="book-price">Book Price</label>
                        <input type="number" class="form-control" name="bookPrice"
                            value="{{ old('bookPrice', $bookDetail->bookPrice) }}" disabled>
                        @error('bookPrice')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="release-date">Book Release Date</label>
                        <input type="date" class="form-control" name="releaseDate"
                            value="{{ old('releaseDate', $bookDetail->releaseDate) }}" disabled>
                        @error('releaseDate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <a class="btn btn-primary" href="{{ route('index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>
</body>

</html>
