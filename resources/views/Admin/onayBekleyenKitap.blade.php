@extends('Admin.layout_')


@section('title')
    {{ Auth::user()->name }}
@endsection

@section('content')
    <div class="row">

        <h1>
            <i class="fas fa-clock    "></i>
            Onay Bekleyen Kitaplar !
        </h1>
        <h3>
            Onaylanan Kitaplar !
        </h3>
        <hr>
        <h5>
            <a name="" id="" class="btn btn-primary" href="{{route("onaylanmis-kitaplar-admin")}}" role="button">
                <i class="fas fa-eye    "></i>
                Onaylanan Kitapları Gör
            </a>
            
        </h5>
        <hr>
    </div>
    {{-- <div class="row">
        @dd($StatusBook)
    </div> --}}
    <div class="row">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-hover table-bordered align-middle">
                <thead class="bg-primary text-white">
                    <tr>
                        <th><i class="fas fa-user"></i> Kişi Adı</th>
                        <th><i class="fas fa-book"></i> Kitap Adı</th>
                        <th><i class="fas fa-clock    "></i>
                            Teslim Tarihi
                        </th>
                        <th><i class="fas fa-clock    "></i>
                            Kaç gün Kaldı
                        </th>
                        <th><i class="fas fa-info-circle"></i> Onay Durumu</th>
                        <th><i class="fas fa-cogs"></i> Onayla</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($StatusBook as $item)
                        <tr class="table-light">
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm rounded-circle me-2">
                                        <img src="https://via.placeholder.com/40" alt="Avatar" class="rounded-circle">
                                    </div>
                                    <span>{{ $item->user->name }}</span>
                                </div>
                            </td>
                            <td>{{ $item->book->title }}</td>
                            <td>
                                @if ($item->return_date)
                                    {{ $item->return_date}}
                                @else
                                    <span class="text-danger">Onaylanmadı ! </span>
                                @endif
                            </td>
                            <td>
                                @php

                                    $returnDate = Carbon\Carbon::parse($item->return_date);
                                    $receiveDate = Carbon\Carbon::parse($item->receive_date);
                                    $remainingDays = $receiveDate->diffInDays($returnDate, false);
                                @endphp

                                @if ($remainingDays > 0)
                                    <span class="text-success">{{ $remainingDays }} gün kaldı</span>
                                @elseif ($remainingDays == 0)
                                    <span class="text-warning">Son gün!</span>
                                @else
                                    <span class="text-danger">Onaylanmadı </span>
                                @endif
                            </td>
                            <td>
                                @if ($item->status == 0)
                                    <span class="badge bg-danger text-white">Beklemede</span>
                                @else
                                    <span class="badge bg-success text-white">Onaylandı</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->status == 0)
                                    <a name="" id="" class="btn btn-success btn-sm"
                                        href="{{ route('onayla-kitap-admin', ['id' => $item->id]) }}" role="button">
                                        <i class="fas fa-check"></i>
                                        Onayla
                                    </a>
                                @else
                                    <button class="btn btn-secondary btn-sm" disabled>
                                        <i class="fas fa-check-circle"></i> Onaylandı
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-light text-center">
                        <td colspan="4" class="text-muted">
                            Toplam: {{ $StatusBook->count() }} kullanıcı
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <style>
        .avatar img {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }

        table thead th {
            text-transform: uppercase;
            letter-spacing: 0.05rem;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
            cursor: pointer;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#dataTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Turkish.json"
                },
                "responsive": true,
                "paging": true,
                "searching": true,
                "info": true,
                "ordering": true
            });
        });
    </script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
@endsection
