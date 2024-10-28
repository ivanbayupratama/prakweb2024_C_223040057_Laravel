@extends('layouts.dashboard')

@section('content')
<div class="content">
    <div class="sm:p-4 mt-14 sm:mt-0 tracking-wide leading-loose">
        <div class="header mb-">
            <h1 class="text-2xl flex items-center gap-4 mb-8">
                <svg class="w-7 h-7 text-black transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M7.5 4.586A2 2 0 0 1 8.914 4h6.172a2 2 0 0 1 1.414.586L17.914 6H19a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h1.086L7.5 4.586ZM10 12a2 2 0 1 1 4 0 2 2 0 0 1-4 0Zm2-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z"
                        clip-rule="evenodd"></path>
                </svg>
                <div class="span">Create: <span class="font-extrabold ">Timeline</span></div>
            </h1>
        </div>
        <div class="timeline">
            <form action="/dashboard/timeline" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- UPLOAD IMAGE --}}
                <div class="mb-5">
                    <label for="title-icon" class="block mb-2 text-sm  font-bold text-gray-900 dark:text-white">Upload
                        Content</label>
                    <div class="relative">
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-zinc-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                        10MB)</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" name="content" required />
                            </label>
                        </div>
                    </div>
                    {{-- CHECK BOX --}}
                    <div class="flex items-center mb-4 mt-4 hidden" id="mutedBox">
                        <input id="default-checkbox" type="checkbox" name="is_muted"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mute?</label>
                    </div>
                    @error('content')
                    <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- TITLE --}}
                <div class="mb-5">
                    <label for="title-icon"
                        class="block mb-2 text-sm  font-bold text-gray-900 dark:text-white">Title</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 6.2V5h11v1.2M8 5v14m-3 0h6m2-6.8V11h8v1.2M17 11v8m-1.5 0h3" />
                            </svg>

                        </div>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your Great Title" name="title" id="title" autocomplete="off" autofocus
                            value="{{ old('title') }}" required>
                    </div>
                    @error('title')
                    <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Musik --}}
                <div class="mb-5">
                    <label for="music-icon"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Music</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">

                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961" />
                            </svg>
                        </div>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your Great music" id="inputMusic" autocomplete="off" autofocus
                            value="{{ old('music') }}">
                        <div class="musicInfo">
                            <input type="hidden"
                                class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full ps-10 p-2.5  dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Your Great Music" name="music_id" id="music_id" autocomplete="off"
                                autofocus value="{{ old('music_id', 'creator_audio') }}" required readonly>
                            <input type="hidden"
                                class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full ps-10 p-2.5  dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Your Great Music" name="title_music" id="title_music" autocomplete="off"
                                autofocus value="{{ old('title_music', 'creator_audio') }}" required readonly>
                            <input type="hidden"
                                class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full ps-10 p-2.5  dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Your Great Music" name="cover_music" id="cover_music" autocomplete="off"
                                autofocus value="{{ old('cover_music', 'creator_audio') }}" required readonly>
                            <input type="hidden"
                                class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full ps-10 p-2.5  dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Your Great Music" name="artist_music" id="artist_music" autocomplete="off"
                                autofocus value="{{ old('artist_music', 'creator_audio') }}" required readonly>
                            <input type="hidden"
                                class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full ps-10 p-2.5  dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Your Great Music" name="streamurl_music" id="streamurl_music"
                                autocomplete="off" autofocus value="{{ old('streamurl_music', 'creator_audio') }}"
                                required readonly>
                        </div>
                    </div>

                    <div class="listMusic w-full h-64 bg-zinc-700 rounded mt-3 overflow-y-scroll hidden" id="listMusic">
                        <div>
                            <ul id="contentsmusic" class="p-4">
                                {{-- <li class="flex gap-4 items-center mb-3">
                                    <img src="https://raw.githubusercontent.com/dhikaid/itw2022_project1_223040018/main/img/about.jpg"
                                        class="aspect-square h-14 rounded-full" alt="">
                                    <p>Lebih baik disini</p>
                                </li> --}}

                            </ul>
                        </div>
                    </div>
                    @error('music')
                    <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>


                <button type="submit"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Post
                    Timeline</button>
            </form>

        </div>
    </div>
</div>

<script src="{{ url('/js/dashtimeline.js') }}"></script>

@endsection