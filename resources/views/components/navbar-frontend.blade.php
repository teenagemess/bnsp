<div id="header-wrap">

    <div class="top-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div class="right-element">
                        <div class="dropdown">
                            <a href="#" class="user-account for-buy dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="icon icon-user"></i>
                                <span>
                                    @auth
                                        {{ Auth::user()->name }} <!-- Tampilkan nama user -->
                                    @else
                                        Login <!-- Tampilkan teks Login jika user belum login -->
                                    @endauth
                                </span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                @auth
                                    <!-- Menampilkan tombol Logout jika sudah login -->
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                           Logout
                                        </a>
                                    </li>

                                    <!-- Menampilkan tombol Dashboard hanya untuk admin -->
                                    @if (Auth::user()->role == 'admin') <!-- Ganti 'admin' sesuai dengan role di database Anda -->
                                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                    @endif

                                    <!-- Menampilkan tombol Profile untuk semua pengguna yang sudah login -->
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>

                                    <!-- Form Logout -->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    <!-- Menampilkan tombol Login jika belum login -->
                                    <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                @endauth
                            </ul>

                            <a href="{{ url('/buku-dipinjam') }}" class="cart for-buy"><i class="icon icon-clipboard"></i><span>Daftar Pinjam Buku({{ $jumlahBukuDipinjam }})</span></a>
                        </div>


                    </div><!--top-right-->
                </div>

            </div>
        </div>
    </div><!--top-content-->

    <header id="header">
        <div class="container-fluid" style=" justify-content: space-between;">
            <div class="row">
                <div class="col-2">
                    <div class="main-logo" style="width: 1000px">
                        <div class="banner-content">
                            <h2 class="banner-title" style="font-size: 30px">Digital Perpustakaan</h2>
                        </div>
                    </div>
                </div>

                <div class="col-10" style="margin-top:25px">
                    <nav id="navbar">
                        <div class="main-menu stellarnav">
                            <ul class="menu-list" style="">
                                <li class="menu-item active"><a href="{{ url('/') }}">Home</a></li>
                                <li class="menu-item has-sub">

                                    <ul>
                                        <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                    </ul>

                                </li>
                                <li class="menu-item">
                                    <a href="{{ url('/listbuku') }}" class="nav-link">Buku</a>
                                    <li class="menu-item has-sub">
                                    <ul>
                                        <li class="active"><a href="{{ url('/listbuku') }}">Buku</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <div class="hamburger">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>

                        </div>
                    </nav>

                </div>

            </div>
        </div>
    </header>

</div><!--header-wrap-->
