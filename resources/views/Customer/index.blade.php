@extends('Customer.Layout_')


@section('title')
    Anasayfa
@endsection

@section('content')
    <div class="row mt-3 ">
        <h3>Kütüphane Uygulaması</h3>
    </div>
    <hr>
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
        <div class="col-md-3">
            <div class="card bg-dark text-white">
                <img src="{{ asset('Frontend/Customer/img/books-default.jpg') }}" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title">
                        <span class="badge bg-success">
                            <span class="badge bg-primary">
                                <i class="fas fa-book    "></i>
                            </span>
                            Card title
                        </span>
                        <a href="#" class="btn btn-danger btn-sm">Talep Et ! </a>
                    </h5>
                    <p class="card-text">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias, sed similique accusantium nisi
                        veritatis molestias adipisci eligendi dolores aperiam temporibus!
                    </p>
                    <p class="card-text">Last updated 3 mins ago</p>

                </div>
            </div>
        </div>


    </div>
@endsection
