@extends('Customer.Layout_')


@section('title')
    Login
@endsection

@section('content')
    <div class="row mt-3 ">
        <h3>
            <i class="fas fa-user    "></i>
            Giriş Yap
        </h3>
    </div>
    <hr>
    <div class="row mt-1">
        <h5>
            Lütfen sistemimize giriş yapın.
        </h5>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('components.FlashMessage')
            <form method="POST" action="{{route("customer-login-post")}}">
                @csrf
                <div class="form-group">
                    <label for="email">
                        E-posta</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Şifre</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary w-100">
                        Giriş Yap
                    </button>
                </div>
                <div class="form-group mt-1">
                    <a href="#" class="text-dark">Üye Değil misiniz ? </a>
                </div>
            </form>
        </div>
    </div>
@endsection
