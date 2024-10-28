@extends('layouts.dashboard')

@section('content')
<div class="content">
    <div class="sm:p-4 mt-14 sm:mt-0 tracking-wide leading-loose">
        <div class="header mb-4">
            <h1 class="text-2xl flex items-center gap-4">
                <svg class="w-7 h-7 text-black transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M7.5 4.586A2 2 0 0 1 8.914 4h6.172a2 2 0 0 1 1.414.586L17.914 6H19a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h1.086L7.5 4.586ZM10 12a2 2 0 1 1 4 0 2 2 0 0 1-4 0Zm2-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z"
                        clip-rule="evenodd"></path>
                </svg>
                <div class="span">My <span class="font-extrabold ">Timeline</span></div>
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
                        <span class="font-medium">Success alert!</span> {{ session('success') }}
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="timeline">
            <div class="btnCreate mb-3">
                <a type="button" href="/dashboard/timeline/create"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Create
                    +</a>
            </div>
            @foreach ($timeline as $timeline)
            <div class="mb-4">
                <a href="/dashboard/timeline/{{ $timeline->slug }}/edit"
                    class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-zinc-800 dark:border-gray-700 dark:hover:bg-zinc-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $timeline->judul
                        }}
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400 text-sm">by {{ $timeline->user->fullname }}
                        on {{
                        date('d M Y', strtotime($timeline->created_at)); }}</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection