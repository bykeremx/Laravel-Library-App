@extends('Customer.Layout_')

@section('title')
    Register
@endsection

@section('content')
    <div class="row mt-3">
        <h3>
            <i class="fas fa-user-plus"></i>
            Kayıt Ol
        </h3>
    </div>
    <hr>
    <div class="row mt-1">
        <h5>
            Lütfen sistemimize kayıt olun.
        </h5>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('components.FlashMessage')
            <form method="POST" action="{{route("customer-register-post")}}">
                @csrf
                <div class="form-group">
                    <label for="first_name">Ad</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Soyad</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="email">E-posta</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Şifre</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary w-100">
                        Kayıt Ol
                    </button>
                </div>
                <div class="form-group mt-1">
                    <a href="#" class="text-dark">Zaten Üye misiniz? Giriş Yapın</a>
                </div>
            </form>
        </div>
    </div>
@endsection
