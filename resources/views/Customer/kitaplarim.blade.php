@extends('Customer.Layout_')


@section('title')
    Anasayfa
@endsection

@section('content')
    <div class="row mt-3 ">
        <h3>Kitaplarım - {{ Auth::user()->name }} {{ Auth::user()->surname }}</h3>
    </div>
    <style>
        .spinner {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #f3f3f3;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }

        /* Dönen animasyon */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .loading-text {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .loading-text .spinner {
            width: 15px;
            height: 15px;
        }

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
    <div class="row">
        @foreach ($userbooks as $item)
            <div class="col-md-3 ">
                <div class="card bg-dark text-white mb-3">
                    <img src="{{ asset('Frontend/Customer/img/books-default.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h6>
                            <i class="fas fa-user    "></i>
                            {{ $item->book->author }}
                        </h6>
                        <h5 class="card-title">
                            <span class="badge bg-success">
                                <span class="badge bg-primary">
                                    <i class="fas fa-book    "></i>
                                </span>
                                {{ $item->book->title }}
                            </span>

                        </h5>

                        @if (Auth::check())
                            <hr>
                            <div>

                                @if ($item->status == '0')
                                    <div class="badge bg-danger mb-1">ONAY BEKLENİYOR</div>
                                    <div class="spinner"></div>
                                @else
                                    <span class="badge bg-success">
                                        ONAYLANDI
                                    </span>
                                    <span class="badge bg-info">
                                        {{ $item->return_date }}
                                    </span>
                                @endif



                            </div>
                        @endif
                        <p class="card-text">
                            {{ mb_substr(ucwords($item->book->content), 0, 250) }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
