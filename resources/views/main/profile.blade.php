@extends('layouts.main')
@section('content')

<div class="contents">
    <main class="listcontents">
        <div class="sm:flex gap-10 justify-between items-center ">
            <div class="content-1 mb-5" data-aos="fade-up" data-aos-duration="1000">
                <div href="#"
                    class="block p-10 justify-center sm:w-[22rem] bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-zinc-800 dark:border-zinc-700 dark:hover:bg-zinc-700">
                    <img class="rounded-full w-52 m-auto"
                        src="https://raw.githubusercontent.com/dhikaid/itw2022_project1_223040018/main/img/about.jpg"
                        alt="image description">
                    <div class="aboutme mt-10 text-center">
                        <h5 class="mb-3 text-xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                            Bhadrika
                            Aryaputra
                            Hermawan</h5>
                        <p class="mb">Developer | Student</p>
                        <a href="mailto:me@bhadrikais.my.id" class="mb-10 text-sm">me@bhadrikais.my.id</a>
                        <div class="mt-5 mb-7 flex gap-6 justify-center">
                            <a href="https://github.com/dhikaid">
                                <svg class="w-5 h-5 text-gray-800 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                        clip-rule="evenodd"></path>
                                </svg></a>
                            <a href="https://www.youtube.com/@BhadrikaAryaPutra">
                                <svg class="w-5 h-5 text-gray-800 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                    <path fill-rule="evenodd"
                                        d="M19.7 3.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.84c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.84A4.225 4.225 0 0 0 .3 3.038a30.148 30.148 0 0 0-.2 3.206v1.5c.01 1.071.076 2.142.2 3.206.094.712.363 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.15 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965c.124-1.064.19-2.135.2-3.206V6.243a30.672 30.672 0 0 0-.202-3.206ZM8.008 9.59V3.97l5.4 2.819-5.4 2.8Z"
                                        clip-rule="evenodd"></path>
                                </svg></a>
                            <a href="https://instagram.com/bhadrika_aryaputra">
                                <svg class="w-5 h-5 text-gray-800 dark:text-gray-400" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/in/bhadrika05/">
                                <svg class="w-5 h-5 text-gray-800 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z"
                                        clip-rule="evenodd" />
                                    <path d="M7.2 8.809H4V19.5h3.2V8.809Z" />
                                </svg>
                            </a>
                        </div>
                        <div class="resume">


                            <a href="https://drive.google.com/file/d/1oOpSy4p_K600LuVshs5tiU_Ljuf_0aap/view?usp=sharing"
                                class="inline-flex gap-2 w-full items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-center">
                                <svg class="w-5 h-5 text-white-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                </svg>
                                Download Resume</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-2" data-aos-delay="300" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="md:text-3xl font-extrabold tracking-widest" id="element">Hi, I'm Bhadrika 👋</h1>
                <hr class="mt-5 border-3 border-gray-400 dark:border-white">
                <div class="myBio mt-5 ">
                    <p class="leading-10 mb-5"> Hey there! I'm Bhadrika Aryaputra Hermawan, currently cruising through
                        my
                        undergraduate
                        journey in computer
                        science at Pasundan University in Bandung. My passion lies in the world of backend development,
                        where I
                        love
                        crafting the digital magic that powers websites and applications.</p>
                    <p class="leading-10 mb-5"> Beyond coding, I also find joy in capturing life's moments through the
                        lens.
                        Photography
                        and videography are my go-to escapes when I'm not buried in lines of code.</p>
                    <p class="leading-10 mb-5"> If you're interested in teaming up or have any questions, feel free to
                        shoot
                        me
                        a
                        message. Let's create something awesome together!</p>
                </div>
            </div>
        </div>
        <hr class="mt-5 mb-5 border-3 border-gray-400 dark:border-white" data-aos="fade-down" data-aos-duration="1000">
        <div class="myExperience">
            <div class="flex gap-2 items-center mb-5" data-aos="fade-down" data-aos-duration="1000"
                data-aos-delay="500">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7H5a2 2 0 0 0-2 2v4m5-6h8M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m0 0h3a2 2 0 0 1 2 2v4m0 0v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6m18 0s-4 2-9 2-9-2-9-2m9-2h.01" />
                </svg>
                <h2 class="text-2xl font-bold tracking-wider ">Experience</h2>
            </div>

            <ol class="items-center sm:flex">
                <li class="relative mb-6 sm:mb-0" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <div class="flex items-center">
                        <div
                            class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-zinc-600 sm:ring-8 dark:ring-zinc-800 shrink-0">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <div class="hidden sm:flex w-full bg-gray-400 h-0.5 dark:bg-zinc-700"></div>
                    </div>
                    <div class="mt-3 sm:pe-8">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Student council member</h3>
                        <time
                            class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-1000">October
                            2019 - October 2020</time>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">IT sector member of the
                            student council</p>
                    </div>
                </li>
                <li class="relative mb-6 sm:mb-0" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1300">
                    <div class="flex items-center">
                        <div
                            class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-zinc-600 sm:ring-8 dark:ring-zinc-800 shrink-0">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <div class="hidden sm:flex w-full bg-gray-400 h-0.5 dark:bg-zinc-700"></div>
                    </div>
                    <div class="mt-3 sm:pe-8">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Student council member</h3>
                        <time
                            class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">October
                            2020 - October 2021</time>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">IT sector leader of the
                            student council</p>
                    </div>
                </li>
                <li class="relative mb-6 sm:mb-0" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1600">
                    <div class="flex items-center">
                        <div
                            class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-zinc-600 sm:ring-8 dark:ring-zinc-800 shrink-0">
                            <svg class="w-2.5 h-2.5 text-blue-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <div class="hidden sm:flex w-full bg-gray-400 h-0.5 dark:bg-zinc-700"></div>
                    </div>
                    <div class="mt-3 sm:pe-8">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Teaching Assistant</h3>
                        <time
                            class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">September
                            2023 - December 2023</time>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Teaching Assistant for the
                            course Internet and Web Technology.</p>
                    </div>
                </li>
            </ol>
        </div>
        <hr class="mt-5 mb-5 border-3 border-gray-400 dark:border-white" data-aos="fade-down" data-aos-duration="1000">
        <div class="mySkills">
            <div class="flex gap-2 items-center mb-5" data-aos="fade-down" data-aos-duration="1000"
                data-aos-delay="500">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14" />
                </svg>

                <h2 class="text-2xl font-bold tracking-wider ">Skills</h2>
            </div>
            <div class="sm:flex gap-3 justify-between">
                <div class="skills flex gap-4 p-5 bg-white border-gray-500 rounded-xl font-bold shadow mb-4 dark:bg-zinc-800 dark:border-zinc-700 "
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <svg class="w-6 h-6 text-orange-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="m3 2 1.578 17.824L12 22l7.467-2.175L21 2H3Zm14.049 6.048H9.075l.172 2.016h7.697l-.626 6.565-4.246 1.381-4.281-1.455-.288-2.932h2.024l.16 1.411 2.4.815 2.346-.763.297-3.005H7.416l-.562-6.05h10.412l-.217 2.017Z" />
                    </svg>
                    HTML
                </div>
                <div class="skills flex gap-4 p-5 bg-white border-gray-500 rounded-xl font-bold shadow mb-4 dark:bg-zinc-800 dark:border-zinc-700"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <svg class="w-6 h-6 text-blue-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="m3 2 1.578 17.834L12 22l7.468-2.165L21 2H3Zm13.3 14.722-4.293 1.204H12l-4.297-1.204-.297-3.167h2.108l.15 1.526 2.335.639 2.34-.64.245-3.05h-7.27l-.187-2.006h7.64l.174-2.006H6.924l-.176-2.006h10.506l-.954 10.71Z" />
                    </svg>

                    CSS
                </div>
                <div class="skills flex gap-4 p-5 bg-white border-gray-500 rounded-xl font-bold shadow mb-4 dark:bg-zinc-800 dark:border-zinc-700"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#FFD43B"
                            d="M0 32v448h448V32H0zm243.8 349.4c0 43.6-25.6 63.5-62.9 63.5-33.7 0-53.2-17.4-63.2-38.5l34.3-20.7c6.6 11.7 12.6 21.6 27.1 21.6 13.8 0 22.6-5.4 22.6-26.5V237.7h42.1v143.7zm99.6 63.5c-39.1 0-64.4-18.6-76.7-43l34.3-19.8c9 14.7 20.8 25.6 41.5 25.6 17.4 0 28.6-8.7 28.6-20.8 0-14.4-11.4-19.5-30.7-28l-10.5-4.5c-30.4-12.9-50.5-29.2-50.5-63.5 0-31.6 24.1-55.6 61.6-55.6 26.8 0 46 9.3 59.8 33.7L368 290c-7.2-12.9-15-18-27.1-18-12.3 0-20.1 7.8-20.1 18 0 12.6 7.8 17.7 25.9 25.6l10.5 4.5c35.8 15.3 55.9 31 55.9 66.2 0 37.8-29.8 58.6-69.7 58.6z" />
                    </svg>

                    Javascript
                </div>
                <div class="skills flex gap-4 p-5 bg-white border-gray-500 rounded-xl font-bold shadow mb-4 dark:bg-zinc-800 dark:border-zinc-700"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <svg class="w-6 h-6 text-sky-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M11.782 5.72a4.773 4.773 0 0 0-4.8 4.173 3.43 3.43 0 0 1 2.741-1.687c1.689 0 2.974 1.972 3.758 2.587a5.733 5.733 0 0 0 5.382.935c2-.638 2.934-2.865 3.137-3.921-.969 1.379-2.44 2.207-4.259 1.231-1.253-.673-2.19-3.438-5.959-3.318ZM6.8 11.979A4.772 4.772 0 0 0 2 16.151a3.431 3.431 0 0 1 2.745-1.687c1.689 0 2.974 1.972 3.758 2.587a5.733 5.733 0 0 0 5.382.935c2-.638 2.933-2.865 3.137-3.921-.97 1.379-2.44 2.208-4.259 1.231-1.253-.673-2.19-3.443-5.963-3.317Z" />
                    </svg>


                    Tailwind
                </div>
                <div class="skills flex gap-4 p-5 bg-white border-gray-500 rounded-xl font-bold shadow mb-4 dark:bg-zinc-800 dark:border-zinc-700"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 text-blue-600 "
                        viewBox="0 0 16 16">
                        <path
                            d="M6.375 7.125V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375z" />
                        <path
                            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4zm1.06 12V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396z" />
                    </svg>

                    Bootstrap
                </div>
                <div class="skills flex gap-4 p-5 bg-white border-gray-500 rounded-xl font-bold shadow mb-4 dark:bg-zinc-800 dark:border-zinc-700"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-6 h-6">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#74C0FC"
                            d="M320 104.5c171.4 0 303.2 72.2 303.2 151.5S491.3 407.5 320 407.5c-171.4 0-303.2-72.2-303.2-151.5S148.7 104.5 320 104.5m0-16.8C143.3 87.7 0 163 0 256s143.3 168.3 320 168.3S640 349 640 256 496.7 87.7 320 87.7zM218.2 242.5c-7.9 40.5-35.8 36.3-70.1 36.3l13.7-70.6c38 0 63.8-4.1 56.4 34.3zM97.4 350.3h36.7l8.7-44.8c41.1 0 66.6 3 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7h-70.7L97.4 350.3zm185.7-213.6h36.5l-8.7 44.8c31.5 0 60.7-2.3 74.8 10.7 14.8 13.6 7.7 31-8.3 113.1h-37c15.4-79.4 18.3-86 12.7-92-5.4-5.8-17.7-4.6-47.4-4.6l-18.8 96.6h-36.5l32.7-168.6zM505 242.5c-8 41.1-36.7 36.3-70.1 36.3l13.7-70.6c38.2 0 63.8-4.1 56.4 34.3zM384.2 350.3H421l8.7-44.8c43.2 0 67.1 2.5 90.2-19.1 26.1-24 32.9-66.7 14.3-88.1-9.7-11.2-25.3-16.7-46.5-16.7H417l-32.8 168.7z" />
                    </svg>

                    PHP
                </div>
                <div class="skills flex gap-4 p-5 bg-white border-gray-500 rounded-xl font-bold shadow mb-4 dark:bg-zinc-800 dark:border-zinc-700"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 7.205c4.418 0 8-1.165 8-2.602C20 3.165 16.418 2 12 2S4 3.165 4 4.603c0 1.437 3.582 2.602 8 2.602ZM12 22c4.963 0 8-1.686 8-2.603v-4.404c-.052.032-.112.06-.165.09a7.75 7.75 0 0 1-.745.387c-.193.088-.394.173-.6.253-.063.024-.124.05-.189.073a18.934 18.934 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.073a10.143 10.143 0 0 1-.852-.373 7.75 7.75 0 0 1-.493-.267c-.053-.03-.113-.058-.165-.09v4.404C4 20.315 7.037 22 12 22Zm7.09-13.928a9.91 9.91 0 0 1-.6.253c-.063.025-.124.05-.189.074a18.935 18.935 0 0 1-6.3.998c-2.135.027-4.26-.31-6.3-.998-.065-.024-.126-.05-.189-.074a10.163 10.163 0 0 1-.852-.372 7.816 7.816 0 0 1-.493-.268c-.055-.03-.115-.058-.167-.09V12c0 .917 3.037 2.603 8 2.603s8-1.686 8-2.603V7.596c-.052.031-.112.059-.165.09a7.816 7.816 0 0 1-.745.386Z" />
                    </svg>


                    MySQL
                </div>
            </div>
        </div>
        <hr class="mt-5 mb-5 border-3 border-gray-400 dark:border-white" data-aos="fade-down" data-aos-duration="1000">
        <div class="myProjects">
            <div class="flex gap-2 items-center mb-5" data-aos="fade-down" data-aos-duration="1000"
                data-aos-delay="500">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                        d="M10 12v1h4v-1m4 7H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1ZM4 5h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                </svg>

                <h2 class="text-2xl font-bold tracking-wider ">Projects</h2>
            </div>
            <div class="project sm:flex gap-4 ">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-zinc-800 dark:border-zinc-700 mb-4"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                    <div class="p-5 flex flex-col">
                        <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Bhadrika's
                            Blog
                        </h5>
                        <div class="tech flex gap-1">
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Laravel</span>
                            <span
                                class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Tailwind</span>
                        </div>
                        <p class="mb-3 mt-3 font-normal text-gray-700 dark:text-gray-400">Bhadrika's Blog shares daily
                            insights,
                            covering diverse topics, offering an intimate glimpse into my life.</p>
                        <a href="/"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-center">
                            Visit
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-zinc-800 dark:border-zinc-700 mb-4"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                    <div class="p-5 flex flex-col">
                        <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Single Sign On
                            DiAkun
                        </h5>
                        <div class="tech flex gap-1">
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Codeigniter</span>
                            <span
                                class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Tailwind</span>
                        </div>
                        <p class="mb-3 mt-3 font-normal text-gray-700 dark:text-gray-400">Single Sign On DiAkun: One
                            login for multiple services, streamlining access across platforms efficiently.</p>
                        <a href="https://sso.bhadrikais.my.id"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium justify-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                            Visit
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-zinc-800 dark:border-zinc-700 mb-4"
                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                    <div class="p-5 flex flex-col">
                        <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Nike Website
                        </h5>
                        <div class="tech flex gap-1">
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">PHP</span>
                            <span
                                class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Bootstrap
                                5</span>
                        </div>
                        <p class="mb-3 mt-3 font-normal text-gray-700 dark:text-gray-400">The Nike Website Project
                            showcases Nike products and purchases with Indonesian payment options. It's the final
                            project for the web programming course.</p>
                        <a href="https://project.bhadrikais.my.id/tubes"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium justify-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                            Visit
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </main>
</div>

<script>
    new TypeIt("#element", {
        speed: 100,
        waitUntilVisible: true,
    }).go();
</script>
@endsection