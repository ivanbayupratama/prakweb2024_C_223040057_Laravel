@extends('layouts.dashboard')

@section('content')
<div class="">
    <div class="sm:p-4 mt-14 sm:mt-0 tracking-wide leading-loose">
        <div class="header mb-4">
            <h1 class="text-2xl ">Hi, <span class="font-extrabold">{{ auth()->user()->fullname}}</span>
            </h1>
            <p>What do you want today?</p>
        </div>

        <div class="menus sm:grid grid-cols-3 gap-4">
            <a href="https://sso.bhadrikais.my.id/dashboard"
                class="col-span bg-white dark:bg-zinc-800 p-4 shadow rounded-xl text-center mb-4 w-full block">
                <div class="logomenu mb-4">
                    <svg class="w-14 h-14 text-gray-800 dark:text-white m-auto" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <p class="detailMenu">Edit <span class="font-bold">Account</span></p>
            </a>
            <a href="/blogs" class="col-span bg-white dark:bg-zinc-800 p-4 shadow rounded-xl text-center mb-4 block">
                <div class="logomenu mb-4">
                    <svg class="w-14 h-14 text-gray-800 dark:text-white m-auto" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <p class="detailMenu">View <span class="font-bold">Blogs</span></p>
            </a>
            <a href="/timeline" class="col-span bg-white dark:bg-zinc-800 p-4 shadow rounded-xl text-center mb-4 block">
                <div class="logomenu mb-4">
                    <svg class="w-14 h-14 text-gray-800 dark:text-white m-auto" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M7.5 4.586A2 2 0 0 1 8.914 4h6.172a2 2 0 0 1 1.414.586L17.914 6H19a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h1.086L7.5 4.586ZM10 12a2 2 0 1 1 4 0 2 2 0 0 1-4 0Zm2-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <p class="detailMenu">View <span class="font-bold">Timeline</span></p>
            </a>
        </div>
    </div>
</div>
@endsection