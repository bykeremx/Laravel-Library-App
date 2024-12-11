@extends('Admin.layout_')


@section('title')
    {{ Auth::user()->name }}
@endsection

@section('content')
    <div class="row">

        <h1>
            <i class="fas fa-users    "></i>
            Kullanıcı İşlemleri
        </h1>
        <hr>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table id="dataTable" class="table table-striped table-hover table-bordered align-middle">
                <thead class="bg-primary text-white">
                    <tr>
                        <th><i class="fas fa-user"></i> Kişi Adı</th>
                        <th><i class="fas fa-envelope"></i> E-posta</th>
                        <th><i class="fas fa-user-shield"></i> Admin Durumu</th>
                        <th><i class="fas fa-trash"></i> Sil</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="table-light">
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm rounded-circle me-2">
                                        <img src="https://via.placeholder.com/40" alt="Avatar" class="rounded-circle">
                                    </div>
                                    <span>{{ $user->name }}</span>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->is_admin)
                                    <span class="badge bg-success text-white">Admin</span>
                                @else
                                    <span class="badge bg-secondary text-white">Kullanıcı</span>
                                @endif
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-danger"
                                    href="{{ route('kullanici-sil-admin', ['id' => $user->id]) }}" role="button">
                                    <i class="fas fa-trash    "></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="bg-light text-center">
                        <td colspan="4" class="text-muted">
                            Toplam: {{ $users->count() }} kullanıcı
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
