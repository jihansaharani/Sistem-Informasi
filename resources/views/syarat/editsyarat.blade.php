@extends('layout.template')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>
                            Syarat</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Syarat</li>
                            <li class="breadcrumb-item active">Edit Syarat </li>
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
                            <form action=" {{ Route('updatesyarat', ['id' => $data->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Syarat Dan Ketentuan</label>
                                            <input class="form-control" name="syarat" type="text" placeholder=""
                                                value="{{ $data->syarat }}">
                                        </div>
                                    </div>
                                    @error('syarat')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="">
                                        <button type="submit" class="btn btn-success" type="button">Simpan</button>
                                        <a href="/syarat"><button class="btn btn-danger"
                                                type="button">Batal</button></a>
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
