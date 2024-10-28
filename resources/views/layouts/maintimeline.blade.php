<!DOCTYPE html>
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

    {{-- VIDEOJS --}}
    <link href="https://vjs.zencdn.net/8.10.0/video-js.css" rel="stylesheet" />
    @cloudinaryJS
</head>

<body class="font-poppins bg-slate-200 dark:bg-zinc-900 dark:text-white">
    @include('navbar.navbarmain')
    <div class="timelinebox sm:px-16 sm:ml-96">
        <div class="max-w-screen-lg m-auto">
            @yield('timeline')
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>
    <script src="/js/salam.js"></script>
    {{-- videojs --}}
    <!-- JS code -->
    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.js"></script>
    <script src="https://vjs.zencdn.net/8.10.0/video.min.js"></script>
</body>

</html>