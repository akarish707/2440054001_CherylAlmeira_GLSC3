<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Picture Collection</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>

<body>

    <main>

        <section class="py-2 text-center container">
            <div class="row py-lg-3">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Picture Collections</h1>
                    <p>
                        <button type="button" class="btn btn-primary my-2 btn-dark" data-bs-toggle="modal"
                            data-bs-target="#myModal">
                            Insert a New Picture
                        </button>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($data as $d)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" src="{{ asset("storage/$d->image") }}"
                                width="100%" height="225" role="img" focusable="false"
                                onerror="this.onerror=null;this.src='https://picsum.photos/100';">
                            <div class="card-body">
                                <h5 class="card-title">{{ $d->title }}</h5>
                                <p class="card-text">{{ $d->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('delete', ['id'=>$d->id]) }}"
                                            class="btn btn-sm btn-outline-danger">Delete</a>
                                    </div>
                                    <small class="text-muted">{{ $d->picture_taken }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>


    {{-- modal --}}

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Photo Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>
                        <div class="mb-2">
                            <label for="desc" class="form-label">description</label>
                            <textarea class="form-control" name="desc" id="desc" cols="30" rows="10"
                                required></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="pics" class="form-label">Picture</label>
                            <input type="file" class="form-control" id="pics" name='pics' accept="image/*" required>
                        </div>
                        <div class="mb-2">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name='date' required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-dark">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


</body>

</html>
