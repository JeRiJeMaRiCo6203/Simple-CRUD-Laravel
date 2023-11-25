<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Books</title>
</head>

<body>
    <div class="container pt-4 bg-white">
        <div class="column">
            <h1>Books</h1>
            <hr>
            <a href="{{ route('addBook') }}" class="btn btn-success">Create Book</a>
            <br>
            <br>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                    {{ session('success') }}
                </div>
            @endif
            <br>
            <div id="loadingSpinner" class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            <div id="content" class="mt-5">
                @forelse ($books as $books)
                    <div class="card text-center">
                        <div class="card-header">
                            Book {{ $books->id }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $books->bookTitle }}</h5>
                            <p class="card-text">Author: {{ $books->bookAuthor }}</p>
                            <p class="card-text">Price: {{ $books->bookPrice }}</p>
                            <a href="{{ route('bookDetail', ['id' => $books->id]) }}" class="btn btn-primary">See
                                Details</a>
                            <a href="{{ route('editBook', ['id' => $books->id]) }}" class="btn btn-warning">Edit</a>
                        </div>
                        <div class="card-footer text-body-secondary">
                            {{ $books->releaseDate }}
                        </div>
                    </div>
                    <br>
                @empty
                    <div class="alert alert-danger d-inline-block">没有数据 (NO DATA)!</div>
                @endforelse
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
