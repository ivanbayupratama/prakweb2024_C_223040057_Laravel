@extends('layouts.oauth')

@section('content')




<main class="content container flex items-center justify-center min-h-screen px-6 mx-auto">
    <form class="mx-auto w-full max-w-md" method="GET"
        action="https://sso.bhadrikais.my.id/signin/{{ env('TOKEN_DIAKUN') }}">
        @csrf
        <div class="welcomeHeader mb-5">
            <h1 class="text-3xl font-extrabold mb-2">Signin</h1>
            <p class="mb-1 font-medium">Let's vibe together!</p>
        </div>
        <hr class="mb-5 border-3 border-gray-400 dark:border-white">
        <button type="submit"
            class="w-full text-white bg-zinc-600/40 hover:bg-zinc/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 me-2 mb-4 m-auto justify-center">
            <img class="w-6 h-6 me-2" src="{{ secure_asset('storage/assets/logo.png') }}" alt="">
            Sign in with DiAkun
        </button>
        <div class="text-center">
            <a href="/" class="m-auto text-sm">Back to <span class="text-blue-500">
                    Blogs</span></a>
        </div>
    </form>

</main>

@endsection