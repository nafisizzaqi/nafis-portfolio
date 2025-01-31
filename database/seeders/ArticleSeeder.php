<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'title' => 'Pola pikir',
                'author' => 'Nafis',
                'content' => 'Pola pikir memainkan peran penting dalam perkembangan dan kesuksesan seseorang. Dengan menerapkan pola pikir berkembang, kita dapat lebih terbuka terhadap tantangan, terus belajar, dan tidak takut gagal. Sebaliknya, pola pikir tetap dapat menghambat potensi diri. Oleh karena itu, mengubah cara berpikir menjadi lebih positif dan adaptif adalah kunci untuk mencapai pertumbuhan dan keberhasilan dalam hidup.',
                'image' => 'skils1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Adab',
                'author' => 'Ki welas',
                'content' => 'Adab adalah tata krama atau sikap yang baik yang harus dimiliki oleh setiap individu dalam berinteraksi dengan orang lain, serta dengan lingkungan sekitar. Adab mengajarkan kita untuk menghormati orang lain, menjaga sopan santun, dan bertindak sesuai dengan nilai-nilai yang benar.',
                'image' => 'logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mobile Legends',
                'author' => 'Moonton',
                'content' => 'Mobile Legends: Bang Bang adalah game MOBA yang sangat populer di platform mobile, menawarkan pengalaman bermain yang seru dan kompetitif dengan kontrol yang mudah dipelajari. Dengan pilihan hero yang beragam, mode permainan yang menarik, serta grafik yang memukau, game ini menjadi pilihan utama bagi penggemar genre MOBA di perangkat seluler. Selain itu, dengan adanya pembaruan rutin dan event menarik, Mobile Legends tetap relevan dan menyenangkan bagi pemain dari berbagai kalangan. Bagi siapa saja yang mencari tantangan baru atau ingin bermain dengan teman-teman, Mobile Legends adalah pilihan yang tepat.',
                'image' => 'skils1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Isu Sekolah Libur',
                'author' => 'Kompas TV',
                'content' => 'Selama bulan Ramadan, libur sekolah tidak berlangsung sebulan penuh, tetapi tetap ada libur awal Ramadan, libur Idul Fitri, dan cuti bersama. Pembelajaran akan berlangsung dengan penyesuaian waktu yang lebih fleksibel.',
                'image' => 'logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
