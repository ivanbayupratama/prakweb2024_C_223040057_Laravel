<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" data-drawer-backdrop="false"
    aria-controls="default-sidebar" type="button"
    class="fixed z-10 inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-zinc-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-zinc-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 duration-700 "
    aria-label="Sidebar">
    <div
        class="h-full px-3 py-4 overflow-y-auto bg-gray-50/50 shadow-md rounded-r-3xl backdrop-blur dark:bg-zinc-800/50">
        <ul class="space-y-5 font-medium ">
            <li>
                <a href="/"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-zinc-100 dark:hover:bg-zinc-700 group ">
                    <img src="/storage/assets/logo.png" class="h-8 mr-3 hidden dark:block" alt="Dhika Logo">
                    <img src="/storage/assets/logoblack.png" class="h-8 mr-3 show dark:hidden" alt="Dhika Logo">
                    <span
                        class="self-center text-2xl font-extrabold whitespace-nowrap dark:text-white tracking-wide">Bhadrika.</span>
                </a>
            </li>
            <li>
                <hr class="mt-5 border-3 border-gray-400 dark:border-white">
                </hr>
            </li>
            <li>
                <a href="/"
                    class="{{ Request::is('/') ? 'bg-gray-100 dark:bg-zinc-700' : ''  }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-zinc-300 dark:hover:bg-zinc-700 group justify-between transition ease-in-out duration-500">
                    <svg class="w-[25px] h-[25px] text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Home</span>
                </a>
            </li>
            <li>
                <a href="/blogs"
                    class="{{ Request::is('blogs*') ? 'bg-gray-100 dark:bg-zinc-700' : ''  }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-zinc-300 dark:hover:bg-zinc-700 group justify-between transition ease-in-out duration-500">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="flex-1 ms-3 whitespace-nowrap">Blogs</span>
                </a>
            </li>
            <li>
                <a href="/timeline""
                    class=" {{ Request::is('timeline*') ? 'bg-gray-100 dark:bg-zinc-700' : '' }} flex items-center p-2
                    text-gray-900 rounded-lg dark:text-white hover:bg-zinc-300 dark:hover:bg-zinc-700 group
                    justify-between transition ease-in-out duration-500">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M7.5 4.586A2 2 0 0 1 8.914 4h6.172a2 2 0 0 1 1.414.586L17.914 6H19a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h1.086L7.5 4.586ZM10 12a2 2 0 1 1 4 0 2 2 0 0 1-4 0Zm2-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z"
                            clip-rule="evenodd" />
                    </svg>


                    <span class="flex-1 ms-3 whitespace-nowrap">Timeline</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="{{ Request::is('contact*') ? 'bg-gray-100 dark:bg-zinc-700' : ''  }} flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-zinc-300 dark:hover:bg-zinc-700 group justify-between transition ease-in-out duration-500">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M17 6h-2V5h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2h-.541A5.965 5.965 0 0 1 14 10v4a1 1 0 1 1-2 0v-4c0-2.206-1.794-4-4-4-.075 0-.148.012-.22.028C7.686 6.022 7.596 6 7.5 6A4.505 4.505 0 0 0 3 10.5V16a1 1 0 0 0 1 1h7v3a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-3h5a1 1 0 0 0 1-1v-6c0-2.206-1.794-4-4-4Zm-9 8.5H7a1 1 0 1 1 0-2h1a1 1 0 1 1 0 2Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Contact</span>
                </a>
            </li>
        </ul>

        <div
            class="flex flex-col items-center absolute bottom-10 left-0 w-full text-center text-sm text-gray-600 dark:text-gray-300 ">
            @if (auth()->check())
            <a href="/dashboard"
                class="flex mb-7 items-center justify-center gap-2 p-4 bg-zinc-700/70 rounded-r-xl w-full text-gray-100">
                <img src="{{ auth()->user()->image }}" class="rounded-full w-8 h-8"
                    alt="Profile {{ auth()->user()->fullname }}">
                <p class="line-clamp-1 ">{{ auth()->user()->fullname }}</p>
                @if (auth()->user()->is_admin == true )
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
            </a>
            @endif
            <p>&copy; 2024
                Bhadrika A.</p>
        </div>
    </div>
</aside>