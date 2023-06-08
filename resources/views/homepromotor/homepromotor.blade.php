<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from mironmahmud.com/greeny/assets/ltr/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 06:53:01 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="template" content="greeny">
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template">
    <meta name="keywords"
        content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>Daftar Promo - GudangDiskon</title>
    <link rel="icon" href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/iconremove.png') }}" />
    <link rel="stylesheet"
        href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/fonts/flaticon/flaticon.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/fonts/icofont/icofont.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/fonts/fontawesome/fontawesome.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/vendor/venobox/venobox.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/vendor/slickslider/slick.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/vendor/niceselect/nice-select.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/vendor/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/css/home-category.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .product-disable::before {
            position: absolute;
            content: "Expired";
            top: 40%;
            left: 50%;
            z-index: 2;
            width: 100%;
            font-size: 15px;
            font-weight: 400;
            padding: 15px 0px;
            text-align: center;
            text-transform: uppercase;
            text-shadow: var(--instagram-tshadow);
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            color: var(--white);
            background: rgba(224, 152, 22, 0.9);
        }

        .icon-envelope {
            background-color: darkgray;
            border-radius: 50%;
            font-size: 24px;
            padding: 10px;
        }

        .product-label h6 {
            display: inline-block;
            margin: 0;
        }

        .product-label {
            position: relative;
            z-index: 999;
        }
    </style>
</head>

<body>
    <div class="backdrop"></div><a class="backtop fas fa-arrow-up" href="#"></a>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="header-top-welcome">
                        <p>Selamat datang di Gudang Promo sini adalah pusat Promo!</p>
                    </div>
                </div>

                <div class="col-md-5 col-lg-3">
                    <div class="header-top-select">
                        <div class="header-select">
                        </div>
                        <div class="header-select">
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-lg-4">
                    <ul class="header-top-list">

                        <li><a href="/faq">butuh bantuan</a></li>
                        <li><a href="/kontak">kontak kami</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header class="header-part">
        <div class="container">
            <div class="header-content">
                @foreach ($footer as $logo)
                <div class="header-media-group">
                    <button class="header-user"><img
                            src="{{ 'template/mironmahmud.com/greeny/assets/ltr/images/user.png' }}"
                            alt="user" /></button><a href="/berandapromotor"><img src="{{ asset('logo/' . $logo->logowebsite) }}"
                            alt="logo" /></a><button class="header-src"><i class="fas fa-search"></i></button>
                </div>
                <a href="/berandapromotor" class="header-logo"><img style="height:80px;"
                    src="{{ asset('logo/' . $logo->logowebsite) }}"
                        alt="logo" /></a>
                @endforeach
                <form class="header-form" action="{{ route('listpromo') }}" method="GET">
                    <input type="text" name="cari" placeholder="Cari sesuatu..." value="{{ old('cari') }}" />
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>

                <div class="rounded" style="margin-right:20px; position:relative;">
                    <a href="/notif/{{ Auth::user()->id }}" style="display:inline;">
                        <p><i class="fa-solid fa-envelope icon-envelope"></i></p>
                        @if ($belumdibaca > 0)
                            <span class="badge badge-danger"
                                style="position:absolute; top:-10px; right:-10px; background-color: red;">{{ $belumdibaca }}</span>
                        @endif

                    </a>
                </div>

                @if (Auth::user()->fotoprofil)
                    <a href="/profile" class="header-widget ms-auto" title="My Account">
                        <img style="height:50px; width:50px;"
                            src="{{ asset('fotoprofil/' . Auth::user()->fotoprofil) }}" alt="user" />
                    </a>
                @else
                    <a href="/profile" class="header-widget" title="My Account">
                        <img src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/user.png') }}"
                            alt="user" />
                    </a>
                @endif
                <div class="header-widget-group">

                </div>
            </div>
        </div>
    </header>
    <nav class="navbar-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-content">
                        <ul class="navbar-list">
                            <li class="navbar-item dropdown">
                                <a class="navbar-link dropdown-arrow" href="/berandapromotor">Beranda Promotor</a>
                                <ul class="dropdown-position-list">
                                    <div style="display: flex;">
                                        <div>
                                            <li class="navbar-item dropdown">
                                                <a class="navbar-link" href="/">Beranda Guest</a>
                                            </li>
                                        </div>
                                </ul>
                            </li>
                            <!-- Product Link -->
                            <li class="navbar-item dropdown">
                                <a class="navbar-link dropdown-arrow" href="#">Daftar Promo Anda</a>
                                <ul class="dropdown-position-list">
                                    <div style="display: flex;">
                                        <div>
                                            <li><a href="/promoditerima">Promo Yang diterima</a></li>
                                            <li><a href="/promoditolak">Promo Yang ditolak</a></li>
                                            <li><a href="/promopending">Promo Pending</a></li>
                                            <li><a href="/promoexpired">Promo Expired</a></li>
                                            <li><a href="/limitexpired">Promo Limit Habis</a></li>
                                        </div>
                                        <div style="display: flex;">
                                            <div>

                                            </div>
                                        </div>
                                </ul>

                                <!-- End Link -->

                                {{-- <li class="navbar-item dropdown">
                                <a class="navbar-link dropdown" href="/tentangkami">Tentang Kami</a>

                            </li>
                            <li class="navbar-item dropdown">
                                <a class="navbar-link dropdown" href="/kontak">Kontak Kami</a>
                            </li> --}}

                        </ul>
                        <di class="navbar-info-group">
                            <div class="navbar-info">
                                <a href="/tambahpromo"><button class="btn btn-warning">
                                        <p style="color:white">+ Tambah Promomu</p>
                                    </button></a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </nav>
    <aside class="category-sidebar">
        <div class="category-header">
            <h4 class="category-title"><i class="fas fa-align-left"></i><span>categories</span></h4><button
                class="category-close"><i class="icofont-close"></i></button>
        </div>
        <ul class="category-list">
            <li class="category-item"><a class="category-link dropdown-link" href="#"><i
                        class="flaticon-vegetable"></i><span>vegetables</span></a>
                <ul class="dropdown-list">
                    <li><a href="#">asparagus</a></li>
                    <li><a href="#">broccoli</a></li>
                    <li><a href="#">carrot</a></li>
                </ul>
            </li>
            <li class="category-item"><a class="category-link dropdown-link" href="#"><i
                        class="flaticon-groceries"></i><span>groceries</span></a>
                <ul class="dropdown-list">
                    <li><a href="#">Grains & Bread</a></li>
                    <li><a href="#">Dairy & Eggs</a></li>
                    <li><a href="#">Oil & Fat</a></li>
                </ul>
            </li>
            <li class="category-item"><a class="category-link dropdown-link" href="#"><i
                        class="flaticon-fruit"></i><span>fruits</span></a>
                <ul class="dropdown-list">
                    <li><a href="#">Apple</a></li>
                    <li><a href="#">Orange</a></li>
                    <li><a href="#">Strawberry</a></li>
                </ul>
            </li>
            <li class="category-item"><a class="category-link dropdown-link" href="#"><i
                        class="flaticon-dairy-products"></i><span>dairy farm</span></a>
                <ul class="dropdown-list">
                    <li><a href="#">Egg</a></li>
                    <li><a href="#">milk</a></li>
                    <li><a href="#">butter</a></li>
                </ul>
            </li>
            <li class="category-item"><a class="category-link dropdown-link" href="#"><i
                        class="flaticon-crab"></i><span>sea foods</span></a>
                <ul class="dropdown-list">
                    <li><a href="#">Lobster</a></li>
                    <li><a href="#">Octopus</a></li>
                    <li><a href="#">Shrimp</a></li>
                </ul>
            </li>
            <li class="category-item"><a class="category-link dropdown-link" href="#"><i
                        class="flaticon-salad"></i><span>diet foods</span></a>
                <ul class="dropdown-list">
                    <li><a href="#">Salmon</a></li>
                    <li><a href="#">Potatoes</a></li>
                    <li><a href="#">Greens</a></li>
                </ul>
            </li>
            <li class="category-item"><a class="category-link dropdown-link" href="#"><i
                        class="flaticon-dried-fruit"></i><span>dry foods</span></a>
                <ul class="dropdown-list">
                    <li><a href="#">noodles</a></li>
                    <li><a href="#">Powdered milk</a></li>
                    <li><a href="#">nut & yeast</a></li>
                </ul>
            </li>
            <li class="category-item"><a class="category-link dropdown-link" href="#"><i
                        class="flaticon-fast-food"></i><span>fast foods</span></a>
                <ul class="dropdown-list">
                    <li><a href="#">mango</a></li>
                    <li><a href="#">plumsor</a></li>
                    <li><a href="#">raisins</a></li>
                </ul>
            </li>
            <li class="category-item"><a class="category-link dropdown-link" href="#"><i
                        class="flaticon-cheers"></i><span>drinks</span></a>
                <ul class="dropdown-list">
                    <li><a href="#">Wine</a></li>
                    <li><a href="#">Juice</a></li>
                    <li><a href="#">Water</a></li>
                </ul>
            </li>
            <li class="category-item"><a class="category-link dropdown-link" href="#"><i
                        class="flaticon-beverage"></i><span>coffee</span></a>
                <ul class="dropdown-list">
                    <li><a href="#">Cappuchino</a></li>
                    <li><a href="#">Espresso</a></li>
                    <li><a href="#">Latte</a></li>
                </ul>
            </li>
            <li class="category-item"><a class="category-link dropdown-link" href="#"><i
                        class="flaticon-barbecue"></i><span>meats</span></a>
                <ul class="dropdown-list">
                    <li><a href="#">Meatball</a></li>
                    <li><a href="#">Sausage</a></li>
                    <li><a href="#">Poultry</a></li>
                </ul>
            </li>
            <li class="category-item"><a class="category-link dropdown-link" href="#"><i
                        class="flaticon-fish"></i><span>fishes</span></a>
                <ul class="dropdown-list">
                    <li><a href="#">Agujjim</a></li>
                    <li><a href="#">saltfish</a></li>
                    <li><a href="#">pazza</a></li>
                </ul>
            </li>
        </ul>
        <div class="category-footer">
            <p>All Rights Reserved by <a href="#">Mironcoder</a></p>
        </div>
    </aside>
    <aside class="cart-sidebar">
        <div class="cart-header">
            <div class="cart-total"><i class="fas fa-shopping-basket"></i><span>total item (5)</span></div><button
                class="cart-close"><i class="icofont-close"></i></button>
        </div>
        <ul class="cart-list">
            <li class="cart-item">
                <div class="cart-media"><a href="#"><img src="images/product/01.jpg"
                            alt="product"></a><button class="cart-delete"><i class="far fa-trash-alt"></i></button>
                </div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="product-single.html">existing product name</a></h6>
                        <p>Unit Price - $8.75</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action"><button class="action-minus" title="Quantity Minus"><i
                                    class="icofont-minus"></i></button><input class="action-input"
                                title="Quantity Number" type="text" name="quantity" value="1"><button
                                class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button></div>
                        <h6>$56.98</h6>
                    </div>
                </div>
            </li>
            <li class="cart-item">
                <div class="cart-media"><a href="#"><img src="images/product/02.jpg"
                            alt="product"></a><button class="cart-delete"><i class="far fa-trash-alt"></i></button>
                </div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="product-single.html">existing product name</a></h6>
                        <p>Unit Price - $8.75</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action"><button class="action-minus" title="Quantity Minus"><i
                                    class="icofont-minus"></i></button><input class="action-input"
                                title="Quantity Number" type="text" name="quantity" value="1"><button
                                class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button></div>
                        <h6>$56.98</h6>
                    </div>
                </div>
            </li>
            <li class="cart-item">
                <div class="cart-media"><a href="#"><img src="images/product/03.jpg"
                            alt="product"></a><button class="cart-delete"><i class="far fa-trash-alt"></i></button>
                </div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="product-single.html">existing product name</a></h6>
                        <p>Unit Price - $8.75</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action"><button class="action-minus" title="Quantity Minus"><i
                                    class="icofont-minus"></i></button><input class="action-input"
                                title="Quantity Number" type="text" name="quantity" value="1"><button
                                class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button></div>
                        <h6>$56.98</h6>
                    </div>
                </div>
            </li>
            <li class="cart-item">
                <div class="cart-media"><a href="#"><img src="images/product/04.jpg"
                            alt="product"></a><button class="cart-delete"><i class="far fa-trash-alt"></i></button>
                </div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="product-single.html">existing product name</a></h6>
                        <p>Unit Price - $8.75</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action"><button class="action-minus" title="Quantity Minus"><i
                                    class="icofont-minus"></i></button><input class="action-input"
                                title="Quantity Number" type="text" name="quantity" value="1"><button
                                class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button></div>
                        <h6>$56.98</h6>
                    </div>
                </div>
            </li>
            <li class="cart-item">
                <div class="cart-media"><a href="#"><img src="images/product/05.jpg"
                            alt="product"></a><button class="cart-delete"><i class="far fa-trash-alt"></i></button>
                </div>
                <div class="cart-info-group">
                    <div class="cart-info">
                        <h6><a href="product-single.html">existing product name</a></h6>
                        <p>Unit Price - $8.75</p>
                    </div>
                    <div class="cart-action-group">
                        <div class="product-action"><button class="action-minus" title="Quantity Minus"><i
                                    class="icofont-minus"></i></button><input class="action-input"
                                title="Quantity Number" type="text" name="quantity" value="1"><button
                                class="action-plus" title="Quantity Plus"><i class="icofont-plus"></i></button></div>
                        <h6>$56.98</h6>
                    </div>
                </div>
            </li>
        </ul>
        <div class="cart-footer"><button class="coupon-btn">Do you have a coupon code?</button>
            <form class="coupon-form"><input type="text" placeholder="Enter your coupon code"><button
                    type="submit"><span>apply</span></button></form><a class="cart-checkout-btn"
                href="checkout.html"><span class="checkout-label">Proceed to Checkout</span><span
                    class="checkout-price">$369.78</span></a>
        </div>
    </aside>
    <aside class="nav-sidebar">
        <div class="nav-header"><a href="#"><img src="images/logo.png" alt="logo"></a><button
                class="nav-close"><i class="icofont-close"></i></button></div>
        <div class="nav-content">
            <div class="nav-btn"><a href="login.html" class="btn btn-inline"><i
                        class="fa fa-unlock-alt"></i><span>join
                        here</span></a></div>
            <div class="nav-select-group">
                <div class="nav-select"><i class="icofont-world"></i><select class="select">
                        <option value="english" selected>English</option>
                        <option value="bangali">Bangali</option>
                        <option value="arabic">Arabic</option>
                    </select></div>
                <div class="nav-select"><i class="icofont-money"></i><select class="select">
                        <option value="english" selected>Doller</option>
                        <option value="bangali">Pound</option>
                        <option value="arabic">Taka</option>
                    </select></div>
            </div>
            <ul class="nav-list">
                <li><a class="nav-link dropdown-link" href="#"><i class="icofont-home"></i>Home</a>
                    <ul class="dropdown-list">
                        <li><a href="home-grid.html">Home grid</a></li>
                        <li><a href="index.html">Home index</a></li>
                        <li><a href="home-classic.html">Home classic</a></li>
                        <li><a href="home-standard.html">Home standard</a></li>
                        <li><a href="home-category.html">Home category</a></li>
                    </ul>
                </li>
                <li><a class="nav-link dropdown-link" href="#"><i class="icofont-food-cart"></i>shop</a>
                    <ul class="dropdown-list">
                        <li><a href="shop-5column.html">shop 5 column</a></li>
                        <li><a href="shop-4column.html">shop 4 column</a></li>
                        <li><a href="shop-3column.html">shop 3 column</a></li>
                        <li><a href="shop-2column.html">shop 2 column</a></li>
                        <li><a href="shop-1column.html">shop 1 column</a></li>
                    </ul>
                </li>
                <li><a class="nav-link dropdown-link" href="#"><i class="icofont-page"></i>product</a>
                    <ul class="dropdown-list">
                        <li><a href="product-tab.html">product tab</a></li>
                        <li><a href="product-grid.html">product grid</a></li>
                        <li><a href="product-video.html">product video</a></li>
                        <li><a href="product-simple.html">product simple</a></li>
                    </ul>
                </li>
                <li><a class="nav-link dropdown-link" href="#"><i class="icofont-bag-alt"></i>my account</a>
                    <ul class="dropdown-list">
                        <li><a href="profile.html">profile</a></li>
                        <li><a href="wallet.html">wallet</a></li>
                        <li><a href="wishlist.html">wishlist</a></li>
                        <li><a href="compare.html">compare</a></li>
                        <li><a href="checkout.html">checkout</a></li>
                        <li><a href="orderlist.html">order history</a></li>
                        <li><a href="invoice.html">order invoice</a></li>
                        <li><a href="email-template.html">email template</a></li>
                    </ul>
                </li>
                <li><a class="nav-link dropdown-link" href="#"><i class="icofont-lock"></i>authentic</a>
                    <ul class="dropdown-list">
                        <li><a href="login.html">login</a></li>
                        <li><a href="register.html">register</a></li>
                        <li><a href="reset-password.html">reset password</a></li>
                        <li><a href="change-password.html">change password</a></li>
                    </ul>
                </li>
                <li><a class="nav-link dropdown-link" href="#"><i class="icofont-book-alt"></i>blogs</a>
                    <ul class="dropdown-list">
                        <li><a href="blog-grid.html">blog grid</a></li>
                        <li><a href="blog-standard.html">blog standard</a></li>
                        <li><a href="blog-details.html">blog details</a></li>
                        <li><a href="blog-author.html">blog author</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="offer.html"><i class="icofont-sale-discount"></i>offers</a></li>
                <li><a class="nav-link" href="about.html"><i class="icofont-info-circle"></i>about us</a></li>
                <li><a class="nav-link" href="faq.html"><i class="icofont-support-faq"></i>need help</a></li>
                <li><a class="nav-link" href="contact.html"><i class="icofont-contacts"></i>contact us</a></li>
                <li><a class="nav-link" href="privacy.html"><i class="icofont-warning"></i>privacy policy</a></li>
                <li><a class="nav-link" href="coming-soon.html"><i class="icofont-options"></i>coming soon</a></li>
                <li><a class="nav-link" href="error.html"><i class="icofont-ui-block"></i>404 error</a></li>
                <li><a class="nav-link" href="login.html"><i class="icofont-logout"></i>logout</a></li>
            </ul>
            <div class="nav-info-group">
                <div class="nav-info"><i class="icofont-ui-touch-phone"></i>
                    <p><small>call us</small><span>(+880) 183 8288 389</span></p>
                </div>
                <div class="nav-info"><i class="icofont-ui-email"></i>
                    <p><small>email us</small><span>support@example.com</span></p>
                </div>
            </div>
            <div class="nav-footer">
                <p>All Rights Reserved by <a href="#">Mironcoder</a></p>
            </div>
        </div>
    </aside>
    <div class="mobile-menu"><a href="index.html" title="Home Page"><i
                class="fas fa-home"></i><span>Home</span></a><button class="cate-btn" title="Category List"><i
                class="fas fa-list"></i><span>category</span></button><button class="cart-btn" title="Cartlist"><i
                class="fas fa-shopping-basket"></i><span>cartlist</span><sup>9+</sup></button><a href="wishlist.html"
            title="Wishlist"><i class="fas fa-heart"></i><span>wishlist</span><sup>0</sup></a><a href="compare.html"
            title="Compare List"><i class="fas fa-random"></i><span>compare</span><sup>0</sup></a></div>
    <section class="inner-section single-banner"
        style="background: url({{ asset('templatebanner/bannerwebpromosi.jpg') }}) no-repeat center;">
        <div class="container">
            <h2>Daftar Promo Yang Anda Miliki</h2>
        </div>
    </section>
    {{-- <div class="container product-card"
        style="margin-top: -50px; padding: auto; margin-bottom: 50px; text-align: center;">
        <div class="row">
            <div class="col-12 bg-body">
                <h6>Anda Memiliki <strong>3</strong> Promo Yang Dipublikasikan <strong>1</strong> Promo ditolak Dan
                    <strong>1</strong> Promo Dalam Tinjauan Admin
                    (pending), Anda Dapat Membuat Promo Baru</h6>
            </div>
        </div>
    </div> --}}
    <section class="section recent-part">
        <div class="container">
            @php
                $no = 1;
            @endphp
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                @foreach ($data as $promo)
                    @if ($promo->limit == 0)
                        <div class="col">
                            <div class="product-card">
                                <div class="product-label">
                                    <div style="display: flex; align-items: center;">
                                        <p style="margin-left: 50px;"><label class="label-text new"> Berakhir : <br>
                                                {{ \Carbon\Carbon::parse($promo->masapromo)->locale('id')->isoFormat('DD MMMM YYYY') }}</label>
                                        </p>
                                        <button class="dropdown-button" id="dropdown-button-{{ $promo->id }}"
                                            style="margin-left: auto;">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="30"
                                                viewBox="0 96 960 960" width="30">
                                                <circle cx="479.858" cy="576" fill="#F0ECEC"
                                                    r="464" />
                                                <path
                                                    d="M479.858 896Q460 896 446 881.858q-14-14.141-14-34Q432 828 446.142 814q14.141-14 34-14Q500 800 514 814.142q14 14.141 14 34Q528 868 513.858 882q-14.141 14-34 14Zm0-272Q460 624 446 609.858q-14-14.141-14-34Q432 556 446.142 542q14.141-14 34-14Q500 528 514 542.142q14 14.141 14 34Q528 596 513.858 610q-14.141 14-34 14Zm0-272Q460 352 446 337.858q-14-14.141-14-34Q432 284 446.142 270q14.141-14 34-14Q500 256 514 270.142q14 14.141 14 34Q528 324 513.858 338q-14.141 14-34 14Z"
                                                    fill="#33333" />
                                            </svg>
                                        </button>
                                    </div>
                                    <ul class="dropdown-menu" id="dropdown-menu-{{ $promo->id }}">

                                        <li>
                                            <a href="#">
                                                <button class="btn btn-danger deletepromo delete-btn"
                                                    data-id="{{ $promo->id }}"
                                                    data-nama="{{ $promo->namapromo }}" type="button">Hapus</button>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="product-media product-disable">
                                    <a class="product-image" href="/deskripsifoto/{{ $promo->id }}"><img
                                            style="height: 200px; width:200px; margin-right: 15px; margin-left: 15px;"
                                            src="sampul/{{ $promo->sampul }}" alt="product" /></a>
                                    <div class="product-widget"><a title="Lihat Produk"
                                            href="/deskripsifoto/{{ $promo->id }}" class="fas fa-eye"
                                            style="
                                        margin-bottom: 150px;"></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">{{ $promo->namapromo }}</h5>
                                    <h6 class="mb-2">
                                        Status :
                                        @if ($promo->masapromo <= now())
                                            <span class="badge bg-warning text-white">Expired</span>
                                        @elseif ($promo->status == 0)
                                            <span class="badge bg-warning text-dark">Menunggu</span>
                                        @elseif ($promo->status == 2)
                                            <span class="badge bg-danger text-white">Ditolak</span>
                                        @elseif ($promo->limit == 0)
                                            <span class="badge bg-warning text-dark">Limit Habis</span>
                                        @else
                                            <span class="badge bg-success text-white">Diterima</span>
                                        @endif
                                    </h6>
                                </div>

                            </div>
                        </div>
                    @elseif ($promo->masapromo <= now())
                        <div class="col">
                            <div class="product-card">
                                <div class="product-label">
                                    <div style="display: flex; align-items: center;">
                                        <p style="margin-left: 50px;"><label class="label-text new"> Berakhir : <br>
                                                {{ \Carbon\Carbon::parse($promo->masapromo)->locale('id')->isoFormat('DD MMMM YYYY') }}</label>
                                        </p>
                                        <button class="dropdown-button" id="dropdown-button-{{ $promo->id }}"
                                            style="margin-left: auto;">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="30"
                                                viewBox="0 96 960 960" width="30">
                                                <circle cx="479.858" cy="576" fill="#F0ECEC"
                                                    r="464" />
                                                <path
                                                    d="M479.858 896Q460 896 446 881.858q-14-14.141-14-34Q432 828 446.142 814q14.141-14 34-14Q500 800 514 814.142q14 14.141 14 34Q528 868 513.858 882q-14.141 14-34 14Zm0-272Q460 624 446 609.858q-14-14.141-14-34Q432 556 446.142 542q14.141-14 34-14Q500 528 514 542.142q14 14.141 14 34Q528 596 513.858 610q-14.141 14-34 14Zm0-272Q460 352 446 337.858q-14-14.141-14-34Q432 284 446.142 270q14.141-14 34-14Q500 256 514 270.142q14 14.141 14 34Q528 324 513.858 338q-14.141 14-34 14Z"
                                                    fill="#33333" />
                                            </svg>
                                        </button>
                                    </div>
                                    <ul class="dropdown-menu" id="dropdown-menu-{{ $promo->id }}">

                                        <li>
                                            <a href="#">
                                                <button class="btn btn-danger deletepromo delete-btn"
                                                    data-id="{{ $promo->id }}"
                                                    data-nama="{{ $promo->namapromo }}" type="button">Hapus</button>
                                            </a>
                                        </li>
                                    </ul>


                                </div>
                                <div class="product-media product-disable">
                                    <a class="product-image" href="/deskripsifoto/{{ $promo->id }}"><img
                                            style="height: 200px; width:200px; margin-right: 15px; margin-left: 15px;"
                                            src="sampul/{{ $promo->sampul }}" alt="product" /></a>
                                    <div class="product-widget"><a title="Lihat Produk"
                                            href="/deskripsifoto/{{ $promo->id }}" class="fas fa-eye"
                                            style="
                                    margin-bottom: 150px;"></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">{{ $promo->namapromo }}</h5>
                                    <h6 class="mb-2">
                                        Status :
                                        @if ($promo->masapromo <= now())
                                            <span class="badge bg-warning text-white">Expired</span>
                                        @elseif ($promo->status == 0)
                                            <span class="badge bg-warning text-dark">Menunggu</span>
                                        @elseif ($promo->status == 2)
                                            <span class="badge bg-danger text-white">Ditolak</span>
                                        @elseif ($promo->limit == 0)
                                            <span class="badge bg-warning text-dark">Limit Habis</span>
                                        @else
                                            <span class="badge bg-success text-white">Diterima</span>
                                        @endif
                                    </h6>
                                </div>

                            </div>
                        </div>
                    @else
                        <div class="col">
                            <div class="product-card">
                                <div class="product-media">
                                    <div class="product-label">
                                        <div style="display: flex; align-items: center;">
                                            <p style="margin-left: 50px;"><label class="label-text new"> Berakhir : <br>
                                                    {{ \Carbon\Carbon::parse($promo->masapromo)->locale('id')->isoFormat('DD MMMM YYYY') }}</label>
                                            </p>
                                            <button class="dropdown-button" id="dropdown-button-{{ $promo->id }}"
                                                style="margin-left: auto;">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="30"
                                                    viewBox="0 96 960 960" width="30">
                                                    <circle cx="479.858" cy="576" fill="#F0ECEC"
                                                        r="464" />
                                                    <path
                                                        d="M479.858 896Q460 896 446 881.858q-14-14.141-14-34Q432 828 446.142 814q14.141-14 34-14Q500 800 514 814.142q14 14.141 14 34Q528 868 513.858 882q-14.141 14-34 14Zm0-272Q460 624 446 609.858q-14-14.141-14-34Q432 556 446.142 542q14.141-14 34-14Q500 528 514 542.142q14 14.141 14 34Q528 596 513.858 610q-14.141 14-34 14Zm0-272Q460 352 446 337.858q-14-14.141-14-34Q432 284 446.142 270q14.141-14 34-14Q500 256 514 270.142q14 14.141 14 34Q528 324 513.858 338q-14.141 14-34 14Z"
                                                        fill="#33333" />
                                                </svg>
                                            </button>
                                        </div>
                                        <ul class="dropdown-menu" id="dropdown-menu-{{ $promo->id }}">
                                            <li>
                                                <a href="/editpromo/{{ $promo->id }}">
                                                        <p style="color:black; margin-left:5px; font-size:18px;">Edit</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-id="{{ $promo->id }}"
                                                    data-nama="{{ $promo->namapromo }}" class="deletepromo">
                                                    <p style="color:black; margin-left:5px; font-size:18px;">Hapus</p>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                    <a class="product-image" href="/deskripsifoto/{{ $promo->id }}"><img
                                            style="height: 200px; width:200px; margin-right: 15px; margin-left: 15px;"
                                            src="sampul/{{ $promo->sampul }}" alt="product" /></a>
                                    <div class="product-widget"><a title="Lihat Produk"
                                            href="/deskripsifoto/{{ $promo->id }}" class="fas fa-eye"
                                            style="
                                                margin-bottom: 150px;"></a>
                                    </div>
                                    <div class="product-content">
                                        <h5 class="product-name">{{ $promo->namapromo }}</h5>
                                        <h6 class="mb-2">
                                            Status :
                                            @if ($promo->masapromo <= now())
                                                <span class="badge bg-warning text-white">Expired</span>
                                            @elseif ($promo->status == 0)
                                                <span class="badge bg-warning text-dark">Menunggu</span>
                                            @elseif ($promo->status == 2)
                                                <span class="badge bg-danger text-white">Ditolak</span>
                                            @elseif ($promo->limit == 0)
                                                <span class="badge bg-warning text-dark">Limit Habis</span>
                                            @else
                                                <span class="badge bg-success text-white">Diterima</span>
                                            @endif
                                        </h6>
                                        <svg style="color: grey" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-eye-fill"
                                            viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg> {{ $promo->views }}
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
    </section>



    @foreach ($footer as $f)
    <footer class="footer-part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-4">
                    <div class="footer-widget">
                        <a class="footer-logo" href="#"><img
                                src="{{ asset('logo/' . $f->logowebsite) }}" alt="logo" /></a>
                        <p class="footer-desc">{{ $f->deskripsiwebsite }}</p>
                        <ul class="footer-social">
                            <li><a class="icofont-facebook" href="{{ $f->facebook }}"></a></li>
                            <li><a class="icofont-twitter" href="{{ $f->twitter }}"></a></li>
                            <li><a class="icofont-instagram" href="{{ $f->ig }}"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="footer-widget contact">
                        <h3 class="footer-title">Kontak kami</h3>
                        <ul class="footer-contact">
                            <li>
                                <i class="icofont-ui-email"></i>
                                <p><span>{{ $f->email }}</span></p>
                            </li>
                            <li>
                                <i class="icofont-ui-touch-phone"></i>
                                <p><span>{{ $f->notelepon }}</span></p>
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                <p>{{ $f->alamat }}</p>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="footer-widget">
                        <h3 class="footer-title">tautan</h3>
                        <div class="footer-links">
                            <ul>
                                @auth
                                <li><a href="/profile">Akun Saya</a></li>
                                    @else
                                    <li><a href="/login">Akun Saya</a></li>
                                @endauth
                                <li><a href="#promo-terbaru">Promo Terbaru</a></li>

                                <li><a href="#promo-unggulan">Promo Unggulan</a></li>
                                <li><a href="#promo-terpopuler">Promo Terpopuper</a></li>
                                <li><a href="#promo-kilat">Promo Kilat</a></li>
                            </ul>
                            <ul>
                                <li><a href="/kontak">Lokasi</a></li>

                                <li><a href="/kontak">Kontak</a></li>

                                <li><a href="/faq">Faq</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom">
                        <p class="footer-copytext">&copy; All Copyrights Reserved by <a href="#">X-CODE
                                TEAM</a></p>
                        <!-- <div class="footer-card">
              <a href="#"><img src="images/payment/jpg/01.jpg" alt="payment" /></a><a href="#"><img
                  src="images/payment/jpg/02.jpg" alt="payment" /></a><a href="#"><img src="images/payment/jpg/03.jpg"
                  alt="payment" /></a><a href="#"><img src="images/payment/jpg/04.jpg" alt="payment" /></a>
            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @endforeach
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/vendor/bootstrap/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/vendor/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/vendor/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/vendor/niceselect/nice-select.min.js') }}"></script>
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/vendor/slickslider/slick.min.js') }}"></script>
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/js/nice-select.js') }}"></script>
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/js/countdown.js') }}"></script>
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/js/accordion.js') }}"></script>
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/js/venobox.js') }}"></script>
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/js/slick.js') }}"></script>
    <script src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/js/main.js') }}"></script>
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
    {{-- <script>
        $('.delete').click(function() {
            var siswaid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            swal(" Maaf ", " Data masih digunakan ");
        });
    </script> --}}
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
                cancelButtonColor: '#   d33',
                confirmButtonText: 'Iya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/deletepromo/" + siswaid + ""
                    Swal.fire(
                        'Deleted!',
                        'Data berhasil di hapus.',
                        'success'
                    )
                }
            })
        });
    </script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
    <script>
        @if (Session::has('gagal'))
            toastr.success("{{ Session::get('gagal') }}")
        @endif
    </script>
    <script>
        $(document).ready(function() {
            $(".dropdown-button").click(function() {
                var id = $(this).attr("id").split("-")[2]; // ambil id dari tombol yang diklik
                $("#dropdown-menu-" + id)
                    .toggle(); // tampilkan atau sembunyikan dropdown-menu dengan id yang sesuai
                $(".dropdown-menu").not("#dropdown-menu-" + id)
                    .hide(); // sembunyikan dropdown-menu yang lain
            });
        });
    </script>
</body>
<!-- Mirrored from mironmahmud.com/greeny/assets/ltr/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 06:53:02 GMT -->

</html>
