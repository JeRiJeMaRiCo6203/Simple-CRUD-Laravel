<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .spinner-4 {
            width: 50px;
            height: 50px;
            display: grid;
            animation: s4 4s infinite;
        }

        .spinner-4::before,
        .spinner-4::after {
            content: "";
            grid-area: 1/1;
            border: 8px solid;
            border-radius: 50%;
            border-color: red red #0000 #0000;
            mix-blend-mode: darken;
            animation: s4 1s infinite linear;
        }

        .spinner-4::after {
            border-color: #0000 #0000 blue blue;
            animation-direction: reverse;
        }

        @keyframes s4 {
            100% {
                transform: rotate(1turn)
            }
        }
    </style>
    <title>Update Book </title>
</head>

<body>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
                <h1>Update Book</h1>
                <hr>
                <div id="loadingSpinner" class="spinner-4"></div>
                <form id="content" class="" method="POST"
                    action="{{ route('updateBook', ['id' => $bookToEdit->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="book-title">Book Title</label>
                        <input type="text" class="form-control @error('bookTitle') is-invalid @enderror"
                            id="book-title" placeholder="Enter book title" name="bookTitle"
                            value="{{ old('bookTitle', $bookToEdit->bookTitle) }}">
                        @error('bookTitle')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="book-author">Book Author</label>
                        <input type="text" class="form-control @error('bookAuthor') is-invalid @enderror"
                            id="book-author" placeholder="Enter book author" name="bookAuthor"
                            value="{{ old('bookAuthor', $bookToEdit->bookAuthor) }}">
                        @error('bookAuthor')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="book-price">Book Price</label>
                        <input type="number" class="form-control @error('bookPrice')is-invalid @enderror"
                            id="book-price" placeholder="Enter book price" name="bookPrice"
                            value="{{ old('bookPrice', $bookToEdit->bookPrice) }}">
                        @error('bookPrice')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="release-date">Book Release Date</label>
                        <input type="date" class="form-control @error('releaseDate') is-invalid @enderror"
                            id="release-date" placeholder="Enter book release date" name="releaseDate"
                            value="{{ old('releaseDate', $bookToEdit->releaseDate) }}">
                        @error('releaseDate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" data-toggle="modal" data-target="#deleteConfirmationModal"
                        class="btn btn-danger">Delete</button>
                    <a class="btn btn-primary" href="{{ route('index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>

    {{-- Delete Confimation --}}
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this book?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('deleteBook', ['id' => $bookToEdit->id]) }}"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        setTimeout(function() {
            document.getElementById('successAlert').style.display = 'none';
        }, 2000);
        $(document).ready(function() {
            $('#content').hide();
            setTimeout(function() {
                $('#loadingSpinner').hide();
                $('#content').show();
            }, 3000);
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
