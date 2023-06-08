@extends('layout.template')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Profil Admin</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Profil Admin</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <section class="inner-section profile-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-title">
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#profile-edit">Ganti
                                Profil</button>
                        </div>
                        <p>
                    </div>
                </div>

                <div class="modal fade" id="contact-add">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content"><button class="modal-close" data-bs-dismiss="modal"><i
                            <form class="modal-form">
                                    class="icofont-close"></i></button>
                                <div class="form-title">
                                    <h3>add new contact</h3>
                                </div>
                                <div class="form-group"><label class="form-label">title</label><select class="form-select">
                                        <option selected>choose title</option>
                                        <option value="primary">primary</option>
                                        <option value="secondary">secondary</option>
                                    </select></div>
                                <div class="form-group"><label class="form-label">number</label><input class="form-control"
                                        type="text" placeholder="Enter your number"></div><button class="form-btn"
                                    type="submit">save contact info</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="address-add">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content"><button class="modal-close" data-bs-dismiss="modal"><i
                                    class="icofont-close"></i></button>
                            <form class="modal-form">
                                <div class="form-title">
                                    <h3>add new address</h3>
                                </div>
                                <div class="form-group"><label class="form-label">title</label><select class="form-select">
                                        <option selected>choose title</option>
                                        <option value="home">home</option>
                                        <option value="office">office</option>
                                        <option value="Bussiness">Bussiness</option>
                                        <option value="academy">academy</option>
                                        <option value="others">others</option>
                                    </select></div>
                                <div class="form-group"><label class="form-label">address</label>
                                    <textarea class="form-control" placeholder="Enter your address"></textarea>
                                </div><button class="form-btn" type="submit">save address info</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="payment-add">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content"><button class="modal-close" data-bs-dismiss="modal"><i
                                    class="icofont-close"></i></button>
                            <form class="modal-form">
                                <div class="form-title">
                                    <h3>add new payment</h3>
                                </div>
                                <div class="form-group"><label class="form-label">card number</label><input
                                        class="form-control" type="text" placeholder="Enter your card number"></div>
                                <button class="form-btn" type="submit">save card info</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="profile-edit">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button class="modal-close" data-bs-dismiss="modal">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <form class="modal-form" style="margin:auto;" action="/updateprofileadmin/{{ Auth::user()->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-title">
                                    <h3>edit info profil</h3>
                                </div>
                                <div class="form-group"><label class="form-label">Foto Profil</label>
                                    <input class="form-control" name="fotoprofil" type="file">
                                </div>
                                @error('fotoprofil')
                                    <div class="alert alert-danger mb-3"> {{ $message }} </div>
                                @enderror
                                <div class="form-group"><label class="form-label">Nama</label>
                                    <input class="form-control" type="text" name="name"
                                        value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger mb-3"> {{ $message }} </div>
                                @enderror
                                <button style="margin-left:55px;" class="btn btn-info" type="submit">Simpan Info Profil</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="contact-edit">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content"><button class="modal-close" data-bs-dismiss="modal"><i
                                    class="icofont-close"></i></button>
                            <form class="modal-form">
                                <div class="form-title">
                                    <h3>edit contact info</h3>
                                </div>
                                <div class="form-group"><label class="form-label">title</label><select
                                        class="form-select">
                                        <option value="primary" selected>primary</option>
                                        <option value="secondary">secondary</option>
                                    </select></div>
                                <div class="form-group"><label class="form-label">number</label><input
                                        class="form-control" type="text" value="+8801838288389"></div><button
                                    class="form-btn" type="submit">save
                                    contact
                                    info</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="user-profile">
                        <div class="row">
                            <!-- user profile header start-->
                            <div class="col-sm-12">
                                <div class="card profile-header"><img class="img-fluid bg-img-cover"
                                        src="{{ asset('admin/tamplate_promotor/admin.pixelstrap.com/tivo/assets/images/user-profile/u.png/') }}"
                                        alt="">
                                    <div class="profile-img-wrrap"><img class="img-fluid bg-img-cover"
                                            src="{{ asset('admin/tamplate_promotor/admin.pixelstrap.com/tivo/assets/images/user-profile/bg-profile.jpg/') }}"
                                            alt=""></div>
                                    <br>
                                    <br>
                                    <br>
                                    <center>
                                        <div class="userpro-box">
                                            <div class="img-wrraper">
                                                <div class="avatar"><img class="img-fluid" alt=""
                                                        src="{{ asset('fotoprofil/' . Auth::user()->fotoprofil) }}"
                                                        alt="user"></div>
                                            </div>
                                            <div class="user-designation">
                                                <div class="title"><a target="_blank">
                                                        <h4>{{ Auth::user()->name }}</h4>
                                                        <h6 class="f-w-500" style="color:black;">{{ Auth::user()->role }}
                                                        </h6>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <!-- user profile header end-->

                        </div>
                    </div>
                </div>
        </section>
        <!-- Container-fluid Ends-->
    </div>
@endsection
