<!doctype html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}"  data-textdirection="ltr">
<head>
    @include('backend.includes.head')
    @yield('css')
</head>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">

    @include('backend.includes.header')
    @include('backend.includes.sidebar')
        <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>


@include('backend.includes.customizer')

<!-- Buynow Button-->
    <div class="buy-now"><a href="https://www.kodatik.com/" target="_blank" class="btn btn-danger">kodatik.com</a>

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


@include('backend.includes.footer')
@yield('js')
</body>
</html>
