@extends('layouts.main')

@section('content')
<div class="contents">
    <div class="headerContent md:flex justify-between items-end">
        <div class="header flex gap-2 items-center mb-4" data-aos="fade-down" data-aos-duration="1000">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                    clip-rule="evenodd" />
            </svg>
            <h1 class="text-2xl font-bold tracking-wider">Blogs</h1>
        </div>
        <form class="md:w-1/3 w-full" method="GET" action="/blogs" data-aos="fade-down" data-aos-duration="1200">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-zinc-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search blog.." name="search" value="{{ request()->search }}" />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 dark:bg-zinc-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

    </div>

    <hr class="mt-5 mb-5 border-3 border-gray-400 dark:border-white" data-aos="fade-right" data-aos-duration="1000">
    @if($blogs->count())
    <div class="mt-5 grid md:grid-cols-2 gap-3">
        @foreach ($blogs as $blog)
        <figure
            class="relative transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0 shadow-md mb-3 "
            data-aos="fade-up" data-aos-duration="1000">
            <a href="/blogs/{{ $blog->slug }}">
                <img class="rounded-lg aspect-[16/9] object-cover h-full"
                    src="{{ env('FAKER_MODE', false) ? $blog->cover : secure_asset('/storage/'. $blog->cover) }}"
                    alt="image description">

            </a>
            <figcaption class="absolute px-4 text-base text-white bottom-6 ">
                <p class="text-xl sm:text-2xl font-bold mb-1 line-clamp-1">{{ $blog->title }}</p>
                <span class="text-sm">by {{ $blog->user->fullname }}</span>
            </figcaption>
        </figure>
        @endforeach
    </div>
    <div class="m-8 flex justify-center">
        {{ $blogs->links() }}
    </div>
    @else
    <div class="text-center mt-11" data-aos="fade-up" data-aos-duration="1000">
        <p>Blogs not found.</p>
    </div>

    @endif


</div>
@endsection