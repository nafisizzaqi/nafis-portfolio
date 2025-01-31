<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nafis</title>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F2FCFF]">

    <!-- Navbar -->
    <section>
        <nav
            class="bg-[#CDEBF0] dark:bg-gray-900 fixed w-full h-20 z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-screen-xl flex items-center justify-between mx-auto px-4">
                <a href="#home" class="flex items-center">
                    <img src="image/logo.png" class="w-24" alt="Nafis Izzaqi Logo">
                    <span class="self-center text-3xl font-bold whitespace-nowrap dark:text-white ml-4">Nafis
                        Izzaqi</span>
                </a>
                <div class="navbar hidden md:flex md:w-auto" id="navbar-sticky">
                    <ul class="flex md:p-0 font-medium">
                        <li><a href="#home" class="mx-4 hover:text-blue-700 font-bold">Home</a></li>
                        <li><a href="#skills" class="mx-4 hover:text-blue-700 font-bold">Skills</a></li>
                        <li><a href="#exp" class="mx-4 hover:text-blue-700 font-bold">Experience</a></li>
                        <li><a href="#portfolio" class="mx-4 hover:text-blue-700 font-bold">Portfolio</a></li>
                        <li><a href="#contact" class="mx-4 hover:text-blue-700 font-bold">Contact Me</a></li>
                    </ul>
                </div>
                <!-- Mobile menu toggle button -->
                <button type="button" class="md:hidden p-2 text-gray-500 dark:text-gray-400"
                    aria-label="Toggle navigation" aria-expanded="false" onclick="toggleNavbar()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </nav>
    </section>
    <!-- End Navbar -->


    <!-- Hero Section -->
    <section id="home" class="pt-32 pb-32 bg-[#CDEBF0]">
        <div class="container">
            <div class="flex flex-wrap items-center">
                <div class="w-full lg:w-1/2 ml-28">
                    <div class="relative mt-10 " data-aos="fade-up" data-aos-duration="2000">
                        @if ($hero && $hero->image)
                            <img src="{{ asset('storage/' . $hero->image) }}" alt="Nafis Izzaqi"
                                class="max-w-full mx-auto w-72 shadow-slate-800 shadow-2xl rounded-2xl">
                        @else
                            <img src="{{ asset('image/Nafis_poto.jpg') }}" alt="Default Image"
                                class="max-w-full mx-auto w-72 shadow-slate-800 shadow-2xl rounded-2xl">
                        @endif
                    </div>
                </div>
                <div class="text-end py-10 " data-aos="fade-up" data-aos-duration="1000">
                    <h1 class="text-3xl font-bold">Hello Everyone</h1>
                    <span class="text-7xl font-bold" id="typing" style="letter-spacing: 1px;"></span>
                    <div id="typingData" data-strings='["{{ $hero->title ?? 'Nafis Izzaqi' }}"]'></div>
                    <p class="text-base mt-5 w-96 ml-6 font-semibold">
                        {{ $hero->description ?? 'Im a student at SMK 1 Tengaran majoring in RPL Im 17 years old and Im still learning about the world of programming' }}
                    </p>
                    <button id="Hire-me" type="button"
                        class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Hire Me
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->


    <!-- Skils Section -->
    <section id="skills" class="pt-28 pb-28 bg-white">
        <div class="container mx-auto text-center">
            <div class="flex flex-col items-center">
                <!-- Title Section -->
                <div class="w-full lg:w-1/2">
                    <h3 class="text-9xl uppercase text-white" style="-webkit-text-stroke: 1px black; opacity: 0.2;"
                        data-aos="zoom-in-down" data-aos-duration="1500">SKILLS</h3>
                    <h3 class="font-semibold text-5xl relative bottom-20" data-aos="fade-down" data-aos-duration="1500">
                        My Skills</h3>
                    <p class="text-lg font-bold pt-8" data-aos="fade-up" data-aos-duration="1000">I have several skills
                        including:</p>
                </div>

                <!-- Skills Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 pt-10">
                    @foreach ($skills as $skill)
                        <div class="flex flex-col justify-center" data-aos="fade-up" data-aos-duration="1000">
                            <div
                                class="transition transform hover:-translate-y-2 motion-reduce:transition-none motion-reduce:hover:transform-none max-w-sm bg-blue-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mx-2">
                                <a href="#">
                                    <!-- Perbaikan path gambar -->
                                    <img class="rounded-t-lg object-cover"
                                        src="{{ asset('media/images/' . $skill->image) }}" alt="{{ $skill->title }}" />

                                </a>
                                <p class="pt-3 text-lg font-semibold">{{ $skill->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- end skils  -->


    <!-- Experience -->
    <section id="exp" class="pt-28 pb-28 ">
        <div class="container mx-auto text-center">
            <div class="flex flex-col items-center">
                <div class="w-full lg:w-1/2">
                    <h3 class="text-9xl uppercase text-white " style="-webkit-text-stroke: 1px black;opacity: 0.2; "
                        data-aos="zoom-in-down" data-aos-duration="1500">EXPERIENCE</h3>
                    <h3 class=" font-semibold text-5xl relative bottom-20"data-aos="fade-down"
                        data-aos-duration="1500">Experience</h3>
                    <p class="text-lg pt-8" data-aos="fade-up" data-aos-duration="1000">I started learning about
                        programming in grade 10, continue to grade 11 and entered the children's carrer class/industrial
                        class</p>
                </div>

                <div class="relative container mx-auto py-16 grid grid-cols-1">

                    <div class="flex items-center justify-between relative">
                        <div class="flex items-center justify-between w-full">
                            <div class="ml-80" data-aos="fade-zoom-in" data-aos-easing="ease-in-back"
                                data-aos-delay="100" data-aos-offset="0">
                                <img class="h-4" src="image/circle.png" alt="">
                            </div>

                            <div class="mx-auto" data-aos="fade-zoom-in" data-aos-easing="ease-in-back"
                                data-aos-delay="300" data-aos-offset="0">
                                <img class="h-4" src="image/circle.png" alt="">
                            </div>

                            <div class="mr-80" data-aos="fade-zoom-in" data-aos-easing="ease-in-back"
                                data-aos-delay="500" data-aos-offset="0">
                                <img class="h-4" src="image/circle.png" alt="">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-between" style="z-index: -1;">
                                <div class="w-1/2 h-0.5 bg-blue-200 ml-80"></div>
                            </div>
                        </div>
                    </div>

                    <div class="flex">
                        @foreach ($experiences as $experience)
                            <div class="mt-10 ml-36" data-aos="fade-zoom-in" data-aos-easing="ease-in-back"
                                data-aos-delay="200" data-aos-offset="0">
                                <div class="text-sm text-black w-60 ">
                                    <h3 class="text-lg">{{ $experience->title }}</h3>
                                    <p><time datetime="2023-12-22">{{ $experience->date }}</time></p>
                                    <p class="mt-1">{{ $experience->description }}</p>
                                </div>
                            </div>
                        @endforeach


                    </div>


                </div>
            </div>
    </section>
    <!-- end Experience -->


    <!-- porttfolio -->
    <section id="portfolio" class="pt-28 pb-28">
        <div class="container mx-auto text-center">
            <div class="flex flex-col items-center">
                <div class="w-full lg:w-1/2">
                    <h3 class="text-9xl uppercase text-white" style="-webkit-text-stroke: 1px black; opacity: 0.2;"
                        data-aos="zoom-in-down" data-aos-duration="1500">PORTFOLIO</h3>
                    <h3 class="font-semibold text-5xl relative bottom-20" data-aos="fade-down" data-aos-duration="1500">Portfolio</h3>
                </div>
    
                <!-- Portfolio Grid -->
                <div class="flex flex-wrap gap-4 justify-center items-center "  data-aos="fade-up" data-aos-duration="1000">
                    @foreach ($portfolios as $portfolio)
                        <div class="relative group ">
                            <!-- Gambar Portfolio dengan overlay -->
                            <img src="{{ asset('media/images/' . $portfolio->image) }}" alt="{{ $portfolio->title }}"
                                class="cursor-pointer rounded-lg object-cover h-64 openModal" data-modal="modal{{ $portfolio->id }}">
                
                            <!-- Overlay Text di Gambar -->
                            <span class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-xl font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                                {{ $portfolio->title }}
                            </span>
                        </div>
                
                        <!-- Modal Portfolio -->
                        <div id="modal{{ $portfolio->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-20">
                            <div class="bg-white rounded-lg p-6 max-w-xl relative">
                                <!-- Gambar Portfolio di Modal -->
                                <div class="flex justify-center">
                                    <img src="{{ asset('media/images/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="w-full h-auto rounded-lg">
                                </div>
                                <h3 class="text-2xl font-semibold mt-4 text-center">{{ $portfolio->title }}</h3>
                                <p class="text-center text-gray-700 mt-4">{{ $portfolio->description }}</p>
                                <p class="text-center mt-2"><time datetime="">{{ $portfolio->date }}</time></p>
                                <button class="absolute top-2 right-2 text-white bg-red-500 rounded-full p-2 hover:bg-red-700 closeModal">
                                    ×
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </section>
    <!-- end portfolio  -->


    <!-- contact  -->
    <section id="contact" class="pt-28 pb-28">
        <div class="container mx-auto text-center">
            <div class="flex flex-col items-center">
                <div class="w-full lg:w-1/2">
                    <h3 class="text-9xl uppercase text-white" style="-webkit-text-stroke: 1px black;opacity: 0.2;"
                        data-aos="zoom-in-down" data-aos-duration="1500">Contact</h3>
                    <h3 class=" font-semibold text-5xl relative bottom-20" data-aos="fade-down"
                        data-aos-duration="1500">Contact Me</h3>
                </div>

                <div class="w-full">
                    <form action="{{ route('contact.store') }}" method="post" class="grid  ml-[27rem]">
                        @csrf
                        <div class="flex">
                            <div class="w-56 px-2 mb-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                                data-aos-duration="500">
                                <input type="text" name="name" id="name" placeholder="Your Name" required                                    class="w-full bg-blue-300 text-black p-2 rounded-2xl focus:outline-none focus:ring-blue-500 focus:ring-1 focus:border-blue-500 focus:bg-blue-400" autocomplete="off">
                            </div>

                            <div class="w-56 px-2 mb-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                                data-aos-duration="1000">
                                <input type="email" name="email" id="email" placeholder="Your Email" required
                                    class="w-full bg-blue-300 text-slate-900 p-2 rounded-2xl focus:outline-none focus:ring-blue-500 focus:ring-1 focus:border-blue-500 focus:bg-blue-400" autocomplete="off">
                            </div>
                        </div>

                        <div class="w-[28rem] px-2 mb-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                            data-aos-duration="1500">
                            <input type="text" name="subject" id="subject" placeholder="Subject" required
                                class="w-full bg-blue-300 text-slate-900 p-2 rounded-2xl focus:outline-none focus:ring-blue-500 focus:ring-1 focus:border-blue-700 focus:bg-blue-400" autocomplete="off">
                        </div>

                        <div class="w-[28rem] px-2 mb-4"data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                            data-aos-duration="2000">
                            <textarea name="message" id="message" placeholder="Message" required
                                class="w-full bg-blue-300 text-slate-900 p-2 rounded-2xl focus:outline-none focus:ring-blue-500 focus:ring-1 focus:border-blue-500 h-24 focus:bg-blue-400" autocomplete="off"></textarea>
                        </div>

                        <div class="w-[28rem] px-2"data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                            data-aos-duration="2500">
                            <button name="submit" type="submit"
                                class="text-sm font-semibold text-slate-900 bg-blue-300 py-2 px-6 rounded-full w-full hover:opacity-90 hover:bg-blue-600 hover:shadow-lg transition duration-500">Send</button>
                        </div>
                    </form>
                    @if(session('success'))
                        <div class="text-green-500 mt-4 text-center ml-6" data-aos = "fade-up" data-aos-duration="3000">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- end contact -->


    <!-- footer  -->
    <footer id="footer" class="bg-[#CDEBF0] pb-5">
        <div class="container">
            <div class="w-full pt-10">
                <div class="flex items-center justify-center mb-3 ml-28">
                    <!-- ig -->
                    <a href="https://instagram.com/apissssayangibuuu" target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center text-slate-800 hover:bg-blue-500 hover:text-white ">
                        <svg role="img" width="25" class="fill-current " viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Instagram</title>
                            <path
                                d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                        </svg>
                    </a>


                    <!-- wa -->
                    <a href="https://api.whatsapp.com/send/?phone=62895391622424" target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center hover:bg-blue-500 hover:text-white text-slate-800">
                        <svg role="img" width="25" class="fill-current" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>WhatsApp</title>
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                        </svg>
                    </a>





                    <!-- discord -->
                    <a href="https://discord.com/send/?phone=62895391622424" target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center text-slate-800 hover:bg-blue-500 hover:text-white ">
                        <svg role="img" width="25" class="fill-current" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>GitHub</title>
                            <path
                                d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                        </svg>
                    </a>

                    <!-- tiktok -->
                    <a href="https://tiktok.com/@zaqstudents" target="_blank"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center  text-slate-800 hover:bg-blue-500 hover:text-white ">
                        <svg role="img" width="25" class="fill-current" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>TikTok</title>
                            <path
                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                        </svg>
                    </a>

                </div>
                <p class="font-medium text-md text-black text-center ml-24">@copyright by <a
                        href="https://instagram.com/apissssayangibuuu" target="_blank"
                        class="hover:text-blue-500">Nafis izzaqi</a></p>
            </div>
        </div>
    </footer>
    <!-- endfooter -->



    <!-- Script for Typing Effect -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
