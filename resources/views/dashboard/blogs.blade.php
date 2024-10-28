@extends('layouts.dashboard')

@section('content')
<div class="content">
    <div class="sm:p-4 mt-14 sm:mt-0 tracking-wide leading-loose">
        <div class="header mb-4">
            <h1 class="text-2xl flex items-center gap-4">
                <svg class="w-6 h-6 text-black transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                    <path fill-rule="evenodd"
                        d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                        clip-rule="evenodd"></path>
                </svg>
                <div class="span">My <span class="font-extrabold ">Blogs</span></div>
            </h1>
            @if (session()->has('success'))
            <div class="mt-4">
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-zinc-800 dark:text-green-400 dark:border-green-800"
                    role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Success </span> {{ session('success') }}
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="blogs">
            <div class="btnCreate mb-3">
                <a type="button" href="/dashboard/blogs/create"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Create
                    +</a>
            </div>
            @foreach ($blogs as $blog)
            <div class="mb-4">
                <a href="/dashboard/blogs/{{ $blog->slug }}/edit"
                    class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-zinc-800 dark:border-gray-700 dark:hover:bg-zinc-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $blog->title }}
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">by {{ $blog->user->fullname }} on {{
                        date('d M Y', strtotime($blog->created_at)); }}</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection