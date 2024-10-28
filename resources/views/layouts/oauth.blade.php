<!doctype html>
<html lang="en" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- SEO --}}
    {{-- {{ dd($SEOData) }} --}}
    {!! isset($meta) ? seo()->for($meta) : seo($SEOData) !!}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>

<body class="font-poppins bg-slate-200 dark:bg-zinc-900 dark:text-white">
    <div class="timelinebox">
        <div class="max-w-screen-lg m-auto">
            @yield('content')
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="/js/salam.js"></script>
</body>

</html>