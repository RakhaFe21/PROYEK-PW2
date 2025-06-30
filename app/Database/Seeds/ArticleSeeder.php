<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Pengenalan CodeIgniter 4',
                'content' => 'CodeIgniter 4 adalah framework PHP terbaru yang menawarkan performa tinggi dan kemudahan dalam pengembangan aplikasi web. Framework ini dilengkapi dengan fitur-fitur modern seperti namespace, autoloading, dan dukungan untuk PHP 7.4+.

Fitur utama CodeIgniter 4:
- Performa yang lebih cepat
- Dukungan untuk PHP 7.4+
- Sistem routing yang fleksibel
- Database abstraction layer yang powerful
- Built-in security features

Framework ini sangat cocok untuk pengembangan aplikasi web skala kecil hingga menengah.',
                'status' => 'published',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Tips Mengoptimalkan Performa Website',
                'content' => 'Performansi website adalah faktor penting yang mempengaruhi user experience dan SEO. Berikut adalah beberapa tips untuk mengoptimalkan performa website Anda:

1. Optimasi Gambar
- Gunakan format gambar yang tepat (WebP, JPEG, PNG)
- Kompres gambar tanpa mengurangi kualitas
- Gunakan lazy loading untuk gambar

2. Minifikasi CSS dan JavaScript
- Gabungkan file CSS dan JS
- Hapus whitespace dan komentar yang tidak perlu
- Gunakan CDN untuk library eksternal

3. Caching
- Implementasikan browser caching
- Gunakan server-side caching
- Optimalkan database queries

4. Hosting yang Baik
- Pilih hosting dengan performa tinggi
- Gunakan CDN untuk distribusi konten global
- Monitor performa secara berkala',
                'status' => 'published',
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-1 day'))
            ],
            [
                'title' => 'Panduan Lengkap Bootstrap 5',
                'content' => 'Bootstrap 5 adalah framework CSS terbaru yang menawarkan komponen UI yang modern dan responsif. Framework ini sangat populer di kalangan developer web karena kemudahan penggunaannya dan dokumentasi yang lengkap.

Fitur Bootstrap 5:
- Grid system yang fleksibel
- Komponen UI yang siap pakai
- Dukungan untuk CSS Grid
- Utility classes yang lengkap
- Tidak bergantung pada jQuery

Bootstrap 5 sangat cocok untuk membuat website yang responsif dan modern dengan cepat.',
                'status' => 'draft',
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('-2 days'))
            ]
        ];

        $this->db->table('articles')->insertBatch($data);
    }
} 