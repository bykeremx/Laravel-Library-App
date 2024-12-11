<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
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
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-bookmark    "></i>
                    Library
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('customer-index') }}" aria-current="page">
                                <i class="fas fa-book    "></i>
                                Kitaplar
                                </span></a>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('customer-kitaplarim') }}" aria-current="page">
                                    <i class="fas fa-book    "></i>
                                    Kitaplarım
                                    </span></a>
                            </li>
                            @if (Auth::user()->is_admin == 1)
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('admin-index-page') }}" aria-current="page">
                                        <i class="fas fa-user-check    "></i>
                                        Admin Panel
                                        </span></a>
                                </li>
                            @endif
                        @endif

                    </ul>
                    @if (!Auth::check())
                        <ul class="navbar-nav me-right mt-2 mt-lg-0">
                            <li class="nav-item " style="margin-right:5px">
                                <a class=" btn btn-outline-success rounded-0 shadow-sm "
                                    href="{{ route('customer-register') }}" aria-current="page">
                                    Üye Ol
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class=" btn btn-outline-primary rounded-0" href="{{ route('customer-login') }}"
                                    aria-current="page">
                                    Giriş Yap !
                                </a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav me-right mt-2 mt-lg-0">
                            <li class="nav-item " style="margin-right:5px">
                                <a class=" btn btn-outline-success rounded-0 shadow-sm "
                                    href="{{ route('customer-register') }}" aria-current="page">
                                    <i class="fas fa-user    "></i>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav me-right mt-2 mt-lg-0">
                            <li class="nav-item " style="margin-right:5px">
                                <a class=" btn btn-outline-danger rounded-0 shadow-sm "
                                    href="{{ route('customer-logout') }}" aria-current="page">
                                    <i class="fas fa-user    "></i>
                                    Çıkış Yap !
                                </a>
                            </li>
                        </ul>
                    @endif
                </div>

            </div>
        </nav>


    </header>
    <main>

        <div class="container">
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
