@extends('Customer.Layout_')


@section('title')
    Anasayfa
@endsection

@section('content')
    <div class="row mt-3 ">
        <h3>Kütüphane Uygulaması</h3>
    </div>
    <style>
        .card {
            height: 300px;
            /* İstediğiniz yükseklikte sabitleyin */
            max-height: 300px;
            /* Max yükseklik */
            overflow: hidden;
            /* İçeriğin taşmasını engeller */
        }
    </style>
    <hr>
    @include('components.FlashMessage')
    <div class="row mt-1">
        <h5>
            Mecvut Kitaplar
        </h5>
    </div>
    <div class="row mt-3">
        <div class="mb-3">
            <label for="" class="form-label">
                <i class="fas fa-search    "></i>
                Kitap Arayın</label>
            <input type="text" name="" id="" class="form-control" placeholder="Kitap Adı ... "
                aria-describedby="helpId" />
            <small id="helpId" class="text-muted"><b>*Lütfen Bir Kitap Adı Girin*</b></small>
        </div>
    </div>
    <div class="row">
        @foreach ($books as $item)
            <div class="col-md-3">
                <div class="card bg-dark text-white mb-3">
                    <img src="{{ asset('Frontend/Customer/img/books-default.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h6>

                            <i class="fas fa-user    "></i>
                            {{ $item->author }}

                        </h6>
                        <h5 class="card-title">
                            <span class="badge bg-success">
                                <span class="badge bg-primary">
                                    <i class="fas fa-book    "></i>
                                </span>
                                {{ $item->title }}
                            </span>

                        </h5>

                        @if (Auth::check())
                            <div class="mt-2">
                                <span class="badge bg-warning p-2 shadow-lgs">
                                    Mevcut Stok : {{ $item->stock }}
                                </span>
                            </div>
                            <hr>
                            <div>
                                <form action="{{ route('customer-kitabi-talep-et') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-plus    "></i>
                                        Talep Et ! </a>
                                    </button>
                                </form>


                            </div>
                        @endif
                        <p class="card-text">
                            {{ mb_substr(ucwords($item->content), 0, 250) }}
                        </p>
                        <p class="card-text">

                            <i class="fas fa-clock    "></i>
                            {{ $item->created_at }}
                        </p>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
