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
                'slug' => 'pola-pikir',
                'author' => 'Nafis',
                'content' => 'Pola pikir memainkan peran penting dalam perkembangan dan kesuksesan seseorang. Dengan menerapkan pola pikir berkembang, kita dapat lebih terbuka terhadap tantangan, terus belajar, dan tidak takut gagal. Sebaliknya, pola pikir tetap dapat menghambat potensi diri. Oleh karena itu, mengubah cara berpikir menjadi lebih positif dan adaptif adalah kunci untuk mencapai pertumbuhan dan keberhasilan dalam hidup.',
                'image' => 'skils1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Adab',
                'slug' => 'adab',
                'author' => 'Ki welas',
                'content' => 'Adab adalah tata krama atau sikap yang baik yang harus dimiliki oleh setiap individu dalam berinteraksi dengan orang lain, serta dengan lingkungan sekitar. Adab mengajarkan kita untuk menghormati orang lain, menjaga sopan santun, dan bertindak sesuai dengan nilai-nilai yang benar.',
                'image' => 'logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mobile Legends',
                'slug' => 'mobile-legends',
                'author' => 'Moonton',
                'content' => 'Mobile Legends: Bang Bang adalah game MOBA yang sangat populer di platform mobile, menawarkan pengalaman bermain yang seru dan kompetitif dengan kontrol yang mudah dipelajari. Dengan pilihan hero yang beragam, mode permainan yang menarik, serta grafik yang memukau, game ini menjadi pilihan utama bagi penggemar genre MOBA di perangkat seluler. Selain itu, dengan adanya pembaruan rutin dan event menarik, Mobile Legends tetap relevan dan menyenangkan bagi pemain dari berbagai kalangan. Bagi siapa saja yang mencari tantangan baru atau ingin bermain dengan teman-teman, Mobile Legends adalah pilihan yang tepat.',
                'image' => 'skils1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Isu Sekolah Libur',
                'slug' => 'isu-sekolah-libur',
                'author' => 'Kompas TV',
                'content' => 'Selama bulan Ramadan, libur sekolah tidak berlangsung sebulan penuh, tetapi tetap ada libur awal Ramadan, libur Idul Fitri, dan cuti bersama. Pembelajaran akan berlangsung dengan penyesuaian waktu yang lebih fleksibel.',
                'image' => 'logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cara Bicara yang Baik',
                'slug' => 'cara-bicara-yang-baik',
                'author' => 'Detik News',
                'content' => 'Cara bicara yang baik adalah kunci untuk membangun hubungan yang harmonis dengan orang lain. Dengan berbicara dengan sopan, jelas, dan santun, kita dapat menghindari konflik, memperkuat komunikasi, dan menciptakan lingkungan yang positif. Oleh karena itu, penting bagi kita untuk selalu memperhatikan cara berbicara kita dan berusaha untuk selalu berkomunikasi dengan baik.',
                'image' => 'logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Presiden Bagikan Makan Siang Gratis',
                'slug' => 'presiden-bagikan-makan-siang-gratis',
                'author' => 'Kumparan',
                'content' => 'Presiden Joko Widodo membagikan makan siang gratis kepada warga yang terdampak pandemi Covid-19. Aksi ini dilakukan sebagai bentuk kepedulian pemerintah terhadap masyarakat yang membutuhkan bantuan. Dengan adanya bantuan ini, diharapkan dapat membantu meringankan beban warga yang terdampak pandemi.',
                'image' => 'logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pemberontakan G30SPKI',
                'slug' => 'peberontakan-g30spki',
                'author' => 'Drs. Soeharto',
                'content' => 'Pemberontakan G30S/PKI adalah peristiwa sejarah yang terjadi pada tanggal 30 September 1965, di mana sekelompok anggota militer dan anggota Partai Komunis Indonesia (PKI) melakukan pemberontakan terhadap pemerintah Indonesia. Pemberontakan ini berujung pada pembunuhan enam jenderal dan beberapa perwira militer lainnya. Peristiwa ini menjadi salah satu momen penting dalam sejarah Indonesia yang berdampak pada perubahan politik dan sosial di tanah air.',
                'image' => 'logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
