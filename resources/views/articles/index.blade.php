<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nafis The Article</title>
    <!-- Link untuk Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <style>
        /* Custom class untuk gambar lingkaran */
        .card-img-circle {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin: 0 auto;
            display: block;
        }
    </style>
</head>

<body class="bg-[#F2FCFF]">

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
                        <li><a href="{{ route('home') }}" class="mx-4 hover:text-blue-700 font-bold">Home</a></li>
                        <li><a href="#skills" class="mx-4 hover:text-blue-700 font-bold">Skills</a></li>
                        <li><a href="#exp" class="mx-4 hover:text-blue-700 font-bold">Experiences</a></li>
                        <li><a href="#portfolio" class="mx-4 hover:text-blue-700 font-bold">Portfolios</a></li>
                        <li><a href="#article" class="mx-4 hover:text-blue-700 font-bold">Articles</a></li>
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

    <section class="pt-32 pb-20" id="article">
        <div class="container mx-auto py-5">
            <div class="w-full lg:w-1/2 text-center mx-auto">
                <h3 class="text-9xl uppercase text-white" style="-webkit-text-stroke: 1px black; opacity: 0.2;"
                    data-aos="zoom-in-down" data-aos-duration="1500">ARTICLES</h3>
                <h3 class="font-semibold text-5xl relative bottom-20" data-aos="fade-down" data-aos-duration="1500">All
                    Articles</h3>
            </div>
            <!-- Grid untuk artikel menggunakan Tailwind CSS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($articles as $article)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white" data-aos="fade-up"
                        data-aos-duration="1000">
                        <p class="text-base text-gray-700 text-end mr-8 mt-4">{{ $article->created_at->diffForHumans() }}</p>
                        <!-- Gambar artikel -->
                        @if ($article->image)
                            <img src="{{ url('media/images/' . $article->image) }}" class="card-img-circle"
                                alt="Article Image">
                        @endif
                        <div class="px-6 py-4">
                            <h5 class="font-bold text-xl text-center mb-4 hover:underline" data-aos="zoom-in"><a
                                    href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a></h5>
                            <p class="text-gray-700 text-base text-center mb-4" data-aos="zoom-in">
                                {{ Str::limit($article->content, 150) }}</p>
                            
                            <!-- Tombol yang lebih kecil -->
                            <div class="flex justify-between items-center " data-aos="zoom-in">
                                <div class="flex items-center space-x-4">
                                    <img class="w-7 h-7 rounded-full" src="{{ url('media/images/' . $article->image) }}"
                                        alt="Article Image" />
                                    <span class="font-medium text-3xl dark:text-white text-sm">
                                        {{ $article->author }}
                                    </span>
                                </div>
                                <a href="{{ route('articles.show', $article->slug) }}"
                                    class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700 transition">Baca
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
