@extends('layouts.main')

@section('content')
<div class="contents">
    <div
        class="progressBar drop-shadow-xl fixed top-0 left-0 h-[8px] bg-gradient-to-r dark:from-zinc-700 from-white from-10% via-gray-500 via-30% dark:to-white to-zinc-700 to-90% z-10 transition transition-width duration-200 ease-out rounded">
    </div>
    <div class="sm:grid grid-cols-2 gap-4 contentBox z-0">
        <div class="content-detail mt-6 mb-4" data-aos="fade-up">
            <img src="{{ env('FAKER_MODE', false) ? $blog->cover : asset('/storage/'. $blog->cover) }}" alt
                class="mb-3 w-full aspect-[16/9] h-auto object-cover rounded-lg m-auto shadow-lg">
            <h1 class="mb-4 text-2xl font-extrabold">{{ $blog->title }}</h1>
            <p class="opacity-50 mb-3 text-sm">Created by</p>
            <div class="mb-5">
                <small class="flex items-center justify-start gap-3">
                    <img src="{{ $blog->user->image }}" class="w-6 h-6 rounded-full" />
                    <div class="small flex items-center gap-1">
                        {{$blog->user->fullname }}
                        @if ($blog->user->is_admin == true )
                        <button data-popover-target="popover-default" type="button">
                            <svg class="w-3 h-3 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill="currentColor"
                                    d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z" />
                                <path fill="#fff"
                                    d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z" />
                            </svg>
                        </button>
                        @endif
                    </div>
                </small>
            </div>

        </div>

        <hr class="mt-5 mb-5 border-3 border-black dark:border-white sm:hidden" data-aos="fade-up">
        <article class="prose prose-sm prose-gray dark:prose-invert" data-aos="fade-up" data-aos-delay="500">
            <div class="text-gray-500 dark:text-gray-400 leading-9 text-justify">
                {!! $blog->article !!}
            </div>
        </article>
    </div>
    <div class="box">
        <hr class="mt-5 mb-5 border-3 border-black dark:border-white sm:hidden" data-aos="fade-up">
        <section class="commentBox">
            <p class="font-bold mb-3 text-xl">Comments</p>
            @if (session()->has('success'))
            <div id="alert-border-3"
                class="flex mb-4 w-full items-center p-4 rounded-lg text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-zinc-700/50 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    Success, {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-zinc-800 dark:text-green-400 dark:hover:bg-zinc-700"
                    data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            @endif
            {{-- COMMENT --}}
            <div class="comment mb-4">
                @if (auth()->check())
                <form action="/blogs/{{ $blog->slug }}/comment" method="POST">
                    @csrf
                    <label for="chat" class="sr-only">Your message</label>
                    <div class="flex items-center px-3 py-2 rounded-lg bg-zinc-50 dark:bg-zinc-800">
                        <img class="w-6 h-6 rounded-full" src="{{ auth()->user()->image }}"
                            alt="{{ auth()->user()->fullname }}">
                        <div class="w-full mx-4">
                            <textarea id="chat" rows="1"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Your message..." required autocomplete="off" name="comment"></textarea>
                            @error('comment')
                            <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-zinc-600">
                            <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                            </svg>
                            <span class="sr-only">Send message</span>
                        </button>
                    </div>
                </form>

                @else
                <form action="/blogs/{{ $blog->slug }}/comment" method="POST">
                    @csrf
                    <label for="chat" class="sr-only">Your message</label>
                    <div class="flex items-center px-3 py-2 rounded-lg bg-zinc-50 dark:bg-zinc-800">
                        <div class="w-full mx-4">
                            <textarea id="chat" rows="1"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Your message..." required autocomplete="off" name="comment"></textarea>
                            @error('comment')
                            <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-zinc-600">
                            <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                            </svg>
                            <span class="sr-only">Send message</span>
                        </button>
                    </div>
                </form>
                @endif


            </div>

            {{-- MAIN REPLY --}}
            @foreach ($blog->comments->load('user') as $comment)
            @if (!$comment->replyto)
            <section class="p-4 text-sm  rounded-lg bg-slate-50 dark:bg-zinc-800  mb-3">
                <footer class="flex justify-between items-center mb-2 ">
                    <div class="flex items-center">
                        <img class="mr-2 w-6 h-6 rounded-full" src="{{ $comment->user->image }}"
                            alt="{{ $comment->user->fullname }}">
                        <div class="comment-detail">
                            <div class="user-info flex">
                                <p
                                    class="line-clamp-1 items-center mr-1  text-sm text-gray-900 dark:text-white font-semibold">
                                    {{ $comment->user->fullname }}

                                </p>
                                <div class="badge flex mr-2">
                                    @if ( $comment->user->is_admin == true)
                                    <button data-popover-target="popover-default" type="button" class="mr-1">
                                        <svg class="w-3 h-3 text-blue-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill="currentColor"
                                                d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z" />
                                            <path fill="#fff"
                                                d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z" />
                                        </svg>
                                    </button>
                                    @endif
                                    @if ($blog->user->uuid === $comment->user->uuid)
                                    <span
                                        class="bg-zinc-300 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-zinc-700 dark:text-gray-300">Creator</span>
                                    @endif
                                </div>
                            </div>
                            <small class="text-xs text-gray-600 dark:text-gray-400">{{
                                date('d M Y', strtotime($comment->created_at)); }}
                            </small>
                        </div>
                    </div>
                    @can('is_authorComment', $comment)


                    <button id="dropdownComment{{ $comment->hash_id }}Button"
                        data-dropdown-toggle="dropdownComment{{ $comment->hash_id }}"
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-zinc-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-zinc-900 dark:hover:bg-zinc-700 dark:focus:ring-gray-600"
                        type="button">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 16 3">
                            <path
                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                        <span class="sr-only">Comment settings</span>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownComment{{ $comment->hash_id }}"
                        class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-zinc-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <form action="/blogs/{{ $blog->slug }}/comment/{{ $comment->hash_id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        class="block py-2 px-4 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white w-full">Remove</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endcan
                </footer>
                <p class="text-gray-500 dark:text-gray-400">{{ $comment->comment }}</p>
                <div class="flex items-center mt-4 space-x-4">
                    @if (auth()->check())
                    <button type="button"
                        onclick="replyTo(`{{ $comment->hash_id }}`,`{{ $blog->slug }}`,`{{ csrf_token() }}`, `{{ asset(auth()->user()->image) }}` )"
                        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                        </svg>
                        Reply
                    </button>
                    @else
                    <a href="/signin"
                        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                        </svg>
                        Reply
                    </a>
                    @endif
                </div>
            </section>
            <div class="brb-{{ $comment->hash_id }}"></div>
            {{-- REPLY REPLY --}}
            @foreach ($comment->reply->load('user') as $reply)
            <article class="p-4 mb-3 ml-6 lg:ml-12 text-base bg-zinc-100 rounded-lg dark:bg-zinc-700/30">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <img class="mr-2 w-6 h-6 rounded-full" src="{{ $reply->user->image }}"
                            alt="{{ $reply->user->fullname }}">
                        <div class="comment-detail">
                            <div class="user-info flex">
                                <p
                                    class="items-center mr-1  text-sm text-gray-900 dark:text-white font-semibold line-clamp-1">
                                    {{ $reply->user->fullname }}

                                </p>
                                <div class="badge flex mr-2">
                                    @if ( $reply->user->is_admin == true)
                                    <button data-popover-target="popover-default" type="button" class="mr-1">
                                        <svg class="w-3 h-3 text-blue-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill="currentColor"
                                                d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z" />
                                            <path fill="#fff"
                                                d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z" />
                                        </svg>
                                    </button>
                                    @endif
                                    @if ($blog->user->uuid === $reply->user->uuid)
                                    <span
                                        class="bg-zinc-300 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-zinc-700 dark:text-gray-300">Creator</span>
                                    @endif
                                </div>
                            </div>
                            <small class="text-xs text-gray-600 dark:text-gray-400">{{
                                date('d M Y', strtotime($reply->created_at)); }}
                            </small>
                        </div>
                    </div>
                    @can('is_authorComment', $reply)
                    <button id="dropdownComment{{ $reply->hash_id }}Button"
                        data-dropdown-toggle="dropdownComment{{ $reply->hash_id }}"
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-zinc-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-zinc-900 dark:hover:bg-zinc-700 dark:focus:ring-gray-600"
                        type="button">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 16 3">
                            <path
                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                        <span class="sr-only">Comment settings</span>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownComment{{ $reply->hash_id }}"
                        class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-zinc-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <form action="/blogs/{{ $blog->slug }}/comment/{{ $reply->hash_id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        class="block py-2 px-4 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white w-full">Remove</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endcan
                </footer>
                <p class="text-gray-500 dark:text-gray-400 text-sm">{{ $reply->comment }}</p>

            </article>
            <div class="ml-6 lg:ml-12 brb-{{ $reply->hash_id }}"></div>
            @endforeach
            @endif
            @endforeach
        </section>
    </div>

    <script src="{{ url('js/comments.js') }}"></script>
    <script src="{{ url('js/scroll.js') }}"></script>

    @endsection