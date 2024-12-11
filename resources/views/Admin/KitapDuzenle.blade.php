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
            <i class="fas fa-book"></i>
            Kitap Düzenle 
        </h3>
    </div>
    <div class="row">
        @include("components.FlashMessage")
    </div>

    <div class="row">
        <form action="{{route('kitap-duzenle-post',['id'=>$Book->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Kitap Adı</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $Book->title }}" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Yazar</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $Book->author }}" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Stok Durumu</label>
                <input type="number" class="form-control" id="author" name="stock" value="{{ $Book->stock }}" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select class="form-select" id="category" name="category_id" required>
                    @foreach($Categories as $category)
                        <option value="{{ $category->id }}" {{ $Book->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="publishing" class="form-label">Yayıncı</label>
                <select class="form-select" id="publishing" name="publishing_id" required>
                    @foreach($Publishings as $publishing)
                        <option value="{{ $publishing->id }}" {{ $Book->publishing_id == $publishing->id ? 'selected' : '' }}>
                            {{ $publishing->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Açıklama</label>
                <textarea class="form-control" id="description" name="content" rows="4">{{ $Book->content }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Kapak Resmi</label>
                <input type="file" class="form-control" id="image" name="book_img">
                @if($Book->book_img)
                    <img src="{{ asset('uploads_book_img/'.$Book->book_img) }}" alt="Kapak Resmi" class="img-thumbnail mt-2" style="width: 150px; height: auto;">
                @endif
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Kaydet
            </button>
        </form>
    </div>

@endsection
