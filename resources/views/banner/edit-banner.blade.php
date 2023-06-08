@extends('layout.template')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <h3>Edit Banner</h3>
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
                    <form action="{{ route('updatebanner', ['id' => $data->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card card-banner">
                                    <img src="{{ asset('banner/' . $data->banner1) }}" class="card-img-top" alt="Banner 1">
                                    <div class="card-body">
                                        <h5 class="card-title">Banner 1</h5>
                                        <input type="file" name="banner1" class="form-control mt-2"
                                            aria-label="Upload banner 1">
                                        @error('banner1')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card card-banner">
                                    <img src="{{ asset('banner/' . $data->banner2) }}" class="card-img-top" alt="Banner 2">
                                    <div class="card-body">
                                        <h5 class="card-title">Banner 2</h5>
                                        <input type="file" name="banner2" class="form-control mt-2"
                                            aria-label="Upload banner 2">
                                        @error('banner2')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card card-banner">
                                    <img src="{{ asset('banner/' . $data->banner3) }}" class="card-img-top" alt="Banner 3">
                                    <div class="card-body">
                                        <h5 class="card-title">Banner 3</h5>
                                        <input type="file" name="banner3" class="form-control mt-2"
                                            aria-label="Upload banner 3">
                                        @error('banner3')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success me-2">Simpan</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
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
