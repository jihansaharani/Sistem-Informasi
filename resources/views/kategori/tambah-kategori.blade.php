@extends('layout.template')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>
                            Kategori</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Promo</li>
                            <li class="breadcrumb-item active">Tambah Promo </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid project-create">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/storekategori" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Kategori</label>
                                            <input class="form-control" name="kategori" type="text" placeholder="">
                                        </div>
                                    </div>
                                    @error('kategori')
                                        <div class="alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="input-group mb-3">
                                        <input type="file" name="fotoproduk" class="form-control" id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                                    </div>
                                    @error('fotoproduk')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="">
                                        <button type="submit" class="btn btn-success" type="button">Tambah</button>

                                        <button class="btn btn-danger" type="button">Batal</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    </div>
    </div>
    <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->
    <!-- <footer class="footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 p-0 footer-left">
                  <p class="mb-0">Copyright © 2023 Tivo. All rights reserved.</p>
                </div>
                <div class="col-md-6 p-0 footer-right">
                  <p class="mb-0">Hand-crafted & made with <i class="fa fa-heart font-danger"></i></p>
                </div>
              </div>
            </div>
          </footer> -->
    </div>
    </div>
@endsection
