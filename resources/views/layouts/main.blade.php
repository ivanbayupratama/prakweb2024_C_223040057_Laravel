<!doctype html>
<html lang="en" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- TITLE --}}
    <title>{{ $title }} | Bhadrika A.</title>

    {{-- SEO --}}
    {{-- {{ dd($SEOData) }} --}}
    {!! isset($meta) ? seo()->for($meta) : seo($SEOData) !!}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
</head>

<body class="font-poppins bg-slate-200 dark:bg-zinc-900 dark:text-white">
    @include('navbar.navbarmain')
    <div class="p-8 sm:p-16 sm:ml-64">
        <div class="max-w-screen-lg m-auto">
            @yield('content')
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
    <script src="/js/salam.js"></script>
</body>

</html>