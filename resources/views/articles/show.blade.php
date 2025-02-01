<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nafis All Article</title>
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
                    <img src="{{ asset('image/logo.png') }}" class="w-24" alt="Nafis Izzaqi Logo">
                    <span class="self-center text-3xl font-bold whitespace-nowrap dark:text-white ml-4">Nafis
                        Izzaqi</span>
                </a>
                <div class="navbar hidden md:flex md:w-auto" id="navbar-sticky">
                    <ul class="flex md:p-0 font-medium">
                        <li><a href="{{ route('home') }}" class="mx-4 hover:text-blue-700 font-bold">Home</a></li>
                        <li><a href="#skills" class="mx-4 hover:text-blue-700 font-bold">Skills</a></li>
                        <li><a href="#exp" class="mx-4 hover:text-blue-700 font-bold">Experiences</a></li>
                        <li><a href="#portfolio" class="mx-4 hover:text-blue-700 font-bold">Portfolios</a></li>
                        <li><a href="{{ route('articles.index') }}" class="mx-4 hover:text-blue-700 font-bold">Articles</a></li>
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
    
    <section class="pt-32 pb-32" id="article">
    <d class="container mx-auto py-5">
        <div class="w-full lg:w-1/2 text-center mx-auto">
            <h3 class="text-9xl uppercase text-white" style="-webkit-text-stroke: 1px black; opacity: 0.2;"
                data-aos="zoom-in-down" data-aos-duration="1500">ARTICLES</h3>
            <h3 class="font-semibold text-5xl relative bottom-20" data-aos="fade-down" data-aos-duration="1500">The Articles</h3>
        </div>
        <!-- Grid untuk artikel menggunakan Tailwind CSS -->
        
                <div class="max-w-6xl mx-auto rounded overflow-hidden shadow-lg bg-white" data-aos="fade-up" data-aos-duration="1000">
                    <p class="text-base text-gray-700 text-end mr-10 mt-8">{{ $article->created_at->diffForHumans() }}</p>
                    <!-- Gambar artikel -->
                        <img src="{{ url('storage/articles/' . $article->image) }}" class="card-img-circle"
                         alt="Article Image">
                    <div class="px-6 py-4">
                        <h5 class="font-bold text-3xl text-center mb-4 mt-4" data-aos="zoom-in">{{ $article->title }}</h5>
                        
                        <p class="text-gray-700 text-base text-center mb-4 mt-8" data-aos="zoom-in">{{ $article->content }}</p>
                        
                        <!-- Tombol yang lebih kecil -->
                        <div class="flex justify-between items-center pt-14" data-aos="zoom-in">
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 rounded-full" src="{{ url('storage/articles/' . $article->image) }}" alt="Article Image" />
                                <span class="font-medium text-3xl dark:text-white text-sm">
                                    {{ $article->author }}
                                </span>
                            </div>
                            <p class="text-base text-gray-700">{{ $article->created_at->format('j F Y') }}</p>
                        </div>
                        
                    </div>
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
