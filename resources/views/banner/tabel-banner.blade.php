@extends('layout.template')

@section('content')
    @push('css')
        {{-- toastr --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
            integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
            crossorigin="anonymous" referrerpolicy="no-referrer">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush

    <style>
        .btn-edit {
            display: inline-block;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #28a745;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-edit i {
            margin-right: 8px;
        }
    </style>

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Tabel Banner</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/beranda"> <i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item">Tabel</li>
                            <li class="breadcrumb-item active">Tabel Kategori</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container-fluid starts-->

        <div class="container-fluid">
            <div class="row">
                @foreach ($data as $item)
                    <div class="col-sm-4">
                        <div class="card card-banner">
                            <img src="banner/{{ $item->banner1 }}" alt="" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5 class="card-title">Foto BANNER 1</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-banner">
                            <img src="banner/{{ $item->banner2 }}" alt="" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5 class="card-title">Foto BANNER 2</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card card-banner">
                            <img src="banner/{{ $item->banner3 }}" alt="" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5 class="card-title">Foto BANNER 3</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="/editbanner/{{ $item->id }}" method="POST">
                <button class="btn-edit" type="button" id="edit-btn-2"><i class="fa-solid fa-pen"></i>Edit Banner
                    Produk</button>
            </a>
        </div>
    @endsection

    @push('script')
        {{-- sweetalert --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        {{-- toastr --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

        <script>
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
            @endif
        </script>
    @endpush
