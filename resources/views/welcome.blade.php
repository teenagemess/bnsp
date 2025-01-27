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

	<section id="billboard">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<button class="prev slick-arrow">
						<i class="icon icon-arrow-left"></i>
					</button>

					<div class="main-slider pattern-overlay">
						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">Life of the Wild</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
									ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
									urna, a eu.</p>
								<div class="btn-wrap">
									<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
											class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div><!--banner-content-->
							<img src="images/main-banner1.jpg" alt="banner" class="banner-image">
						</div><!--slider-item-->

						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">Birds gonna be Happy</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
									ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
									urna, a eu.</p>
								<div class="btn-wrap">
									<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
											class="icon icon-ns-arrow-right"></i></a>
								</div>
							</div><!--banner-content-->
							<img src="images/main-banner2.jpg" alt="banner" class="banner-image">
						</div><!--slider-item-->

					</div><!--slider-->

					<button class="next slick-arrow">
						<i class="icon icon-arrow-right"></i>
					</button>

				</div>
			</div>
		</div>

	</section>

	{{-- <section id="client-holder" data-aos="fade-up">
		<div class="container">
			<div class="row">
				<div class="inner-content">
					<div class="logo-wrap">
						<div class="grid">
							<a href="#"><img src="images/client-image1.png" alt="client"></a>
							<a href="#"><img src="images/client-image2.png" alt="client"></a>
							<a href="#"><img src="images/client-image3.png" alt="client"></a>
							<a href="#"><img src="images/client-image4.png" alt="client"></a>
							<a href="#"><img src="images/client-image5.png" alt="client"></a>
						</div>
					</div><!--image-holder-->
				</div>
			</div>
		</div>
	</section> --}}

	<section id="featured-books" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span>Some quality items</span>
						</div>
						<h2 class="section-title">Buku</h2>
					</div>

					<div class="product-list" data-aos="fade-up">
						<div class="row">

                            @foreach ($buku as $item)
                            <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <!-- Tampilkan gambar jika tersedia, gunakan gambar default jika tidak -->
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->judul }}">
                                        @else
                                            <img src="{{ asset('images/default-book.jpg') }}" class="card-img-top" alt="Default Image">
                                        @endif
                                        <a href="{{ url('/listbuku')}}">
                                            <button type="submit" class="add-to-cart">Pinjam Buku</button>
                                        </a>
                                    </figure>
                                    <figcaption>
                                        <h3>{{ $item->judul }}</h3>
                                        <span>{{ $item->penulis->nama ?? 'Penulis Tidak Diketahui' }}</span>
                                    </figcaption>
                                </div>
                            </div>
                            @endforeach



						</div><!--ft-books-slider-->
					</div><!--grid-->


				</div><!--inner-content-->
			</div>

			<div class="row">
				<div class="col-md-12">

					<div class="btn-wrap align-right">
						<a href="{{ url('/listbuku') }}" class="btn-accent-arrow">View all products <i
								class="icon icon-ns-arrow-right"></i></a>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section id="best-selling" class="leaf-pattern-overlay">
		<div class="corner-pattern-overlay"></div>
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-md-8">

					<div class="row">

						<div class="col-md-6">
							<figure class="products-thumb">
								<img src="images/single-image.jpg" alt="book" class="single-image">
							</figure>
						</div>

						<div class="col-md-6">
							<div class="product-entry">
								<h2 class="section-title divider">Buku Best Seller</h2>
								<div class="products-content">
									<div class="author-name">By Timbur Hood</div>
									<h3 class="item-title">Birds gonna be happy</h3>
									<p>Buku ini mengisahkan sebuah perjalanan yang penuh dengan tantangan dan petualangan, di mana setiap langkah membawa protagonisnya lebih dekat kepada pemahaman tentang dirinya sendiri dan dunia di sekitarnya</p>
									<div class="btn-wrap">
										<a href="{{ url('/listbuku') }}" class="btn-accent-arrow">Pinjam Buku <i
												class="icon icon-ns-arrow-right"></i></a>
									</div>
								</div>

							</div>
						</div>

					</div>
					<!-- / row -->

				</div>

			</div>
		</div>
	</section>


	<section id="quotation" class="pb-5 mt-5 mb-5 align-center">
		<div class="inner-content">
			<h2 class="section-title divider">Quote Hari Ini</h2>
			<blockquote data-aos="fade-up">
				<q>“Jika Anda tidak suka membaca. Anda belum menemukan buku yang tepat.”</q>
				<div class="author-name">JK Rowling.</div>
			</blockquote>
		</div>
	</section>

	<div id="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="copyright">
						<div class="row">
							<div class="col-md-6">
								<p>© 2025 Raynanda Aqiyas Pramardhika.</p>
							</div>
							<div class="col-md-6">
								<div class="social-links align-right">
									<ul>
										<li>
											<a href="#"><i class="icon icon-facebook"></i></a>
										</li>
										<li>
											<a href="#"><i class="icon icon-twitter"></i></a>
										</li>
										<li>
											<a href="#"><i class="icon icon-youtube-play"></i></a>
										</li>
										<li>
											<a href="#"><i class="icon icon-behance-square"></i></a>
										</li>
									</ul>
								</div>
							</div>

						</div>
					</div><!--grid-->

				</div><!--footer-bottom-content-->
			</div>
		</div>
	</div>

	<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src=" {{ asset('js/plugins.js') }}"></script>
	<script src=" {{ asset('js/script.js') }}" ></script>
</body>

</html>
