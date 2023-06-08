@extends('layout.template')

@push('css')
        {{-- toastr --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
            integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
            crossorigin="anonymous" referrerpolicy="no-referrer">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    @section('searchaktif')
    <li>
        <div class="right-header ps-0">
          <form action="{{ url('promoaktif') }}" method="get" class="header-form input-group">
            <div class="input-group-prepend">
              <span class="input-group-text mobile-search">
               <button type="submit"><i class="fa fa-search"></i></button>
              </span>
            </div>
            <input class="form-control" type="search" name="cari"  value="{{ Request::get('cari') }}" placeholder="Cari Promo Aktif...">
          </form>
        </div>
      </li>
      <li class="serchinput">
        <div class="serchbox"><i data-feather="search"></i></div>
        <div class="form-group search-form">
            <form action="{{ url('promoaktif') }}" method="get">
                <input type="search" name="cari" value="{{ Request::get('cari') }}" placeholder="Cari Promo Aktif...">
            </form>
        </div>
    </li>
    @endsection
    @section('content')
    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Promo Yang Sudah dipublikasikan</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="product-wrapper-grid">
                <div class="row">
                    @foreach ($data as $promotor)
                    @if (Carbon\Carbon::now()->format('Y-m-d') <= $promotor->masapromo)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="product-box">
                                    <div class="product-img"><img class="img-fluid" style="height:300px; width:300px;"
                                            src="{{ asset('sampul/' . $promotor->sampul) }}" alt="">
                                    </div>
                                    <div class="product-details">
                                        <h5 style="max-width: 200px;
                                        text-transform: capitalize;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        white-space: nowrap;">{{ $promotor->namapromo }}</h5>
                                        <div class="mt-2">
                                            <p style="font-width: bold;">Status :

                                                @if ($promotor->status == 0)
                                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                                @elseif ($promotor->status == 2)
                                                <span class="badge bg-danger text-white">Ditolak</span>
                                                @else
                                                    <span class="badge bg-success text-white">Diterima</span>
                                                @endif</p>
                                            <a href="/detailpromopromotor/{{ $promotor->id }}" method="post">
                                                <button class="btn btn-info mb-1" style="border-radius: 5px;"
                                                    type="button">Detail Promo</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
                {{ $data->links() }}
            </div>
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
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/hapuspromo/" + siswaid + ""
                    Swal.fire(
                        'Deleted!',
                        'Data berhasil di hapus.',
                        'success'
                    )
                }
            })
        });
    </script>
    @endpush
