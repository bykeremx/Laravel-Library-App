@extends('Admin.layout_')

@section('title')
    Kitap Ekle | {{ Auth::user()->name }}
@endsection


@section('content')
    <div class="row">
        <h1>
            Kitap Ekle
        </h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{route("admin-kitap-ekle")}}" method="POST" enctype="multipart/form-data">
                <!-- CSRF Token -->
                @csrf
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option selected disabled>Bir kategori seçin...</option>
                        <!-- Kategoriler buraya dinamik olarak gelecek -->
                        @foreach ($Categories as $item)
                            <option value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Başlık</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Kitap başlığı"
                        required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">İçerik</label>
                    <textarea class="form-control" id="content" name="content" rows="4" placeholder="Kitap içeriği"></textarea>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Yazar</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Kitap yazarı"
                        required>
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Stok miktarı"
                        min="0" required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Yayın Evi</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option selected disabled>Bir kategori seçin...</option>
                        <!-- Kategoriler buraya dinamik olarak gelecek -->
                        @foreach ($Publishings as $item)
                            <option value="{{ $item->id }}">{{ ucwords($item->name) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="book_img" class="form-label">Kitap Görseli</label>
                    <input type="file" class="form-control" id="book_img" name="book_img" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Kaydet</button>
            </form>
        </div>
        <div class="col-md-6"></div>
    </div>
@endsection
