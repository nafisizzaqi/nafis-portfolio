<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Artikel</title>
    <!-- Link untuk Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
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
                        <li><a href="{{ route('articles') }}" target ="_blank" class="mx-4 hover:text-blue-700 font-bold">Articles</a></li>
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
    <section class="pt-32">
    <div class="container mx-auto py-5">
        <div >
            <h2 class="text-center text-3xl font-bold mb-10">Semua Artikel</h2>
        </div>
        <!-- Grid untuk artikel menggunakan Tailwind CSS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($articles as $article)
                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                    <!-- Gambar artikel -->
                    @if ($article->image)
                        <img src="{{ url('storage/articles/' . $article->image) }}" class="card-img-circle"
                            alt="Article Image">
                    @else
                        <img src="{{ asset('default-image.jpg') }}" class="card-img-circle" alt="Default Image">
                    @endif
                    <div class="px-6 py-4">
                        <h5 class="font-bold text-xl text-center mb-4">{{ $article->title }}</h5>
                        <p class="text-gray-700 text-base text-center mb-4">{{ Str::limit($article->content, 150) }}</p>
                        <!-- Tombol yang lebih kecil -->
                        <div class="text-end">
                            <a href="#"
                                class="inline-block px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-full hover:bg-gray-700 transition">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
</body>

</html>
