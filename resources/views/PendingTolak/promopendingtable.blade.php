@extends('layout.template')

@section('content')
    <style>
        .form-group {
            display: flex;
            align-items: center;
        }

        select {
            margin-right: 10px;
        }

        .btn {
            margin-top: 10px;
        }
    </style>

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Tabel Produk</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Table</li>
                            <li class="breadcrumb-item active">Tabel Produk</li>
                        </ol>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <form action="/promopendingtable" class="form-inline mt-2 ml-2">
                                <div class="form-group" style="margin-top: 20px;">
                                    <label for="status-promo" class="mr-2">Filter :</label>
                                    <select style="width: 250px; border-radius:10px;" class="form-control ms-2"
                                        id="status-promo" name="status">
                                        <option value="" {{ $request == 'all' ? 'selected' : '' }}>Semua</option>
                                        <option value="0" {{ $request == 0 ? 'selected' : '' }}>Promo Pending</option>
                                        <option value="1" {{ $request == 1 ? 'selected' : '' }}>Promo Diterima</option>
                                        <option value="2" {{ $request == 2 ? 'selected' : '' }}>Promo Ditolak</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mb-2"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <div style="margin-left:147px;">
                                <button type="button" class="btn btn-primary mb-2" id="select-all-btn">Pilih Semua
                                    Produk</button>
                                <button type="button" class="btn btn-primary mb-2" id="cancel-select-all-btn">Batal Pilih
                                    Semua</button>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="margin-bottom:100px;">

                        {{-- Test --}}

                        <form action="/diterimatabel" method="post" style="margin-top: 10px;" id="form">
                            @csrf
                            <button onclick="document.getElementById('form').submit()" class="btn btn-success mb-1"
                                style="border-radius: 5px; width:220px; margin-left:10px;" type="submit">
                                Terima Promo
                            </button>

                            <div class="table-responsive theme-scrollbar" style="margin-top: 10px; padding:20px;">
                                <table class="table border-bottom mb-2" id="DataTable">
                                    <thead>
                                        <tr class="border-bottom-primary">
                                            <th scope="col">Pilih</th>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Promotor</th>
                                            {{-- <th scope="col">Nama Merek</th> --}}
                                            <th scope="col">Nama Promo</th>
                                            {{-- <th scope="col">Deskripsi Promo</th> --}}
                                            {{-- <th scope="col">Kategori Promo</th> --}}
                                            <th scope="col">Masa Promo</th>
                                            {{-- <th scope="col">Limit Promo</th> --}}
                                            <th scope="col">Sampul Produk</th>
                                            {{-- <th scope="col">Foto Produk</th> --}}
                                            <th scope="col">Status Promo</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr class="border-bottom-secondary">
                                                @if ($item->status == 1 || $item->status == 2)
                                                    <td>
                                                        <input type="checkbox" name="myCheckbox[]" id="select-all-btn"
                                                            value="{{ $item->id }}" disabled>
                                                    </td>
                                                @else
                                                    <td>
                                                        <input type="checkbox" name="myCheckbox[]" id="select-all-btn"
                                                            value="{{ $item->id }}">
                                                    </td>
                                                @endif
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->promotor }}</td>
                                                {{-- <td>{{ $item->namamerek }}</td> --}}
                                                <td>{{ $item->namapromo }}</td>
                                                {{-- <td>{!! $item->deskripsipromo !!}</td> --}}
                                                {{-- <td>{{ $item->kategoripromo }}</td> --}}
                                                <td>{{ \Carbon\Carbon::parse($item->masapromo)->locale('id')->isoFormat('DD MMMM YYYY') }}
                                                </td>
                                                {{-- <td>{{ $item->limit }}</td> --}}
                                                <td><img style="height:100px; width:100px;"
                                                        src="sampul/{{ $item->sampul }}" alt=""></td>
                                                {{-- <td class="d-flex justify-content-center align-items-center"
                                                    style="overflow: auto;">
                                                    @foreach ($item->fotoproduk as $fotoproduk)
                                                        <img src="{{ asset('fotopromo/' . $fotoproduk->fotoproduk) }}"
                                                            class="img-fluid mx-2" alt="produk">
                                                    @endforeach
                                                </td> --}}
                                                <td class="text-center">
                                                    <div class="mt-2">
                                                        <p style="font-weight: bold;">
                                                            @if ($item->masapromo <= now())
                                                                <span class="badge bg-warning text-white">Expired</span>
                                                            @elseif ($item->status == 0)
                                                                <span class="badge bg-warning text-dark">Menunggu</span>
                                                            @elseif ($item->status == 2)
                                                                <span class="badge bg-danger text-white">Ditolak</span>
                                                            @else
                                                                <span class="badge bg-success text-white">Diterima</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <a href="/detailpromopromotor/{{ $item->id }}" method="post">
                                                            <button class="btn btn-info"
                                                                type="button"><i
                                                                class="fa-solid fa-eye"></i></button>
                                                        </a>
                                                        <a href="#"><button class="btn btn-warning deletepromo"
                                                                 type="button"
                                                                data-id="{{ $item->id }}"
                                                                data-nama="{{ $item->namapromo }}"><i
                                                                class="fa-solid fa-trash"></i></button></a>
                                                    @elseif ($item->status == 2)
                                                        <a href="/detailpromopromotor/{{ $item->id }}" method="post">
                                                            <button class="btn btn-info"
                                                                type="button"><i
                                                                class="fa-solid fa-eye"></i></button>
                                                        </a>
                                                        <a href="#"><button class="btn btn-warning deletepromo"
                                                                 type="button"
                                                                data-id="{{ $item->id }}"
                                                                data-nama="{{ $item->namapromo }}"><i
                                                                class="fa-solid fa-trash"></i></button></a>
                                                    @else
                                                        <button class="btn btn-danger" type="button"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal-{{ $item->id }}">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                        <a href="/detailpromopromotor/{{ $item->id }}"
                                                            method="post">
                                                            <button class="btn btn-info" type="button"><i
                                                                    class="fa-solid fa-eye"></i></button>
                                                        </a>
                                                        <a href="#"><button class="btn btn-warning deletepromo"
                                                                type="button" data-id="{{ $item->id }}"
                                                                data-nama="{{ $item->namapromo }}"><i
                                                                    class="fa-solid fa-trash"></i></button></a>
                                                    @endif
                                                </td>

                                                {{-- Start --}}
                                                {{-- End --}}
                                            </tr>
                                            <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content" enctype="multiple/form-data">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Tinggalkan Pesan Ditolak Untuk Promotor</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <textarea name="pesan" id="pesan{{ $item->id }}" cols="55" rows="5" required></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="button" data-id="{{ $item->id }}"
                                                                class="btn btn-success btn-tolak-promo">Kirim</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->

    </div>
    </div>



    {{-- sweetalert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        document.getElementById("cancel-select-all-btn").addEventListener("click", function() {
            var checkboxes = document.querySelectorAll("input[type=checkbox]");
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        });
    </script>

    <script>
        document.getElementById("select-all-btn").addEventListener("click", function() {
            var checkboxes = document.querySelectorAll("input[type=checkbox]");
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        });
    </script>

    @push('script')
        <script>
            $('#DataTable').DataTable()
        </script>

        <script>
            $('.btn-tolak-promo').click(function() {
                console.log('p')
                var id = $(this).data('id')
                var pesan = $('#pesan' + id).val()
                $.ajax({
                    type: 'POST',
                    url: '/ditolaktabel/' + id,
                    data: {
                        _token: '{{ csrf_token() }}',
                        pesan: pesan
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil Menolak Promo!',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal Menolak Promo',
                            text: 'Terjadi kesalahan saat menolak promo',
                            confirmButtonText: 'OK'
                        });
                    }
                })
            })
        </script>

        <script>
            $('.deletepromo').click(function() {
                var siswaid = $(this).attr('data-id');
                var nama = $(this).attr('data-nama');

                Swal.fire({
                    title: 'Yakin?',
                    text: "Kamu akan menghapus data promo dengan nama " + nama + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/hapuspromo/" + siswaid + ""
                        Swal.fire(
                            'Terhapus!',
                            'Data berhasil di hapus.',
                            'success'
                        )
                    }
                })
            });
        </script>
        <script>
            const selectAllBtn = document.getElementById("select-all-btn");
            const checkboxes = document.getElementsByName("myCheckbox[]");

            selectAllBtn.addEventListener("click", function() {
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.disabled || checkbox.parentNode.parentNode.querySelector(".status")
                        .textContent == "1" || checkbox.parentNode.parentNode.querySelector(".status")
                        .textContent == "2") {
                        checkbox.disabled = true;
                        checkbox.checked = false;
                    }
                });
            });
        </script>
    @endpush
@endsection
