<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from mironmahmud.com/greeny/assets/ltr/product-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 06:52:56 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="template" content="greeny">
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template">
    <meta name="keywords"
        content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>Deskripsi {{ $promo->namapromo }}</title>
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
    <link rel="stylesheet" href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/css/profile.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/css/product-details.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
                <div class="header-media-group">
                    <button class="header-user"><img
                            src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/user.png') }}"
                            alt="user" /></button><a href="home-category.html"><img
                            src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/removepromo.png') }}"
                            alt="logo" /></a><button class="header-src"><i class="fas fa-search"></i></button>
                </div>
                <a href="home-category.html" class="header-logo"><img style="height:80px;"
                        src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/removepromo.png') }}"
                        alt="logo" /></a>
                <form action="{{ url('filter') }}" method="GET" class="header-form">
                    <input type="search" name="cari" value="{{ Request::get('cari') }}"
                        placeholder="Cari sesuatu..." /><button type="submit"><i class="fas fa-search"></i></button>
                </form>
                @guest
                    <a href="/login" class="header-widget" title="Akun Saya">
                        <img src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/user.png') }}"
                            alt="user" />
                    </a>
                @else
                    @if (Auth::user()->fotoprofil)
                        <a href="/profile" class="header-widget ms-auto" title="Akun Saya">
                            <img style="height:50px; width:50px;"
                                src="{{ asset('fotoprofil/' . Auth::user()->fotoprofil) }}" alt="user" />
                        </a>
                    @else
                        <a href="/profile" class="header-widget" title="Akun Saya">
                            <img src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/user.png') }}"
                                alt="user" />
                        </a>
                    @endif
                @endguest

                <div class="header-widget-group">

                </div>
            </div>
        </div>
    </header>
    @if (Auth::check() && Auth::user()->role == 'promotor')
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
                                <li class="navbar-item dropdown-megamenu">
                                    <a class="navbar-link dropdown-arrow" href="#">Kategori</a>
                                    <div class="megamenu">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">Halaman Kategori</h5>
                                                        <ul class="megamenu-list row">
                                                            @foreach ($data1 as $kategori => $row)
                                                                <li class="col-3"><a
                                                                        href="/produksimple/{{ $row->kategori }}/{{ $row->id }}">{{ $row->kategori }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Link -->

                                <li class="navbar-item dropdown">
                                    <a class="navbar-link dropdown" href="about.html">Tentang Kami</a>

                                </li>
                                <li class="navbar-item dropdown">
                                    <a class="navbar-link dropdown" href="contact.html">Kontak Kami</a>

                                </li>



                            </ul>
                            <div class="navbar-info-group">
                                <div class="navbar-info">
                                    <i class="icofont-ui-touch-phone"></i>
                                    <p><small>hubungi kami</small><span>(+62) 55 6778 9098</span></p>
                                </div>
                                <div class="navbar-info">
                                    <i class="icofont-ui-email"></i>
                                    <p><small>email kami</small><span>xcode@gmail.com</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    @else
        <nav class="navbar-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navbar-content">
                            <ul class="navbar-list">
                                <li class="navbar-item dropdown">
                                    <a class="navbar-link" href="/">Beranda</a>
                                </li>
                                <!-- Product Link -->
                                <li class="navbar-item dropdown-megamenu">
                                    <a class="navbar-link dropdown-arrow" href="#">Kategori</a>
                                    <div class="megamenu">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="megamenu-wrap">
                                                        <h5 class="megamenu-title">Halaman Kategori</h5>
                                                        <ul class="megamenu-list row">
                                                            @foreach ($data1 as $kategori => $row)
                                                                <li class="col-3"><a
                                                                        href="/produksimple/{{ $row->kategori }}/{{ $row->id }}">{{ $row->kategori }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Link -->
                                <li class="navbar-item dropdown">
                                    <a class="navbar-link dropdown" href="/tentangkami">Tentang Kami</a>
                                </li>
                                <li class="navbar-item dropdown">
                                    <a class="navbar-link dropdown" href="/kontak">Kontak Kami</a>
                                </li>
                            </ul>
                            <div class="navbar-info-group">
                                <div class="navbar-info">
                                    <i class="icofont-ui-touch-phone"></i>
                                    <p><small>hubungi kami</small><span>(+62) 55 6778 9098</span></p>
                                </div>
                                <div class="navbar-info">
                                    <i class="icofont-ui-email"></i>
                                    <p><small>email kami</small><span>xcode@gmail.com</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    @endif
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
                <div class="cart-media"><a href="#"><img
                            src="template/mironmahmud.com/greeny/assets/ltr/images/product/01.jpg"
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
                <div class="cart-media"><a href="#"><img
                            src="template/mironmahmud.com/greeny/assets/ltr/images/product/02.jpg"
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
                <div class="cart-media"><a href="#"><img
                            src="template/mironmahmud.com/greeny/assets/ltr/images/product/03.jpg"
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
                <div class="cart-media"><a href="#"><img
                            src="template/mironmahmud.com/greeny/assets/ltr/images/product/04.jpg"
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
                <div class="cart-media"><a href="#"><img
                            src="template/mironmahmud.com/greeny/assets/ltr/images/product/05.jpg"
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
        <div class="nav-header"><a href="#"><img
                    src="template/mironmahmud.com/greeny/assets/ltr/images/logo.png" alt="logo"></a><button
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

    {{-- modal produk --}}

    <div class="modal fade" id="product-view">
        <div class="modal-dialog">
            <div class="modal-content"><button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
                <div class="product-view">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="view-gallery">

                                <ul class="preview-slider slider-arrow">
                                    <li><img src="images/product/01.jpg" alt="product"></li>

                                </ul>
                                <ul class="thumb-slider">
                                    <li><img src="images/product/01.jpg" alt="product"></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="view-details">
                                <h3 class="view-name"><a href="product-video.html">{{ $promo->namapromo }}</a></h3>
                                <div class="view-meta">
                                    <p>SKU:<span>1234567</span></p>
                                    <p>BRAND:<a href="#">{{ $promo->namamerek }}</a></p>
                                </div>
                                <p class="view-desc">{{ $promo->deskripsipromo }}</p>
                                <div class="view-list-group"><label class="view-list-title">tags:</label>
                                    <ul class="view-tag-list">
                                        @foreach ($data1 as $p)
                                            <li><a href="/produksimple">{{ $p->kategori }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="view-list-group"><label class="view-list-title">Share:</label>
                                    <ul class="view-share-list">
                                        <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                                        <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                                        <li><a href="#" class="icofont-linkedin" title="Linkedin"></a></li>
                                        <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="single-banner inner-section"
        style="background: url({{ asset('templatebanner/bannerwebpromosi.jpg') }}) no-repeat center;">
        <div class="container">
            <h2>Gabung Dalam Promo Kami</h2>
        </div>
    </section>
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="home-category-slider slider-arrow slider-dots">
                            @foreach ($fotoproduk as $data)
                                <a class="slider-card">
                                    <img style="height:560px; width:100%;"
                                        src="{{ asset('fotopromo/' . $data->fotoproduk) }}" alt="fotoproduk" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="product-navigation">
                        <li class="product-nav-prev"><a href="{{ $promo->id - 1 }}"><i
                                    class="icofont-arrow-left"></i>produk
                                sebelumnya <span class="product-nav-popup"><img class="image"
                                        src="{{ asset('sampul/' . $promo->sampul) }}"
                                        alt="product"><small>{{ $promo->fotoproduk }}</small></span></a></li>
                        <li class="product-nav-next"><a href="{{ $promo->id + 1 }}">Produk selanjutnya <i
                                    class="icofont-arrow-right"></i><span class="product-nav-popup"><img
                                        class="image" src="{{ asset('sampul/' . $promo->sampul) }}"
                                        alt="product"><small>{{ $promo->fotoproduk }}</small></span></a></li>
                    </ul>
                    <div class="details-content">
                        <h3 class="details-name">{{ $promo->namapromo }}</h3>
                        <div class="details-meta">

                            <p style="color: red; font-weight: bold; font-size: medium;">Berlaku Hingga :
                                {{ \Carbon\Carbon::parse($promo->masapromo)->locale('id')->isoFormat('DD MMMM YYYY') }}
                            </p>

                        </div>

                        <hr>

                        <div class="view-list-group">
                            <label class="view-list-title">Bagikan :</label>
                            <ul class="view-share-list">
                                <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                                <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                                <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                            </ul>
                        </div>
                        <div class="details-list-group">
                            <label class="details-list-title">Kategori :</label>
                            <ul class="details-tag-list">
                                <li class="details-list-title">{{ $promo->kategoris->kategori }}</li>
                            </ul>
                        </div>
                        <div class="details-list-group">
                            <label class="details-list-title">Deskripsi Promo :</label>
                            <ul class="details-tag-list">
                                <li>
                                    <p class="details-list-title">{{ $promo->deskripsipromo }} </p>
                                </li>
                            </ul>
                        </div>
                        @if (Auth::check() && Auth::user()->role == 'guest' && $promo->used_by_guest)
                            <button type="button" class="btn btn-secondary" disabled>Promo Sudah Digunakan</button>
                        @elseif(Auth::check() && Auth::user()->role == 'guest')
                            <form action="/gunakanpromo/{{ $promo->id }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-warning">Gunakan Promo</button>
                            </form>
                        @else
                            <button type="button" class="btn btn-warning"
                                onclick="toastr.warning('Anda Harus Login Sebagai User Untuk Menggunakan Promo Ini')">Gunakan
                                Promo</button>
                        @endif
                    </div>
                </div>
            </div>
    </section>
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-details-frame">
                        <h3 class="frame-title">Tambahkan Ulasan Anda</h3>
                        <form action="/komentar/{{ $row->id }}" method="post">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="forum_id" value="{{ $promo->id }}">
                                <input type="hidden" name="parent" value="0">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="konten" placeholder="Masukkan Ulasan"></textarea>
                                    </div>
                                </div>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="col-lg-7">
                                            <button type="submit" class="btn btn-warning"><i
                                                    class="icofont-paper-plane"></i> Kirim</button>
                                        </div>
                                        <style>
                                            .icofont-paper-plane {
                                                height: 20px;
                                                width: 20px;
                                                font-size: 20px;
                                            }
                                        </style>
                                    @else
                                        <div class="col-lg-7">
                                            <button type="button" class="btn btn-warning" onclick="submitForm()"><i
                                                    class="icofont-paper-plane"></i> Kirim</button>
                                        </div>
                                    @endauth
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="product-details-frame ">
                        <div style="height: 500px; overflow-y: scroll;">
                            <h3 class="frame-title">
                                Komentar</h3>
                            @foreach ($komentar->filter(function ($row) {
                            return $row->parent == 0;
                            }) as $row)
                            <br>
                                <ul class="review-list">
                                    <li class="review-item">
                                        <div class="review-media"><a class="review-avatar" href="#">
                                                @if ($row->user->fotoprofil == null)
                                                    <img class="user-avatar rounded-circle "
                                                        src="{{ asset('user.png') }}"alt="User Avatar" />
                                                @else
                                                    <img class="user-avatar rounded-circle"
                                                        src="{{ asset('fotoprofil/' . $row->user->fotoprofil) }}"
                                                        alt="User Avatar">
                                                @endif
                                                <h5 class="review-meta"><a href="#">{{ $row->name }}</a>
                                                    <span class="timestamp">{{ \Carbon\Carbon::parse($row->created_at)->locale('id')->isoFormat('DD MMMM YYYY HH:mm:ss') }}</span>
                                                </h5>
                                        </div>

                                        <p class="review-desc">{{ $row->konten }}</p>

                                        <form action="/komentar/{{ $row->id }}" method="post"
                                            style="padding-left:3.5rem">
                                            @csrf
                                            <input type="hidden" name="forum_id" value="{{ $promo->id }}">
                                            <input type="hidden" name="parent" value="{{ $row->id }}">
                                            <div class="col-lg-10">
                                                <div class="form-group" style="display: flex"><input
                                                        class="form-control" name="konten" placeholder="Balas...">
                                                    @if (Route::has('login'))
                                                        @auth
                                                            <div class="button-container">
                                                                <div class="send-button">
                                                                    <button type="submit" class="btn btn-warning"style="display: flex;margin-left:10px;"><i
                                                                            class="fa-solid fa-reply"></i></button>
                                                                </div>
                                            </form>
                                            @auth
                                                {{-- @if ($row->user_id == auth()->user()->id)
                                                    <form action="/deletekomentar/{{ $row->id }}" method="GET">
                                                        <div class="delete-button">
                                                            <button type="submit" class="btn btn-danger"
                                                                style="display: flex">
                                                                <i class="icofont-trash"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                @endif --}}
                                            @endauth
                            </div>
                            <style>
                                .button-container {
                                    display: grid;
                                    grid-template-columns: 1fr 1fr;
                                    grid-gap: 10px;
                                }
                            </style>
                            <style>
                                .icofont-reply {
                                    height: 20px;
                                    width: 20px;
                                    font-size: 20px;
                                }
                            </style>
                        @else
                            <div class="button-container ms-2">
                                <div class="send-button">
                                    <button type="button" class="btn btn-success"
                                        onclick="toastr.error('Anda harus login terlebih dahulu')"><i
                                            class="fa-solid fa-reply"></i></button>
                                </div>
                            </div>
                            <style>
                                .button-container {
                                    display: grid;
                                    grid-template-columns: 1fr 1fr;
                                    grid-gap: 10px;
                                }
                            </style>

                        @endauth
                        @endif
                    </div>

                </div>
                @foreach ($row->childs as $child)
                    <div class="review-media" style="margin-left: 50px;"><a class="review-avatar" href="#">
                            @if ($row->user->fotoprofil == null)
                                <img class="user-avatar rounded-circle "
                                    src="{{ asset('user.png') }}"alt="User Avatar" />
                            @else
                                <img class="user-avatar rounded-circle"
                                    src="{{ asset('fotoprofil/' . $row->user->fotoprofil) }}" alt="User Avatar">
                            @endif
                            <h5 class="review-meta"><a href="#">{{ $child->name }}</a><span
                                    class="timestamp">{{ \Carbon\Carbon::parse($child->created_at)->locale('id')->isoFormat('DD MMMM YYYY HH:mm:ss') }}
                                </span></h5>
                    </div>
                    <p class="review-desc" style="margin-left: 50px;">{{ $child->konten }}</p>
                    {{-- <form method="post" action="/komentar/{{ $child->id }}">
                        @csrf

                        <input type="hidden" name="forum_id" value="{{ $child->id }}">
                        <input type="hidden" name="parent" value="{{ $child->id }}">
                        <div class="col-lg-9">
                            <div class="form-group"><input class="form-control" name="konten"
                                    placeholder="Balas..."></div>
                        </div> --}}
                        @if (Route::has('login'))
                            @auth

                                {{-- <div class="button-container">
                                    <div class="send-button">
                                        <button type="submit"class="btn btn-warning" style="display: flex"><i
                                                class="icofont-reply"></i>
                                            Balas</button>
                                    </div>
                                </form> --}}
                                {{-- @if ($row->user_id == auth()->user()->id)
                                <form action="/deletekomentar/{{ $row->id }}" method="GET">
                                    <div class="delete-button" style="margin-left: 50px;">
                                        <button type="submit" class="btn btn-danger"
                                            style="display: flex">
                                            <i class="icofont-trash"></i>
                                        </button>
                                    </div>
                                </form>
                            @endif --}}

                                <style>
                                    .button-container {
                                        display: grid;
                                        grid-template-columns: 1fr 1fr;
                                        grid-gap: 10px;
                                    }
                                </style>

                            @else
                                <a href="/login">
                                    <div class="button-container">
                                        <div class="send-button">
                                            <button type="submit"class="btn btn-warning" style="display: flex"><i
                                                    class="icofont-reply"></i> Balas</button>
                                        </div>

                                        <form action="/deletekomentar/{{ $child->id }}" method="GET">
                                            <div class="delete-button">
                                                <button type="submit" class="btn btn-danger" style="display: flex">
                                                    <i class="icofont-trash"></i> Hapus
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <style>
                                        .button-container {
                                            display: grid;
                                            grid-template-columns: 1fr 1fr;
                                            grid-gap: 10px;
                                        }
                                    </style>

                                @endauth
                        @endif

                    {{-- @foreach ($child->childs as $child2)
                        <div class="review-media"><a class="review-avatar" href="#">
                                <img src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/user.png') }}"
                                    alt="user" />
                                <h5 class="review-meta"><a href="#">{{ $child2->name }}</a><span
                                        class="timestamp">{{ $child2->created_at }}</span>
                                </h5>
                        </div>
                        <p class="review-desc">{{ $child2->konten }}</p>
                        @csrf
                        <input type="hidden" name="forum_id" value="{{ $child2->id }}">
                        <input type="hidden" name="parent" value="{{ $child2->id }}">
                        <div class="col-lg-9">
                            <div class="form-group"><input class="form-control" name="konten"
                                    placeholder="Balas..."></div>
                        </div>
                        <div class="button-container">
                            <div class="send-button">
                                <button type="submit"class="btn btn-warning" style="display: flex"><i
                                        class="icofont-reply"></i>
                                    Balas</button>
                            </div>
                            <form action="/deletekomentar/{{ $child2->id }}" method="GET">
                                <div class="delete-button">
                                    <button type="submit" class="btn btn-danger" style="display: flex">
                                        <i class="icofont-trash"></i> Hapus
                                    </button>
                                </div>
                            </form>
                        </div>


                        <style>
                            .button-container {
                                display: grid;
                                grid-template-columns: 1fr 1fr;
                                grid-gap: 10px;
                            }
                        </style>
                        <br>
                    @endforeach --}}
                @endforeach
                </li>
                </ul>
                @endforeach
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-heading">
                        <h2>Terkait Promo {{ $promo->kategoris->kategori }}</h2>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                @foreach ($apa as $d)
                    <div class="col">
                        <div class="product-card">
                            <div class="product-media">
                                <button class="product-wish wish"><i class="fas fa-heart"></i></button><a
                                    class="product-image" href="{{ $d->id }}"><img
                                        src="{{ asset('sampul/' . $d->sampul) }}" alt="product"
                                        style="height: 200px; width:200px; margin-right: 50px;"></a>
                                {{-- <div class="product-widget"><a title="Product View" href="#"
                                        class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                                </div> --}}
                            </div>
                            <div class="product-content">

                                <h6 class="product-name"><a href="{{ $d->id }}">{{ $d->namapromo }}</a>
                                </h6>
                                <p style="color: red; font-weight:500;">Berakhir :
                                    {{ \Carbon\Carbon::parse($d->masapromo)->locale('id')->isoFormat('DD MMMM YYYY') }}
                                </p>


                                <div class="product-action"><button class="action-minus" title="Quantity Minus"><i
                                            class="icofont-minus"></i></button><input class="action-input"
                                        title="Quantity Number" type="text" name="quantity"
                                        value="1"><button class="action-plus" title="Quantity Plus"><i
                                            class="icofont-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-btn-25"><a href="/filter" class="btn btn-outline"><i
                                class="fas fa-eye"></i><span>melihat semua yang terkait</span></a></div>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer-part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-4">
                    <div class="footer-widget">
                        <a class="footer-logo" href="#"><img
                                src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/removepromo.png') }}"
                                alt="logo" /></a>
                        <p class="footer-desc">Adipisci asperiores ipsum ipsa repellat consequatur repudiandae quisquam
                            assumenda
                            dolor perspiciatis sit ipsum dolor amet.</p>
                        <ul class="footer-social">
                            <li><a class="icofont-facebook" href="#"></a></li>
                            <li><a class="icofont-twitter" href="#"></a></li>

                            <li><a class="icofont-instagram" href="#"></a></li>
                            <li><a class="icofont-pinterest" href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="footer-widget contact">
                        <h3 class="footer-title">kontak kami</h3>
                        <ul class="footer-contact">
                            <li>
                                <i class="icofont-ui-email"></i>
                                <p><span>support@example.com</span><span>carrer@example.com</span></p>
                            </li>
                            <li>
                                <i class="icofont-ui-touch-phone"></i>
                                <p><span>+120 279 532 13</span><span>+120 279 532 14</span></p>
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                <p>1Hd- 50, 010 Avenue, NY 90001 United States</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="footer-widget">
                        <h3 class="footer-title">tautan</h3>
                        <div class="footer-links">
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Order Tracking</a></li>
                                <li><a href="#">Best Seller</a></li>
                                <li><a href="#">New Arrivals</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Location</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Carrer</a></li>
                                <li><a href="#">Faq</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom">
                        <p class="footer-copytext">&copy; All Copyrights Reserved by <a href="#">x-code</a></p>
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

    <script>
        function submitForm() {
            toastr.error('Anda harus login terlebih dahulu');
            setTimeout(function() {
                location.reload();
            }, 1000);
        }
    </script>

    @if (session('success'))
        <script>
            toastr.success('{{ session('success') }}');
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error('{{ session('error') }}');
        </script>
    @endif

    <script>
        @if (session('success'))
            toastr.success('{{ session('success') }}')
        @endif

        @if (session('error'))
            toastr.error('{{ session('error') }}')
        @endif
    </script>

    <script>
        // Inisialisasi toastr
        toastr.options = {
            "positionClass": "toast-top-center",
            "closeButton": true,
            "progressBar": true,
        };

        // Tambahkan event listener pada tombol 'Gunakan Promo'
        document.querySelector('.btn-warning').addEventListener('click', function() {
            // Mencegah default behavior button ketika diklik
            event.preventDefault();

            // Jika user belum login
            @if (Auth::guest())
                toastr.warning('Anda harus login sebagai tamu untuk menggunakan promo ini');
            @endif
        });
    </script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>
<!-- Mirrored from mironmahmud.com/greeny/assets/ltr/product-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 06:52:56 GMT -->

</html>


<DESKRIPSIFOTO class="BLADE PHP">
    <!DOCTYPE html>
<html lang="en">
<!-- Mirrored from mironmahmud.com/greeny/assets/ltr/product-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 06:52:56 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="template" content="greeny">
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template">
    <meta name="keywords"
        content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>Deskripsi {{ $promo->namapromo }}</title>
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
    <link rel="stylesheet" href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/css/profile.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/css/product-details.css') }}">
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

                        <li><a href="faq.html">butuh bantuan</a></li>
                        <li><a href="contact.html">kontak kami</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header class="header-part">
        <div class="container">
            <div class="header-content">
                <div class="header-media-group">
                    <button class="header-user"><img
                            src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/user.png') }}"
                            alt="user" /></button><a href="home-category.html"><img
                            src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/removepromo.png') }}"
                            alt="logo" /></a><button class="header-src"><i class="fas fa-search"></i></button>
                </div>
                <a href="home-category.html" class="header-logo"><img style="height:80px;"
                        src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/removepromo.png') }}"
                        alt="logo" /></a>
                <form class="header-form">
                    <input type="text" placeholder="Cari sesuatu..." /><button><i class="fas fa-search"></i></button>
                </form>
                @if (Auth::check() && Auth::user()->fotoprofil)
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
                                <a class="navbar-link" href="/berandapromotor">Beranda</a>
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
                            <li class="navbar-item dropdown">
                                <a class="navbar-link dropdown" href="/tentangkami">Tentang Kami</a>

                            </li>
                            <li class="navbar-item dropdown">
                                <a class="navbar-link dropdown" href="/kontak">Kontak Kami</a>
                            </li>
                        </ul>
                        <div class="navbar-info-group">
                            <div class="navbar-info">
                                <i class="icofont-ui-touch-phone"></i>
                                <p><small>hubungi kami</small><span>(+62) 55 6778 9098</span></p>
                            </div>
                            <div class="navbar-info">
                                <i class="icofont-ui-email"></i>
                                <p><small>email kami</small><span>xcode@gmail.com</span></p>
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
                <div class="cart-media"><a href="#"><img
                            src="template/mironmahmud.com/greeny/assets/ltr/images/product/01.jpg"
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
                <div class="cart-media"><a href="#"><img
                            src="template/mironmahmud.com/greeny/assets/ltr/images/product/02.jpg"
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
                <div class="cart-media"><a href="#"><img
                            src="template/mironmahmud.com/greeny/assets/ltr/images/product/03.jpg"
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
                <div class="cart-media"><a href="#"><img
                            src="template/mironmahmud.com/greeny/assets/ltr/images/product/04.jpg"
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
                <div class="cart-media"><a href="#"><img
                            src="template/mironmahmud.com/greeny/assets/ltr/images/product/05.jpg"
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
        <div class="nav-header"><a href="#"><img
                    src="template/mironmahmud.com/greeny/assets/ltr/images/logo.png" alt="logo"></a><button
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
    <div class="modal fade" id="product-view">
        <div class="modal-dialog">
            <div class="modal-content"><button class="modal-close icofont-close" data-bs-dismiss="modal"></button>
                <div class="product-view">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="view-gallery">
                                <div class="view-label-group"><label class="view-label new">new</label><label
                                        class="view-label off">-10%</label></div>
                                <ul class="preview-slider slider-arrow">
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                </ul>
                                <ul class="thumb-slider">
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                    <li><img src="images/product/01.jpg" alt="product"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="view-details">
                                <h3 class="view-name"><a href="product-video.html">existing product name</a></h3>
                                <div class="view-meta">
                                    <p>SKU:<span>1234567</span></p>
                                    <p>BRAND:<a href="#">radhuni</a></p>
                                </div>
                                <div class="view-rating"><i class="active icofont-star"></i><i
                                        class="active icofont-star"></i><i class="active icofont-star"></i><i
                                        class="active icofont-star"></i><i class="icofont-star"></i><a
                                        href="product-video.html">(3 reviews)</a></div>
                                <h3 class="view-price"><del>$38.00</del><span>$24.00<small>/per kilo</small></span>
                                </h3>
                                <p class="view-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit non
                                    tempora
                                    magni repudiandae sint suscipit tempore quis maxime explicabo veniam eos
                                    reprehenderit fuga</p>
                                <div class="view-list-group"><label class="view-list-title">tags:</label>
                                    <ul class="view-tag-list">
                                        <li><a href="#">organic</a></li>
                                        <li><a href="#">vegetable</a></li>
                                        <li><a href="#">chilis</a></li>
                                    </ul>
                                </div>
                                <div class="view-list-group"><label class="view-list-title">Share:</label>
                                    <ul class="view-share-list">
                                        <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                                        <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                                        <li><a href="#" class="icofont-linkedin" title="Linkedin"></a></li>
                                        <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                                    </ul>
                                </div>
                                <div class="view-add-group"><button class="product-add" title="Add to Cart"><i
                                            class="fas fa-shopping-basket"></i><span>add to cart</span></button>
                                    <div class="product-action"><button class="action-minus"
                                            title="Quantity Minus"><i class="icofont-minus"></i></button><input
                                            class="action-input" title="Quantity Number" type="text"
                                            name="quantity" value="1"><button class="action-plus"
                                            title="Quantity Plus"><i class="icofont-plus"></i></button></div>
                                </div>
                                <div class="view-action-group"><a class="view-wish wish" href="#"
                                        title="Add Your Wishlist"><i class="icofont-heart"></i><span>add to
                                            wish</span></a><a class="view-compare" href="compare.html"
                                        title="Compare This Item"><i class="fas fa-random"></i><span>Compare
                                            This</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="single-banner inner-section"
    style="background: url({{ asset('templatebanner/bannerwebpromosi.jpg') }}) no-repeat center;">
        <div class="container">
            <h2>Gabung Dalam Promo Kami</h2>

        </div>
    </section>

    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="home-category-slider slider-arrow slider-dots">
                            @foreach ($fotoproduk as $data)
                            <a class="slider-card">
                                <img style="height:500px;; width:100%;" src="{{ asset('fotopromo/' . $data->fotoproduk) }}" alt="fotoproduk" />
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- <div class="banner-part">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="home-category-slider slider-arrow slider-dots">
                                    @foreach ($fotoproduk as $data)
                                    <a class="banner-card"><img style="height:500px;; width:100%;" src="{{ asset('/fotoproduk/' . $data->fotoproduk) }}}" alt="banner" /></a>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                </div> --}}

                <div class="col-lg-6">
                    <div class="details-content">
                        <div style="height: 400px; overflow-y: scroll;">
                        <h3 class="details-name">{{ $promo->namapromo }}</h3>
                        <div class="details-meta">
                            <p style="color: red; font-weight: bold; font-size: medium;">Berlaku Hingga :
                            {{ \Carbon\Carbon::parse($promo->masapromo)->locale('id')->isoFormat('DD MMMM YYYY') }}
                        </div>
                        <hr>
                        <div class="view-list-group">
                            <label class="view-list-title">Bagikan :</label>
                            <ul class="view-share-list">
                                <li><a href="#" class="icofont-facebook" title="Facebook"></a></li>
                                <li><a href="#" class="icofont-twitter" title="Twitter"></a></li>
                                <li><a href="#" class="icofont-instagram" title="Instagram"></a></li>
                            </ul>
                        </div>
                        <div class="details-list-group">
                            <label class="details-list-title">Kategori :</label>
                            <ul class="details-tag-list">

                                    <li class="details-list-title">{{ $promo->kategoris->kategori }}</li>
                            </ul>
                        </div>
                        <style>
                            .details-list-group {
                                /* Menyusun elemen secara vertikal */
                                display: flex;
                                flex-direction: column;
                                align-items: flex-start;
                            }

                            .details-list-title {
                                /* Mengatur gaya teks pada label */
                                font-weight: bold;
                                margin-bottom: 8px; /* Memberikan margin bawah 8px agar terlihat rapi */
                            }

                            .details-list-group p {
                                /* Mengatur gaya teks pada paragraf */
                                margin: 0; /* Menghapus margin default pada paragraf */
                            }
                        </style>
                           <div class="details-list-group">
                            <label class="details-list-title">Deskripsi Promo :</label>
                            <div id="deskripsiPromo">{!! $promo->deskripsipromo !!}</div> {{-- Tampilkan deskripsi promo --}}
                            @if (mb_strlen($promo->deskripsipromo) > 100) {{-- Jika deskripsi promo lebih dari 250 karakter --}}
                                <span id="showMore" style="cursor:pointer;color:rgb(230, 84, 21);">...Lihat Selengkapnya</span> {{-- Tampilkan link "Lihat Selengkapnya" --}}
                            @endif
                        </div>
                        <script>
                            document.getElementById('showMore').addEventListener('click', function () {
                                document.getElementById('showMore').style.display = 'none'; // Sembunyikan link "Lihat Selengkapnya"
                                document.getElementById('deskripsiPromo').innerHTML = '{!! $promo->deskripsipromo !!}'; // Tampilkan seluruh deskripsi promo
                            });
                        </script>
                        <style>
                            .promo-deskripsi {
                                font-size: 14px;
                                line-height: 1.4;
                            height: 300px; /* set tinggi maksimal konten deskripsi promo */
                            overflow: hidden;
                            text-overflow: ellipsis; /* gunakan ellipsis untuk konten yang terlalu panjang */
                            white-space: nowrap; /* hindari pemisahan kata */
                        }
                        </style>
                        </div>
                    </div>
                        <div class="details-list-group">
                            <label class="details-list-title">Sisa Limit Promo Anda :</label>
                            <p class="details-list-title">{!!$promo->limit!!} </p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <footer class="footer-part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-4">
                    <div class="footer-widget">
                        <a class="footer-logo" href="#"><img
                                src="{{ asset('template/mironmahmud.com/greeny/assets/ltr/images/removepromo.png') }}"
                                alt="logo" /></a>
                        <p class="footer-desc">Adipisci asperiores ipsum ipsa repellat consequatur repudiandae quisquam
                            assumenda
                            dolor perspiciatis sit ipsum dolor amet.</p>
                        <ul class="footer-social">
                            <li><a class="icofont-facebook" href="#"></a></li>
                            <li><a class="icofont-twitter" href="#"></a></li>

                            <li><a class="icofont-instagram" href="#"></a></li>
                            <li><a class="icofont-pinterest" href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="footer-widget contact">
                        <h3 class="footer-title">kontak kami</h3>
                        <ul class="footer-contact">
                            <li>
                                <i class="icofont-ui-email"></i>
                                <p><span>support@example.com</span><span>carrer@example.com</span></p>
                            </li>
                            <li>
                                <i class="icofont-ui-touch-phone"></i>
                                <p><span>+120 279 532 13</span><span>+120 279 532 14</span></p>
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                <p>1Hd- 50, 010 Avenue, NY 90001 United States</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="footer-widget">
                        <h3 class="footer-title">tautan</h3>
                        <div class="footer-links">
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Order Tracking</a></li>
                                <li><a href="#">Best Seller</a></li>
                                <li><a href="#">New Arrivals</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Location</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Carrer</a></li>
                                <li><a href="#">Faq</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom">
                        <p class="footer-copytext">&copy; All Copyrights Reserved by <a href="#">x-code</a></p>
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
</body>
<!-- Mirrored from mironmahmud.com/greeny/assets/ltr/product-simple.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 06:52:56 GMT -->

</html>

</DESKRIPSIFOTO>
