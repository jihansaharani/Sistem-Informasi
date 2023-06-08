@extends('layout.template')

@section('searchpending')
    <li>
        <div class="right-header ps-0">
          <form action="{{ url('promopendingpromotor') }}" method="get" class="header-form input-group">
            <div class="input-group-prepend">
              <span class="input-group-text mobile-search">
               <button type="submit"><i class="fa fa-search"></i></button>
              </span>
            </div>
            <input class="form-control" type="search" name="cari"  value="{{ Request::get('cari') }}" placeholder="Cari Promo Pending...">
          </form>
        </div>
      </li>
      <li class="serchinput">
        <div class="serchbox"><i data-feather="search"></i></div>
        <div class="form-group search-form">
            <form action="{{ url('promopendingpromotor') }}" method="get">
                <input type="search" name="cari" value="{{ Request::get('cari') }}" placeholder="Cari Promo Pending...">
            </form>
        </div>
    </li>
    @endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Promo Yang Sedang Menunggu Tinjauan Anda</h3>
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
                                            <p style="font-width: bold;">                                                @if ($promotor->masapromo <= now())
                                                    <span class="badge bg-warning text-white">Expired</span>
                                                @elseif ($promotor->status == 0)
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
        </div>
        {{ $data->links() }}
    </div>
    </div>
    </div>
@endsection

