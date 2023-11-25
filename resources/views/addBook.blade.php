<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Create Book</title>
</head>

<body>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
                <h1>Create Book</h1>
                <hr>
                <form class="" method="POST" action="{{ route('storeBook') }}">
                    @csrf
                    <div class="form-group">
                        <label for="book-title">Book Title</label>
                        <input type="text" class="form-control @error('bookTitle') is-invalid @enderror"
                            id="book-title" placeholder="Enter book title" name="bookTitle"
                            value="{{ old('bookTitle') }}">
                        @error('bookTitle')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="book-author">Book Author</label>
                        <input type="text" class="form-control @error('bookAuthor') is-invalid @enderror"
                            id="book-author" placeholder="Enter book author" name="bookAuthor"
                            value="{{ old('bookAuthor') }}">
                        @error('bookAuthor')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="book-price">Book Price</label>
                        <input type="bumber" class="form-control @error('bookPrice')is-invalid @enderror"
                            id="book-price" placeholder="Enter book price" name="bookPrice"
                            value={{ old('bookPrice') }}>
                        @error('bookPrice')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="release-date">Book Release Date</label>
                        <input type="date" class="form-control @error('releaseDate') is-invalid @enderror"
                            id="release-date" placeholder="Enter book release date" name="releaseDate"
                            value="{{ old('releaseDate') }}">
                        @error('releaseDate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Clear</button>
                    <a class="btn btn-primary" href ="{{ route('index') }}">Back</a>
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

</html>
