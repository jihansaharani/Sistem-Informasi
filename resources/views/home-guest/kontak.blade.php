<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mironmahmud.com/greeny/assets/ltr/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 06:52:38 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="mironcoder">
    <meta name="email" content="mironcoder@gmail.com">
    <meta name="profile" content="https://themeforest.net/user/mironcoder">
    <meta name="template" content="greeny">
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template">
    <meta name="keywords"
        content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>Kontak - GudangPromo</title>
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
    <link rel="stylesheet" href="{{ asset('template/mironmahmud.com/greeny/assets/ltr/css/contact.css') }}">
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
                            src="{{ 'template/mironmahmud.com/greeny/assets/ltr/images/user.png' }}"
                            alt="user" /></button><a href="home-category.html"><img
                            src="{{ 'template/mironmahmud.com/greeny/assets/ltr/images/removepromo.png' }}"
                            alt="logo" /></a><button class="header-src"><i class="fas fa-search"></i></button>
                </div>
                <a href="home-category.html" class="header-logo"><img style="height:80px;"
                        src="{{ 'template/mironmahmud.com/greeny/assets/ltr/images/removepromo.png' }}"
                        alt="logo" /></a>
                <form class="header-form">
                    <input type="text" placeholder="Cari sesuatu..." /><button><i class="fas fa-search"></i></button>
                </form>
                @guest
                    <a href="/login" class="header-widget" title="My Account">
                        <img src="{{ 'template/mironmahmud.com/greeny/assets/ltr/images/user.png' }}" alt="user" />
                    </a>
                @else
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
                                                            @foreach ($data as $kategori => $row)
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

                            </ul>
                            @foreach ($footer as $navbar)
                            <div class="navbar-info-group">
                                <div class="navbar-info">
                                    <i class="icofont-ui-touch-phone"></i>
                                    <p><small>hubungi kami</small><span>{{$navbar->notelepon }}</span></p>
                                </div>
                                <div class="navbar-info">
                                    <i class="icofont-ui-email"></i>
                                    <p><small>email kami</small><span>{{ $navbar->email }}</span></p>
                                </div>
                            </div>
                            @endforeach

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
                                                            @foreach ($data as $kategori => $row)
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
            <h2>Kontak Kami</h2>

        </div>
    </section>
    @foreach ($footer as $a)
    <section class="inner-section contact-part">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="contact-card"><i class="icofont-location-pin"></i>
                        <h4>Kantor pusat</h4>
                        <p>{{$a->alamat}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact-card active"><i class="icofont-phone"></i>
                        <h4>nomor telepon</h4>
                        <p><a href="#">{{$a->notelepon}}</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact-card"><i class="icofont-email"></i>
                        <h4>email</h4>
                        <p><a href="#">{{$a->email}}</a></p>
                    </div>
                </div>
            </div>
    @endforeach

            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-map"><iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15807.808378572216!2d112.606886!3d-7.900074!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7881c2c4637501%3A0x10433eaf1fb2fb4c!2sHummasoft%20Technology!5e0!3m2!1sid!2sid!4v1676815112431!5m2!1sid!2sid"width="600"
                            height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                </div>
                <div class="col-lg-6">
                    <form class="contact-form" action="storepesan" method="post">
                        @csrf
                        <h4>Sampaikan Pesanmu</h4>
                        <div class="form-group">
                            <div class="form-input-group"><input class="form-control" name="name" type="text"
                                    placeholder="Nama Kamu"><i class="icofont-user-alt-3"></i></div>
                        </div>
                        @error('name')
                            <div class="alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <div class="form-input-group"><input class="form-control" name="email" type="text"
                                    placeholder="Email Kamu"><i class="icofont-email"></i></div>
                        </div>
                        @error('email')
                            <div class="alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <div class="form-input-group"><input class="form-control" name="subjek" type="text"
                                    placeholder="Subjek Mu"><i class="icofont-book-mark"></i></div>
                        </div>
                        @error('subjek')
                            <div class="alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <div class="form-input-group">
                                <textarea class="form-control" name="pesan" placeholder="Pesan Kamu"></textarea><i class="icofont-paragraph"></i>
                            </div>
                            @error('pesan')
                                <div class="alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div><button type="submit" class="form-btn-group"><i
                                class="fas fa-envelope"></i><span>Kirim
                                Pesan</span></button>
                    </form>
                </div>
            </div>

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
</body>


<!-- Mirrored from mironmahmud.com/greeny/assets/ltr/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Feb 2023 06:52:39 GMT -->

</html>
