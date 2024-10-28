@extends('layouts.dashboard')

@section('content')
<div class="content">
    <div class="sm:p-4 mt-14 sm:mt-0 tracking-wide leading-loose">
        <div class="header mb-">
            <h1 class="text-2xl flex items-center gap-4 mb-8">
                <svg class="w-6 h-6 text-black transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                    <path fill-rule="evenodd"
                        d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                        clip-rule="evenodd"></path>
                </svg>
                <div class="span">Edit: <span class="font-extrabold ">{{ $blog->title }}</span></div>
            </h1>
        </div>
        <div class="blogs">
            <form action="/dashboard/blogs/{{ $blog->slug }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                {{-- UPLOAD IMAGE --}}
                <div class="mb-5">

                    <figure
                        class="relative w-full transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                        <a href="#">
                            <img class=" rounded-lg aspect-[16/9] object-cover h-full"
                                src="{{ env('FAKER_MODE', false) ? $blog->cover : asset('/storage/'. $blog->cover) }}"
                                alt="image description">

                        </a>
                        <figcaption
                            class="absolute px-4 text-lg text-white top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="relative">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file"
                                        class="flex flex-col items-center justify-center w-full h-64 rounded-lg cursor-pointer ">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-white drop-shadow-lg" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-white drop-shadow-lg">
                                                <span class="font-semibold">Click to upload</span> or
                                                drag and drop
                                            </p>
                                            <p class="text-xs text-white drop-shadow-lg">SVG, PNG, JPG or GIF
                                                (MAX.
                                                10MB)</p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" name="cover" />
                                    </label>
                                </div>
                            </div>
                        </figcaption>
                    </figure>


                    @error('cover')
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
                            value="{{ old('title', $blog->title) }}" required>
                    </div>
                    @error('title')
                    <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- SLUG --}}
                <div class="mb-5">
                    <label for="slug-icon"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Slug</label>
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
                            placeholder="Your Great slug" name="slug" id="slug" autocomplete="off" autofocus
                            value="{{ old('slug', $blog->slug) }}" required readonly>
                    </div>
                    @error('slug')
                    <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- ARTICLE --}}
                <div class="mb-5">
                    <label for="title-icon"
                        class="block mb-2 text-sm  font-bold text-gray-900 dark:text-white">Article</label>
                    <div
                        class="text-editor-js bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <article class=" max-w-full prose prose-sm max-h-screen">
                            <textarea name="article" id="article" required
                                autocomplete="off"><div id="article">{!! old('article', $blog->article) !!}</div></textarea>
                        </article>
                    </div>
                    @error('article')
                    <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex">
                    <button type="submit"
                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit
                        Blog</button>
            </form>
            <form action="/dashboard/blogs/{{ $blog->slug }}" method="post">
                @method('delete')
                @csrf
                <button type="submit"
                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete
                    Blog</button>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    
    title.addEventListener('change', checkSlug);

    function checkSlug(){
        setTimeout(() => {
                fetch('/dashboard/blogs/checkSlug?title=' + title.value)
                        .then(response=> response.json())
                        .then(data => slug.value = data.slug)
            }, 1000);
    }

    ClassicEditor
        .create( document.querySelector( '#article' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection