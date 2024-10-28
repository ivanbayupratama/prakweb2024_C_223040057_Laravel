@extends('layouts.maintimeline')

@section('timeline')
<link rel="stylesheet" href="/css/timeline.css">
<div class="container content-snap snap-y snap-mandatory scroll-smooth h-[100dvh] md:max-w-2xl mx-auto overflow-y-scroll my-0"
    id="thatvideo">
    <section
        class="snap-start snap-always h-[100dvh] h-full-modif flex items-center justify-center my-20 gap-4 relative">
        <main class="main relative w-full h-[100dvh] h-full-modif overflow-hidden bg-zinc-600 flex-grow-0 ">
            {{-- ALERT --}}
            @if (session()->has('success'))
            <div id="alert-border-3"
                class="flex absolute z-10 top-0 items-center p-4 rounded-lg w-full text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-zinc-700/40 backdrop-blur dark:border-green-800"
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
            {{-- PLAY BTN --}}
            <div class="m-auto absolute z-10 h-full flex w-full items-center justify-center" id="playBTN">
                <svg class="w-32 h-32 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8.6 5.2A1 1 0 0 0 7 6v12a1 1 0 0 0 1.6.8l8-6a1 1 0 0 0 0-1.6l-8-6Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            {{-- END BTN --}}
            {{-- LOADING --}}
            <div class="m-auto absolute z-20 h-full flex w-full items-center justify-center hidden" id="loading">
                <div role="status">
                    <svg aria-hidden="true"
                        class="inline w-12 h-12 text-gray-200 animate-spin dark:text-gray-600 fill-white"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            {{-- ENDLOADING --}}

            @if ($timeline->is_video)
            <video id="my-video" class="relative video-js h-[100dvh] h-full-modif w-full object-cover" loop
                preload="none" poster="https://res.cloudinary.com/dgxtncvvp/video/upload/{{ $timeline->content }}.webp"
                data-setup="{}" {{ $timeline->is_muted ? 'muted' :
                '' ; }}>
                <source src="https://res.cloudinary.com/dgxtncvvp/video/upload/sp_auto/{{ $timeline->content }}.mpd"
                    type="application/dash+xml" />

                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider
                    upgrading to a web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                </p>
            </video>
            @else
            <img src="https://res.cloudinary.com/dgxtncvvp/image/upload/{{ $timeline->content }}.webp" loading="lazy"
                class="w-full h-screen mx-auto object-contain" alt="Image {{ $timeline->content }}">
            @endif
            @if ($timeline->music->music_id !== $timeline->slug)
            <audio loop
                class="absolute mb-10 bottom-0 w-full h-screen max-w-full rounded-xl mx-auto object-center -z-10"
                preload="none">
                <source src="{{ $timeline->music->stream_url }}" type="audio/mpeg" autoplay loop preload="none">
                Your browser does not support the audio element.
            </audio>
            @endif
            <!-- DETAIL -->
            <div class="detail absolute z-10 bottom-0 h-1/4 w-full bg-gradient-to-t from-black to-transparent">
                <div class="contentDetail absolute bottom-3 p-5 w-full">
                    <section class="info text-lg mb-4">
                        <p class="font-bold text-3xl mb-1">{{ $timeline->judul }}</p>
                        <p class="text-sm mb-3 text-gray-300">{{
                            date('d M Y H:i', strtotime($timeline->created_at)); }}</p>
                        <small class="flex items-center justify-start gap-3 mb-2">
                            <img loading="lazy" src="{{ $timeline->user->image }}" class="w-6 h-6 rounded-full">
                            <div class="small flex items-center gap-1">
                                {{ $timeline->user->fullname }}
                                <div class="badge flex mr-2">
                                    @if ( $timeline->user->is_admin == true)
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
                                </div>
                            </div>
                        </small>
                        <small class="small flex gap-2 items-center">
                            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm2.318.052h-.002A1 1 0 0 0 12 8v5.293A4.033 4.033 0 0 0 10.5 13C8.787 13 7 14.146 7 16s1.787 3 3.5 3 3.5-1.146 3.5-3c0-.107-.006-.211-.017-.313A1.04 1.04 0 0 0 14 15.5V9.766c.538.493 1 1.204 1 2.234a1 1 0 1 0 2 0c0-1.881-.956-3.14-1.86-3.893a6.4 6.4 0 0 0-1.636-.985 4.009 4.009 0 0 0-.165-.063l-.014-.005-.005-.001-.002-.001ZM9 16c0-.356.452-1 1.5-1s1.5.644 1.5 1-.452 1-1.5 1S9 16.356 9 16Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="flex gap-2 items-center overflow-hidden w-56 whitespace-nowrap">
                                {{-- <img loading="lazy" src="{{ $timeline->music->cover }}" class="rounded-full w-4"
                                    alt=""> --}}
                                <span class="animate-loop-scroll"> {{ $timeline->music->title }} - {{
                                    $timeline->music->artist
                                    }}</span>
                            </div>
                        </small>
                    </section>
                    <div
                        class="progressBar bottom-0 h-[8px] bg-gradient-to-r dark:from-zinc-700 from-white from-10% via-gray-500 via-30% dark:to-white to-zinc-700 to-90% transition transition-width duration-200 ease-out rounded">
                    </div>
                </div>
            </div>
        </main>
        {{-- MODAL --}}
        <div class="button self-end mb-20 absolute md:relative z-10 bottom-28 right-5 md:-right-0">
            <button data-modal-target="default-modal-{{ $timeline->slug }}"
                onclick="closeModal('default-modal-{{ $timeline->slug }}')"
                data-modal-toggle="default-modal-{{ $timeline->slug }}"
                class="block mb-5 rounded-full text-white bg-blue-700/50 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm p-5 text-center dark:bg-zinc-600/50 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                <svg class="md:w-6 md:h-6 w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M3.559 4.544c.355-.35.834-.544 1.33-.544H19.11c.496 0 .975.194 1.33.544.356.35.559.829.559 1.331v9.25c0 .502-.203.981-.559 1.331-.355.35-.834.544-1.33.544H15.5l-2.7 3.6a1 1 0 0 1-1.6 0L8.5 17H4.889c-.496 0-.975-.194-1.33-.544A1.868 1.868 0 0 1 3 15.125v-9.25c0-.502.203-.981.559-1.331ZM7.556 7.5a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2h-8Zm0 3.5a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2H7.556Z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <button onclick="Copy(`{{ url('timeline/'.$timeline->slug) }}`)"
                class="block mb-8 rounded-full text-white bg-blue-700/50 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm p-5 text-center dark:bg-zinc-600/50 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                <svg class="md:w-6 md:h-6 w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.5 3a3.5 3.5 0 0 0-3.456 4.06L8.143 9.704a3.5 3.5 0 1 0-.01 4.6l5.91 2.65a3.5 3.5 0 1 0 .863-1.805l-5.94-2.662a3.53 3.53 0 0 0 .002-.961l5.948-2.667A3.5 3.5 0 1 0 17.5 3Z" />
                </svg>
            </button>
        </div>
        {{-- ISI MODAL --}}
        <!-- Main modal -->
        <div id="default-modal-{{ $timeline->slug }}" tabindex="-1" aria-hidden="true"
            class="modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-zinc-700/50 backdrop-blur">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Timeline: {{ $timeline->judul }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-zinc-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-zinc-600 dark:hover:text-white"
                            data-modal-hide="default-modal-{{ $timeline->slug }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        {{-- COMMENT --}}
                        <div class="comment mb-4">
                            @if (auth()->check())
                            <form action="/timeline/{{ $timeline->slug }}/comment" method="POST">
                                @csrf
                                <label for="chat" class="sr-only">Your message</label>
                                <div class="flex items-center px-3 py-2 rounded-lg bg-zinc-50 dark:bg-zinc-800">
                                    <img loading="lazy" class="w-6 h-6 rounded-full" src="{{ auth()->user()->image }}"
                                        alt="{{ auth()->user()->fullname }}">
                                    <div class="w-full mx-4">
                                        <textarea id="chat" rows="1"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Your message..." required autocomplete="off"
                                            name="comment"></textarea>
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
                            <form action="/timeline/{{ $timeline->slug }}/comment" method="POST">
                                @csrf
                                <label for="chat" class="sr-only">Your message</label>
                                <div class="flex items-center px-3 py-2 rounded-lg bg-zinc-50 dark:bg-zinc-800">
                                    <div class="w-full mx-4">
                                        <textarea id="chat" rows="1"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Your message..." required autocomplete="off"
                                            name="comment"></textarea>
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
                        @foreach ($timeline->comments->load('user') as $comment)
                        @if (!$comment->replyto)
                        <section class="p-4 text-sm  rounded-lg bg-slate-50 dark:bg-zinc-800  mb-3">
                            <footer class="flex justify-between items-center mb-2 ">
                                <div class="flex items-center">
                                    <img loading="lazy" class="mr-2 w-6 h-6 rounded-full"
                                        src="{{ $comment->user->image }}" alt="{{ $comment->user->fullname }}">
                                    <div class="comment-detail">
                                        <div class="user-info flex">
                                            <p
                                                class="line-clamp-1 items-center mr-1  text-sm text-gray-900 dark:text-white font-semibold">
                                                {{ $comment->user->fullname }}

                                            </p>
                                            <div class="badge flex mr-2">
                                                @if ( $comment->user->is_admin == true)
                                                <button data-popover-target="popover-default" type="button"
                                                    class="mr-1">
                                                    <svg class="w-3 h-3 text-blue-500" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill="currentColor"
                                                            d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z" />
                                                        <path fill="#fff"
                                                            d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z" />
                                                    </svg>
                                                </button>
                                                @endif
                                                @if ($timeline->user->uuid === $comment->user->uuid)
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
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 16 3">
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
                                            <form
                                                action="/timeline/{{ $timeline->slug }}/comment/{{ $comment->hash_id }}"
                                                method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="block py-2 px-4 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">Remove</button>
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
                                    onclick="replyToTimeline(`{{ $comment->hash_id }}`,`{{ $timeline->slug }}`,`{{ csrf_token() }}`, `{{ secure_asset(auth()->user()->image) }}` )"
                                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                    <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                    </svg>
                                    Reply
                                </button>
                                @else
                                <a href="/signin"
                                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                                    <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
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
                        <article class="p-4 mb-3 ml-6 lg:ml-12 text-base bg-zinc-100 rounded-lg dark:bg-zinc-800">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <img loading="lazy" class="mr-2 w-6 h-6 rounded-full"
                                        src="{{ $reply->user->image }}" alt="{{ $reply->user->fullname }}">
                                    <div class="comment-detail">
                                        <div class="user-info flex">
                                            <p
                                                class="items-center mr-1  text-sm text-gray-900 dark:text-white font-semibold line-clamp-1">
                                                {{ $reply->user->fullname }}

                                            </p>
                                            <div class="badge flex mr-2">
                                                @if ( $reply->user->is_admin == true)
                                                <button data-popover-target="popover-default" type="button"
                                                    class="mr-1">
                                                    <svg class="w-3 h-3 text-blue-500" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill="currentColor"
                                                            d="m18.774 8.245-.892-.893a1.5 1.5 0 0 1-.437-1.052V5.036a2.484 2.484 0 0 0-2.48-2.48H13.7a1.5 1.5 0 0 1-1.052-.438l-.893-.892a2.484 2.484 0 0 0-3.51 0l-.893.892a1.5 1.5 0 0 1-1.052.437H5.036a2.484 2.484 0 0 0-2.48 2.481V6.3a1.5 1.5 0 0 1-.438 1.052l-.892.893a2.484 2.484 0 0 0 0 3.51l.892.893a1.5 1.5 0 0 1 .437 1.052v1.264a2.484 2.484 0 0 0 2.481 2.481H6.3a1.5 1.5 0 0 1 1.052.437l.893.892a2.484 2.484 0 0 0 3.51 0l.893-.892a1.5 1.5 0 0 1 1.052-.437h1.264a2.484 2.484 0 0 0 2.481-2.48V13.7a1.5 1.5 0 0 1 .437-1.052l.892-.893a2.484 2.484 0 0 0 0-3.51Z" />
                                                        <path fill="#fff"
                                                            d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z" />
                                                    </svg>
                                                </button>
                                                @endif
                                                @if ($timeline->user->uuid === $reply->user->uuid)
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
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 16 3">
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
                                            <form action="/timeline/{{ $timeline->slug }}/comment/{{ $reply->hash_id }}"
                                                method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="block py-2 px-4 hover:bg-zinc-100 dark:hover:bg-zinc-600 dark:hover:text-white">Remove</button>
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
                    </div>

                </div>
            </div>
        </div>
        {{-- END MODAL --}}
        {{-- END MODAL --}}
    </section>
</div>



</div>

<script src="/js/timeline.js"></script>
<script src="/js/comments.js"></script>
@endsection