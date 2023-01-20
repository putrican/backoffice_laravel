<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BLUERAY Cargo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ URL::to('/') }}/font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/font/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/vendor/bootstrap.rtl.only.min.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/main.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/dore.light.bluenavy.min.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/css1/style.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/js/script.js" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/vendor/datatables.responsive.bootstrap4.min.css" />


</head>

<body id="app-container" class="ltr rounded menu-default menu-sub-hidden">
    <nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbarcsrf-right">
            <a class="navbar-logo" width="460" height="345">
                <span class="logo d-none d-xs-block "></span>
                <span class="logo-mobile d-block d-xs-none"></span>
            </a>
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>
            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>
            </form>
        </div>
        <div class="navbar-right">
            <div class="header-icons d-inline-block align-middle">
                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>
                <div class="user d-inline-block">
                    <div class="glyph-icon simple-icon-user  ">
                        <a class=" dropdown-toggle mb-1" href="" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            {{-- <div class=" glyph-icon simple-icon-logout"> --}}
                                {{-- <a href="{{ route('logout') }}">Logout</a>  --}}
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                            <div class=" glyph-icon simple-icon-logout">
                                    <button class="">Logout</button>
                                </form>                                                        
                          </div>
                        </div>

                    
                            {{-- <div class="container mt-5">
                                <p class="display-4">
                                    Welcome {{ auth()->user()->name }}
                                </p>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger">Logout</button>
                                </form>
                            </div>                 --}}
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li>
                        <a href="/dashboard/orders/index">
                            <i class="iconsminds-folder-open"></i> <span class="d-inline-block">Form Order</span>
                        </a>

                    </li>
                    <li>
                        <a href="/dashboard/kurs/index">
                            <i class="iconsminds-library"></i> <span class="d-inline-block">Kurs</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <main>
        @yield('container')
    </main>
    <footer class="page-footer">
        <div class="footer-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <p class="mb-0 text-muted">ColoredStrategies 2022</p>
                    </div>
                    <div class="col-sm-6 d-none d-sm-block">
                        <ul class="breadcrumb pt-0 pr-0 float-right">
                            <li class="breadcrumb-item mb-0">
                                <a href="#" class="btn-link">Review</a>
                            </li>
                            <li class="breadcrumb-item mb-0">
                                <a href="#" class="btn-link">Purchase</a>
                            </li>
                            <li class="breadcrumb-item mb-0">
                                <a href="#" class="btn-link">Docs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script src="{{ URL::to('/') }}/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/mousetrap.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/perfect-scrollbar.min.js"></script>
    <script src="{{ URL::to('/') }}/js/dore.script.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ URL::to('/') }}/js/scripts.js"></script>

    {{-- Penjumlahan harga custom,harga gudang,harga kapal --}}
    <script>
        function sum() {
            var a = document.getElementById('kapal').value;
            var hKapal = parseInt(a.replaceAll(',', ''))

            var b = document.getElementById('gudang').value;
            var hGudang = parseInt(b.replaceAll(',', ''))

            var c = document.getElementById('custom').value;
            var hCustom = parseInt(c.replaceAll(',', ''))

            var result = parseInt(hKapal) + parseInt(hGudang) + parseInt(hCustom);

            if (!isNaN(result)) {
                document.getElementById('total').value = result;
            }
        }
    </script>
    <script>
        $(function() {
            $("#custom").keyup(function(e) {
                $(this).val(format($(this).val()));
            });
        });
        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };

        $(function() {
            $("#gudang").keyup(function(e) {
                $(this).val(format($(this).val()));
            });
        });
        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };

        $(function() {
            $("#kapal").keyup(function(e) {
                $(this).val(format($(this).val()));
            });
        });
        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };
    </script>
    <script>
        $(function() {
            $("#harga_kurs").keyup(function(e) {
                $(this).val(format($(this).val()));
            });
        });
        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };
        $(function() {
            $(".approve").keyup(function(e) {
                $(this).val(format($(this).val()));
            });
        });
        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };

        $(function() {
            $("#hasil").keyup(function(e) {
                $(this).val(format($(this).val()));
            });
        });
        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };

        $(function() {
            $("#kurs_test").keyup(function(e) {
                $(this).val(format($(this).val()));
            });
        });
        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };

        $(function() {
            $("#mata_uang").keyup(function(e) {
                $(this).val(format($(this).val()));
            });
        });
        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };
    </script>
    @stack('scripts');
    <style>
        .dataTables_filter input {
            border-radius: 20px;
            weight: 100px;
        }

        .dataTables_wrapper.dataTables_paginate {
            text-align: center;
        }



        .dataTables_filter {

            float: right;
        }

        .categoryTables_info {

            float: right;
        }
    </style>


    @include('sweetalert::alert')

</body>

</html>
