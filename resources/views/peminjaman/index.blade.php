<!DOCTYPE html>
<html lang="en">
    <head>
        <title>E-Perpustakaan</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="description" content="">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

            <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('icomoon/icomoon.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    </head>
    <body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">
    @include('components.navbar-frontend')
    <section id="featured-books" class="py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header align-center">
                    <h2 class="section-title">Daftar Buku yang Dipinjam</h2>
                </div>

                <div class="product-list">
                    <div class="row">

                        @foreach ($peminjaman as $item)
                        <div class="col-md-3">
                            <div class="product-item">
                                <figure class="product-style">
                                    <!-- Tampilkan gambar jika tersedia, gunakan gambar default jika tidak -->
                                    @if ($item->buku->image)
                                    <img src="{{ asset('storage/' . $item->buku->image) }}" class="card-img-top" alt="{{ $item->buku->judul }}">
                                    @else
                                        <img src="{{ asset('images/default-book.jpg') }}" class="card-img-top" alt="Default Image">
                                    @endif
                                </figure>
                                <figcaption>
                                    <h3>{{ $item->buku->judul }}</h3>
                                    <span>{{ $item->buku->penulis->nama ?? 'Penulis Tidak Diketahui' }}</span>
                                </figcaption>
                            </div>
                        </div>
                        @endforeach
                    </div><!--ft-books-slider-->
                </div><!--grid-->
            </div><!--inner-content-->
        </div>
    </div>
    </section>

	<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src=" {{ asset('js/plugins.js') }}"></script>
	<script src=" {{ asset('js/script.js') }}" ></script>
</body>
</html>
