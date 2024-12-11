<!doctype html>
<html lang="en">

<head>
    <title>Admin Panel |
        @yield('title')
    </title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- FontAwesome 6.2.0 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- (Optional) Use CSS or JS implementation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand p-3" href="#">
                    <i class="fas fa-book    "></i>
                    <span class="badge bg-info">
                        {{ Auth::user()->name }}
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                            {{ Auth::user()->name }} | Kütüphane
                        </h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{ route('admin-kitap-ekle') }}">
                                    <i class="fas fa-plus    "></i>
                                    Kitap Ekle
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="#">
                                    <i class="fas fa-user    "></i>
                                    Kullanıcı İşlemleri
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="#">
                                    <i class="fas fa-truck-loading    "></i>
                                    Onay Bekleyenler
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    </header>
    <main>
        <div class="container" style="margin-top:100px; margin-bottom:30px">
            <div class="row">
                <h5>
                    <i class="fas fa-star    "></i>
                    Hızlı İşlemler !
                </h5>
            </div>
            <div class="row">
                <!-- Hover added -->
                <div class="col-md-3">
                    <a name="" id="" class="btn btn-primary w-100 shadow-lg "
                        href="{{ route('admin-kitap-ekle') }}" role="button">
                        <i class="fas fa-bookmark    "></i>
                        Kitap Ekle</a>
                </div>
                <div class="col-md-3">
                    <a name="" id="" class="btn btn-danger w-100 shadow-lg " href="{{route('userList-page')}}"
                        role="button">
                        <i class="fas fa-user    "></i>
                        Kullanıcılar
                    </a>
                </div>
                <div class="col-md-3">
                    <a name="" id="" class="btn btn-success w-100 shadow-lg " href="{{route('admin-index-page')}}"
                        role="button">
                        <i class="fas fa-book-open    "></i>
                        Kitap Listesi
                    </a>

                </div>
                <div class="col-md-3">
                    <a name="" id="" class="btn btn-warning text-dark w-100 shadow-lg " href="{{route('onay-bekleyen-kitaplar')}}"
                        role="button">
                    <i class="fas fa-ticket    "></i>
                    Kitap Onay İşlemleri
                    </a>

                </div>


            </div>
        </div>

        <div class="container">
            <div class="row">
                @include('components.FlashMessage')
            </div>
            @yield('content')
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
