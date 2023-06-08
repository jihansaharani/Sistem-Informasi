@extends('layout.template')

@section('content')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>
                            Edit Website</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Website</li>
                            <li class="breadcrumb-item active">Edit Settings Website</li>
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
                            <form action=" {{ Route('updatewebsite', ['id' => $data->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                @method('PUT')
                                <div class="row">
                                    <img src="/logo/{{ $data->logowebsite }}" style="height: 250px;width:300px;">
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label class="form-label">Logo Website</label>
                                                <input class="form-control" name="logowebsite" type="file" placeholder=""
                                                    value="{{ $data->logowebsite }}">
                                            </div>
                                        </div>
                                    @error('logowebsite')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">No Telepon Website</label>
                                            <input class="form-control" name="notelepon" type="text" placeholder=""
                                                value="{{ $data->notelepon }}">
                                        </div>
                                    </div>
                                    @error('notelepon')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Email Wesite</label>
                                            <input class="form-control" name="email" type="text" placeholder=""
                                                value="{{ $data->email }}">
                                        </div>
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="col-md-6 col-lg-12">
                                        <div class="form-group"><label class="form-label">Deskripsi Website</label>
                                            <textarea class="form-control" name="deskripsiwebsite" id="Mysummernote" cols="30" rows="10"
                                                value="{{ $data->deskripsiwebsite }}">{{ $data->deskripsiwebsite }}</textarea>
                                        </div>
                                    </div>
                                    @error('deskripsiwebsite')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Alamat Website</label>
                                            <input class="form-control" name="alamat" type="text" placeholder=""
                                                value="{{ $data->alamat }}">
                                        </div>
                                    </div>
                                    @error('alamat')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="col-sm-6 ">
                                        <div class="mb-3">
                                            <label class="form-label">Instagram</label>
                                            <input class="form-control" name="ig" type="text" placeholder=""
                                                value="{{ $data->ig }}">
                                        </div>
                                    </div>
                                    @error('ig')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="col-sm-6 ">
                                        <div class="mb-3">
                                            <label class="form-label">Facebook</label>
                                            <input class="form-control" name="facebook" type="text" placeholder=""
                                                value="{{ $data->facebook }}">
                                        </div>
                                    </div>
                                    @error('facebook')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="col-sm-6 ">
                                        <div class="mb-3">
                                            <label class="form-label">Twitter</label>
                                            <input class="form-control" name="twitter" type="text" placeholder=""
                                                value="{{ $data->twitter }}">
                                        </div>
                                    </div>
                                    @error('twitter')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <input type="hidden" name="default" value="{{ $data->logowebsite }}">
                                    <div class="">
                                        <button type="submit" class="btn btn-success" type="button">Simpan</button>

                                        <a href="/websitesetings"><button class="btn btn-danger"
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
    @push('script')
    <script src="http://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#Mysummernote").summernote();
            $('.dropdown-toggle').dropdown();
        });
    </script>
    @endpush
@endsection
