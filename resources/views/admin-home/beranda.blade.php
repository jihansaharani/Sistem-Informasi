@extends('layout.template')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Beranda</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/beranda"><i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item">Beranda</li>
                            <!-- <li class="breadcrumb-item active">Default</li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid dashboard-default">
            <div class="row">



                <div class="col-sm-6 col-lg-3">
                    <div class="card o-hidden">
                        <div class="card-header pb-0">
                            <div class="d-flex">
                                <div class="flex-grow-1"><a href="bootstrap-basic-table.html">
                                        <p class="square-after f-w-600 header-text-primary">Jumlah Promo<i
                                                class="fa fa-circle"> </i>
                                        </p>
                                        <h4>{{ $promo }} Promo</h4>
                                    </a>

                                </div>
                                <div class="d-flex static-widget">
                                    <svg class="fill-primary" width="48" height="48" viewBox="0 0 48 48"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22.5938 14.1562V17.2278C20.9604 17.8102 19.7812 19.3566 19.7812 21.1875C19.7812 23.5138 21.6737 25.4062 24 25.4062C24.7759 25.4062 25.4062 26.0366 25.4062 26.8125C25.4062 27.5884 24.7759 28.2188 24 28.2188C23.2241 28.2188 22.5938 27.5884 22.5938 26.8125H19.7812C19.7812 28.6434 20.9604 30.1898 22.5938 30.7722V33.8438H25.4062V30.7722C27.0396 30.1898 28.2188 28.6434 28.2188 26.8125C28.2188 24.4862 26.3263 22.5938 24 22.5938C23.2241 22.5938 22.5938 21.9634 22.5938 21.1875C22.5938 20.4116 23.2241 19.7812 24 19.7812C24.7759 19.7812 25.4062 20.4116 25.4062 21.1875H28.2188C28.2188 19.3566 27.0396 17.8102 25.4062 17.2278V14.1562H22.5938Z">
                                        </path>
                                        <path
                                            d="M25.4062 0V11.4859C31.2498 12.1433 35.8642 16.7579 36.5232 22.5938H48C47.2954 10.5189 37.4829 0.704531 25.4062 0Z">
                                        </path>
                                        <path
                                            d="M14.1556 31.8558C12.4237 29.6903 11.3438 26.9823 11.3438 24C11.3438 17.5025 16.283 12.1958 22.5938 11.4859V0C10.0492 0.731813 0 11.2718 0 24C0 30.0952 2.39381 35.6398 6.14897 39.8624L14.1556 31.8558Z">
                                        </path>
                                        <path
                                            d="M47.9977 25.4062H36.5143C35.8044 31.717 30.4977 36.6562 24.0002 36.6562C21.0179 36.6562 18.3099 35.5763 16.1444 33.8444L8.13779 41.851C12.3604 45.6062 17.905 48 24.0002 48C36.7284 48 47.2659 37.9508 47.9977 25.4062Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="progress-widget">
                                <div class="progress sm-progress-bar progress-animate">
                                    <div class="progress-gradient-primary" role="progressbar" style="width: 75%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span
                                            class="animate-circle"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card o-hidden user-widget">
                        <div class="card-header pb-0">
                            <div class="d-flex">
                                <div class="flex-grow-1"><a href="/tabelpromotor">
                                        <p class="square-after f-w-600 header-text-info">Jumlah Promotor<i
                                                class="fa fa-circle"> </i>
                                        </p>
                                        <h4>{{ $data }} Promotor</h4>
                                    </a>

                                </div>
                                <div class="d-flex static-widget">
                                    <svg class="fill-info" width="41" height="46" viewBox="0 0 41 46"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.5245 23.3155C24.0019 23.3152 26.3325 16.8296 26.9426 11.5022C27.6941 4.93936 24.5906 0 17.5245 0C10.4593 0 7.35423 4.93899 8.10639 11.5022C8.71709 16.8296 11.047 23.316 17.5245 23.3155Z">
                                        </path>
                                        <path
                                            d="M31.6878 26.0152C31.8962 26.0152 32.1033 26.0214 32.309 26.0328C32.0007 25.5931 31.6439 25.2053 31.2264 24.8935C29.9817 23.9646 28.3698 23.6598 26.9448 23.0998C26.2511 22.8273 25.6299 22.5567 25.0468 22.2485C23.0787 24.4068 20.5123 25.5359 17.5236 25.5362C14.536 25.5362 11.9697 24.4071 10.0019 22.2485C9.41877 22.5568 8.79747 22.8273 8.10393 23.0998C6.67891 23.6599 5.06703 23.9646 3.82233 24.8935C1.6698 26.5001 1.11351 30.1144 0.676438 32.5797C0.315729 34.6148 0.0734026 36.6917 0.00267388 38.7588C-0.0521202 40.36 0.738448 40.5846 2.07801 41.0679C3.75528 41.6728 5.48712 42.1219 7.23061 42.4901C10.5977 43.2011 14.0684 43.7475 17.5242 43.7719C19.1987 43.76 20.8766 43.6249 22.5446 43.4087C21.3095 41.6193 20.5852 39.4517 20.5852 37.1179C20.5853 30.9957 25.5658 26.0152 31.6878 26.0152Z">
                                        </path>
                                        <path
                                            d="M31.6878 28.2357C26.7825 28.2357 22.8057 32.2126 22.8057 37.1179C22.8057 42.0232 26.7824 46 31.6878 46C36.5932 46 40.57 42.0232 40.57 37.1179C40.57 32.2125 36.5931 28.2357 31.6878 28.2357ZM35.5738 38.6417H33.2118V41.0037C33.2118 41.8453 32.5295 42.5277 31.6879 42.5277C30.8462 42.5277 30.1639 41.8453 30.1639 41.0037V38.6417H27.802C26.9603 38.6417 26.278 37.9595 26.278 37.1177C26.278 36.276 26.9602 35.5937 27.802 35.5937H30.1639V33.2318C30.1639 32.3901 30.8462 31.7078 31.6879 31.7078C32.5296 31.7078 33.2118 32.3901 33.2118 33.2318V35.5937H35.5738C36.4155 35.5937 37.0978 36.276 37.0978 37.1177C37.0977 37.9595 36.4155 38.6417 35.5738 38.6417Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="progress-widget">
                                <div class="progress sm-progress-bar progress-animate">
                                    <div class="progress-gradient-info" role="progressbar" style="width: 48%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span
                                            class="animate-circle"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card o-hidden user-widget">
                        <div class="card-header pb-0">
                            <div class="d-flex">
                                <div class="flex-grow-1"><a href="/tabelpromotor">
                                        <p class="square-after f-w-600 header-text-secondary">Jumlah Kategori<i
                                                class="fa fa-circle"> </i>
                                        </p>
                                        <h4>{{ $datakategori }} Kategori</h4>
                                    </a>

                                </div>
                                <div class="d-flex static-widget">
                                    <span style="font-size: 30px; color: green;">
                                        <i class="fa-solid fa-window-restore"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="progress-widget">
                                <div class="progress sm-progress-bar progress-animate">
                                    <div class="progress-gradient-success" role="progressbar" style="width: 48%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span
                                            class="animate-circle"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card o-hidden user-widget">
                        <div class="card-header pb-0">
                            <div class="d-flex">
                                <div class="flex-grow-1"><a href="/tabelpromotor">
                                        <p class="square-after f-w-600 header-text-info">Jumlah Guest<i
                                                class="fa fa-circle"> </i>
                                        </p>
                                        <h4>{{ $guest }} Guest</h4>
                                    </a>

                                </div>


                                    <div class="d-flex static-widget">
                                        <span style="font-size: 30px; color:red;">
                                            <i class="fa-solid fa-users"></i>
                                        </span>
                                    </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="progress-widget">
                                <div class="progress sm-progress-bar progress-animate">
                                    <div class="progress-gradient-danger" role="progressbar" style="width: 48%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span
                                            class="animate-circle"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <style>
                    body {
                        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                    }

                    #chartdiv {
                        width: 550px;
                        height: 350px;
                        font-size: 11px;
                        border: 1px solid #eee;
                        float: left;
                    }

                    #legend {

                        border: 1px solid #eee;
                        width: 500px;
                        margin-left: 10px;
                        float: left;
                    }

                    #legend .legend-item {
                        margin: 10px;
                        font-size: 15px;
                        font-weight: bold;
                        cursor: pointer;
                    }

                    #legend .legend-item .legend-value {
                        font-size: 12px;
                        font-weight: normal;
                        margin-left: 22px;
                    }

                    #legend .legend-item .legend-marker {
                        display: inline-block;
                        width: 12px;
                        height: 12px;
                        border: 1px solid #ccc;
                        margin-right: 10px;
                    }

                    #legend .legend-item.disabled .legend-marker {
                        opacity: 0.5;
                        background: #ddd;
                    }
                </style>
                <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
                <div id="chartdiv"></div>
                <div id="legend"></div>
                {{-- <script>
                    am4core.useTheme(am4themes_animated);

                    // Create chart instance
                    var chart = am4core.create("chartdiv", am4charts.PieChart);

                    // Add data
                    chart.data = [{
                        "country": "Pormo Yang Diterima",
                        "litres": {{ $diterima }}
                    }, {
                        "country": "Promo Yang Masih Terpending",
                        "litres": {{ $ditolak }}
                    }, {
                        "country": "Promo Yang Ditolak",
                        "litres": {{ $pending }}
                    },{
                        "country": "Promo Yang Sudah Expired",
                        "litres": {{ $expired }}
                    }];

                    // Add and configure Series
                    var pieSeries = chart.series.push(new am4charts.PieSeries());
                    pieSeries.dataFields.value = "litres";
                    pieSeries.dataFields.category = "country";
                    pieSeries.labels.template.disabled = true;

                    chart.radius = am4core.percent(95);

                    // Create custom legend
                    chart.events.on("ready", function(event) {
                        // populate our custom legend when chart renders
                        chart.customLegend = document.getElementById('legend');
                        pieSeries.dataItems.each(function(row, i) {
                            var color = chart.colors.getIndex(i);
                            var percent = Math.round(row.values.value.percent * 100) / 100;
                            var value = row.value;
                            legend.innerHTML += '<div class="legend-item" id="legend-item-' + i +
                                '" onclick="toggleSlice(' + i + ');" onmouseover="hoverSlice(' + i +
                                ');" onmouseout="blurSlice(' + i + ');" style="color: ' + color +
                                ';"><div class="legend-marker" style="background: ' + color + '"></div>' + row
                                .category + '<div class="legend-value">' + value + ' | ' + percent + '%</div></div>';
                        });
                    });

                    function toggleSlice(item) {
                        var slice = pieSeries.dataItems.getIndex(item);
                        if (slice.visible) {
                            slice.hide();
                        } else {
                            slice.show();
                        }
                    }

                    function hoverSlice(item) {
                        var slice = pieSeries.slices.getIndex(item);
                        slice.isHover = true;
                    }

                    function blurSlice(item) {
                        var slice = pieSeries.slices.getIndex(item);
                        slice.isHover = false;
                    }
                </script> --}}

                <script>
                    am4core.useTheme(am4themes_animated);

                    // Create chart instance
                    var chart = am4core.create("chartdiv", am4charts.PieChart);

                    // Add data
                    chart.data = [{
                        "country": "Pormo Yang Diterima",
                        "litres": {{ $diterima }},
                        "color": am4core.color("#52D726")
                    }, {
                        "country": "Promo Yang Masih Terpending",
                        "litres": {{ $pending }},
                        "color": am4core.color("#FFEC00")
                    }, {
                        "country": "Promo Yang Ditolak",
                        "litres": {{ $ditolak }},
                        "color": am4core.color("#FF0000")
                    }, {
                        "country": "Promo Yang Sudah Expired",
                        "litres": {{ $expired }},
                        "color": am4core.color("#FF7300")
                    }];

                    // Add and configure Series
                    var pieSeries = chart.series.push(new am4charts.PieSeries());
                    pieSeries.dataFields.value = "litres";
                    pieSeries.dataFields.category = "country";
                    pieSeries.slices.template.propertyFields.fill = "color";
                    pieSeries.labels.template.disabled = true;

                    chart.radius = am4core.percent(95);

                    // Create custom legend
                    chart.events.on("ready", function(event) {
                        // populate our custom legend when chart renders
                        chart.customLegend = document.getElementById('legend');
                        pieSeries.dataItems.each(function(row, i) {
                            var color = chart.colors.getIndex(i);
                            var percent = Math.round(row.values.value.percent * 100) / 100;
                            var value = row.value;
                            legend.innerHTML += '<div class="legend-item" id="legend-item-' + i +
                                '" onclick="toggleSlice(' + i + ');" onmouseover="hoverSlice(' + i +
                                ');" onmouseout="blurSlice(' + i + ');" style="color: ' + color +
                                ';"><div class="legend-marker" style="background: ' + row.dataContext.color +
                                '"></div>' + row
                                .category + '<div class="legend-value">' + value + ' | ' + percent + '%</div></div>';
                        });
                    });

                    function toggleSlice(item) {
                        var slice = pieSeries.dataItems.getIndex(item);
                        if (slice.visible) {
                            slice.hide();
                        } else {
                            slice.show();
                        }
                    }

                    function hoverSlice(item) {
                        var slice = pieSeries.slices.getIndex(item);
                        slice.isHover = true;
                    }

                    function blurSlice(item) {
                        var slice = pieSeries.slices.getIndex(item);
                        slice.isHover = false;
                    }
                </script>



            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
