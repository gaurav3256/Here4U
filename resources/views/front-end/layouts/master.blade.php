<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    {{-- <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon"> --}}

    <!-- CSS-->
    @include('front-end.layouts.css')

    @yield('style')
</head>

<body>
    <!-- Page Header Start-->
    @include('front-end.layouts.header')
    <!-- Page Header Ends  -->

    @if (trim($__env->yieldContent('breadcrumb-title')) !== '' && trim($__env->yieldContent('breadcrumb-items')) !== '')
    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>@yield('breadcrumb-title')</h2>
                <ul>
                    <li> <a href="{{ route('index') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> @yield('breadcrumb-items')</li>
                </ul>
            </div>
        </div>
    </div>
    @endif

    <!-- Page Body Start-->
    @yield('content')
    <!-- Page Body Ends  -->

    <!-- Page Footer Start-->
    @include('front-end.layouts.footer')
    <!-- Page Footer Ends  -->

    <!-- JS-->
    @include('front-end.layouts.scripts')

    @yield('script')
</body>

</html>
