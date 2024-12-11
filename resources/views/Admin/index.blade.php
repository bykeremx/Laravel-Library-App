@extends('Admin.layout_')


@section('title')
    {{ Auth::user()->name }}
@endsection

@section('content')
    
    <div class="row">
        <h1>Admin Panel

            <span class="badge bg-primary">
                {{ Auth::user()->name }} {{ Auth::user()->surname }}
            </span>
        </h1>
        <hr>
    </div>
    <div class="row">
        <h3>
            <i class="fas fa-book    "></i>
            Kitaplar Listesi
        </h3>
    </div>
    <div class="row">
        <div class="table-responsive-sm">
            <table class="table table-striped-columns table-hover table-borderless table-light align-middle">
                <thead class="table-light">
                    <caption>
                        <i class="fas fa-book-reader    "></i>
                        Kitap Listesi
                    </caption>
                    <tr>
                        <th>#</th>
                        <th>Kitap Adı</th>
                        <th>Yazarı</th>
                        <th>Stok Durum</th>
                        <th>Yayın Evi </th>
                        <th>Fotoğrafı</th>
                        <th>
                            <i class="fas fa-trash    "></i>
                            Sil
                        </th>
                        <th>
                            <i class="fas fa-edit    "></i>
                            Düzenle
                        </th>
                    </tr>
                </thead>
                @php
                    $count = 1;
                @endphp
                @foreach ($books as $item)
                    <tr class="table-dark">
                        <td>
                            <span class="badge rounded-pill text-bg-primary">
                                {{ $count++ }}
                            </span>

                        </td>
                        <td scope="row">
                            <span class="badge bg-warning text-dark">
                                {{ $item->title }}
                            </span>
                        </td>
                        <td>
                            {{ $item->author }}
                        </td>
                        <td>
                            @php
                                if ($item->stock > 0) {
                                    echo '<span class="badge bg-success">Stokta - ' . $item->stock . '</span>';
                                } else {
                                    echo '<span class="badge bg-danger">Stokta Yok</span>';
                                }
                            @endphp

                        </td>
                        <td>
                            {{ $item->Getpublishing->name }}
                        </td>
                        <td>
                            @if ($item->book_img)
                                <img src="{{ asset('uploads_book_img/'.$item->book_img) }}"  width="100" class="img-thumbnail" alt="Kitap Fotoğrafı">
                            @else
                                <img src="{{ asset("Frontend/Customer/img/books-default.jpg") }}" class="img-thumbnail" alt="Kitap Fotoğrafı">
                            @endif


                        </td>
                        <td>
                            <a href="{{route("sil-kitap-admin",['id'=>$item->id])}}" id="" class="btn btn-danger" role="button">
                                <i class="fas fa-trash    "></i>
                            </a>
                        </td>
                        <td>
                            <a name="" id="" class="btn btn-primary" href="{{route('kitap-duzenle-admin',['id'=>$item->id])}}" role="button">
                                <i class="fas fa-edit    "></i>
                            </a>

                        </td>

                    </tr>
                @endforeach
                {{-- <tbody class="table-group-divider">
                    <tr class="table-dark">
                        <td scope="row">Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                    <tr class="table-dark">
                        <td scope="row">Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                </tbody> --}}
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>
    <script>

    </script>
@endsection
