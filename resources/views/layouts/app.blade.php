<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title>
        @yield('title', 'Roomora') · Roomora
    </title>

    <meta name="theme-color" content="#0f172a">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    {{-- Bootstrap --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Shared CSS Part --}}
    @include('layouts.global_layout.shared_css')
</head>


<body>
    @php
        $isAuthPage = request()->routeIs('login');
    @endphp

    <div class="stayflow-app {{ $isAuthPage ? 'stayflow-auth-app' : '' }}">
        @unless ($isAuthPage)
            @include('layouts.global_layout.top_part')

            @if (session('success'))
                <div class="stayflow-alert success">
                    <div class="stayflow-alert-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div>
                        <strong>Success</strong>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button type="button" class="stayflow-alert-close">
                        <i class="fas fa-xmark"></i>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="stayflow-alert error">
                    <div class="stayflow-alert-icon">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <div>
                        <strong>Something went wrong</strong>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button type="button" class="stayflow-alert-close">
                        <i class="fas fa-xmark"></i>
                    </button>
                </div>
            @endif
        @endunless

        <main class="{{ $isAuthPage ? 'stayflow-auth-content' : 'stayflow-content' }}">
            @yield('content')
        </main>

        @unless ($isAuthPage)
            @include('layouts.global_layout.bottom_part')
        @endunless
    </div>

    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    @include('layouts.global_layout.shared_js')
</body>


</html>
