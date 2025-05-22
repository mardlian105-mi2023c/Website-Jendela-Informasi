<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first(); // Ambil user pertama
        $categories = Category::all();

        if (!$user || $categories->count() == 0) {
            $this->command->warn('User atau kategori belum tersedia. Jalankan UserSeeder dan CategorySeeder terlebih dahulu.');
            return;
        }

        $newsData = [
            [
                'title' => 'Pemerintah Meningkatkan Pembangunan Infrastruktur di Wilayah Timur Indonesia',
                'content' => 'Pemerintah Indonesia semakin fokus pada pembangunan infrastruktur di wilayah Timur Indonesia. Proyek-proyek besar seperti pembangunan jalan tol, pelabuhan, dan bandara di daerah-daerah tersebut diharapkan dapat mendorong perekonomian daerah dan membuka lebih banyak peluang pekerjaan. Sebelumnya, wilayah Timur Indonesia sering kali tertinggal dalam hal infrastruktur, namun kini dengan adanya perhatian lebih, perkembangan yang signifikan dapat dirasakan dalam beberapa tahun mendatang.',
                'category' => 'Pendidikan', // Map to Pendidikan
                'image' => 'https://picsum.photos/seed/news1/600/400',
            ],
            [
                'title' => 'Pendidikan Daring Menjadi Pilihan Utama di Tengah Pandemi COVID-19',
                'content' => 'Pandemi COVID-19 telah mengubah banyak sektor kehidupan, salah satunya adalah sektor pendidikan. Sejak tahun 2020, pendidikan daring menjadi pilihan utama bagi sekolah dan universitas di seluruh Indonesia. Meskipun terdapat banyak tantangan seperti akses internet yang terbatas di beberapa daerah, pemerintah terus berupaya untuk memastikan pembelajaran tetap berjalan dengan memberikan bantuan perangkat dan paket data kepada siswa di daerah-daerah tertentu.',
                'category' => 'Pendidikan', // Map to Pendidikan
                'image' => 'https://picsum.photos/seed/news2/600/400',
            ],
            [
                'title' => 'Pemuda Indonesia Siap Hadapi Era Digital dengan Semangat Inovasi',
                'content' => 'Generasi muda Indonesia semakin menunjukkan potensi besar di dunia digital. Banyak pemuda yang terlibat dalam berbagai bidang teknologi, mulai dari startup digital hingga pengembangan perangkat lunak. Dengan semakin berkembangnya teknologi dan akses internet, pemuda Indonesia kini memiliki kesempatan untuk berinovasi dan menciptakan solusi bagi berbagai masalah yang ada, mulai dari e-commerce, pendidikan online, hingga aplikasi kesehatan.',
                'category' => 'Pendidikan', // Map to Pendidikan
                'image' => 'https://picsum.photos/seed/news3/600/400',
            ],
            [
                'title' => 'Indonesia Menjadi Tuan Rumah Konferensi ASEAN 2025',
                'content' => 'Indonesia telah terpilih menjadi tuan rumah konferensi ASEAN 2025 yang akan diadakan di Bali. Konferensi ini akan melibatkan kepala negara dan delegasi dari berbagai negara ASEAN serta para pemimpin bisnis dan akademisi. Acara ini diharapkan dapat memperkuat kerja sama antara negara-negara ASEAN dalam berbagai bidang seperti ekonomi, budaya, dan keamanan. Indonesia berharap dapat memanfaatkan kesempatan ini untuk lebih memperkenalkan budaya dan potensi ekonomi lokal kepada dunia.',
                'category' => 'Pendidikan', // Map to Pendidikan
                'image' => 'https://picsum.photos/seed/news4/600/400',
            ],
            [
                'title' => 'Banjir Besar Menghantam Jakarta, Ribuan Warga Terpaksa Mengungsi',
                'content' => 'Banjir besar melanda Jakarta pada awal tahun ini, menyebabkan ribuan warga terpaksa mengungsi dari rumah mereka. Curah hujan yang sangat tinggi ditambah dengan buruknya sistem drainase di beberapa kawasan menyebabkan banyak wilayah di Jakarta tergenang air. Pemerintah setempat bekerja sama dengan berbagai lembaga kemanusiaan untuk memberikan bantuan berupa makanan, pakaian, dan obat-obatan kepada para korban banjir.',
                'category' => 'Kesehatan', // Map to Kesehatan
                'image' => 'https://picsum.photos/seed/news5/600/400',
            ],
            [
                'title' => 'Industri Pariwisata Indonesia Mulai Bangkit Setelah Pandemi',
                'content' => 'Setelah dua tahun terpuruk akibat pandemi COVID-19, industri pariwisata Indonesia mulai menunjukkan tanda-tanda pemulihan. Destinasi wisata seperti Bali, Yogyakarta, dan Labuan Bajo kembali dipadati oleh wisatawan domestik maupun internasional. Pemerintah Indonesia telah menyiapkan berbagai program untuk menarik lebih banyak wisatawan dengan memperkenalkan paket wisata menarik serta promosi besar-besaran di media sosial.',
                'category' => 'Kesehatan', // Map to Kesehatan
                'image' => 'https://picsum.photos/seed/news6/600/400',
            ],
            [
                'title' => 'Listrik Pintar Meningkatkan Efisiensi Energi di Kota-Kota Besar',
                'content' => 'Dengan semakin berkembangnya teknologi, sistem listrik pintar mulai diimplementasikan di beberapa kota besar di Indonesia. Sistem ini memungkinkan pengelolaan penggunaan energi yang lebih efisien, mengurangi pemborosan energi, dan meningkatkan kualitas hidup masyarakat. Selain itu, sistem listrik pintar juga dapat membantu mengurangi biaya operasional untuk pemerintah dan perusahaan listrik negara.',
                'category' => 'Olahraga', // Map to Olahraga
                'image' => 'https://picsum.photos/seed/news7/600/400',
            ],
            [
                'title' => 'Pertumbuhan Ekonomi Indonesia Tumbuh Positif di Tengah Pandemi',
                'content' => 'Meskipun menghadapi tantangan besar akibat pandemi, ekonomi Indonesia mencatatkan pertumbuhan positif di kuartal pertama 2025. Pemerintah telah berhasil mengelola program pemulihan ekonomi dengan fokus pada sektor-sektor yang terdampak parah seperti pariwisata dan UMKM. Banyak perusahaan yang mulai kembali beroperasi dengan protokol kesehatan yang ketat, dan sektor manufaktur pun menunjukkan tren positif dalam beberapa bulan terakhir.',
                'category' => 'Olahraga', // Map to Olahraga
                'image' => 'https://picsum.photos/seed/news8/600/400',
            ],
            [
                'title' => 'Revolusi Kendaraan Listrik: Indonesia Siap Menjadi Pemain Utama',
                'content' => 'Industri kendaraan listrik di Indonesia menunjukkan potensi besar. Pemerintah Indonesia telah meluncurkan berbagai kebijakan untuk mendukung pengembangan kendaraan listrik, seperti pemberian insentif bagi produsen dan pembeli kendaraan listrik. Di sisi lain, banyak perusahaan otomotif global juga telah menunjukkan minat untuk berinvestasi di Indonesia dengan mendirikan pabrik-pabrik kendaraan listrik yang ramah lingkungan.',
                'category' => 'Kesehatan', // Map to Kesehatan
                'image' => 'https://picsum.photos/seed/news9/600/400',
            ],
            [
                'title' => 'Futsal Nasional Indonesia Berhasil Menjuarai Piala Asia 2025',
                'content' => 'Tim futsal nasional Indonesia berhasil meraih juara di ajang Piala Asia 2025 yang diadakan di Kuala Lumpur. Tim asuhan pelatih Fadil Suhada ini menunjukkan performa luar biasa sepanjang turnamen, mengalahkan beberapa negara kuat di Asia. Kemenangan ini menjadi sejarah besar bagi dunia futsal Indonesia dan meningkatkan harapan masyarakat terhadap tim futsal nasional di masa depan.',
                'category' => 'Olahraga', // Map to Olahraga
                'image' => 'https://picsum.photos/seed/news10/600/400',
            ],
            [
                'title' => 'Kemajuan Teknologi Pertanian di Indonesia, Solusi untuk Ketahanan Pangan',
                'content' => 'Di tengah tantangan global mengenai ketahanan pangan, Indonesia mulai mengembangkan teknologi pertanian modern yang dapat meningkatkan hasil pertanian. Teknologi seperti pertanian vertikal dan penggunaan drone untuk pemantauan tanaman mulai diterapkan di beberapa daerah. Inovasi-inovasi ini diharapkan dapat membantu petani Indonesia untuk meningkatkan hasil produksi dan mengurangi ketergantungan pada impor pangan.',
                'category' => 'Olahraga', // Map to Olahraga
                'image' => 'https://picsum.photos/seed/news11/600/400',
            ],
            [
                'title' => 'Kebijakan Pemerintah tentang Pemulihan Sektor UMKM di Indonesia',
                'content' => 'Pemerintah Indonesia telah mengeluarkan kebijakan baru untuk membantu sektor Usaha Mikro, Kecil, dan Menengah (UMKM) yang terdampak pandemi. Bantuan modal usaha, pelatihan digital, dan kemudahan akses pasar menjadi beberapa fokus utama dalam kebijakan ini. Langkah ini diambil untuk memastikan UMKM dapat bertahan dan berkembang di tengah situasi ekonomi yang belum sepenuhnya pulih.',
                'category' => 'Pendidikan', // Map to Pendidikan
                'image' => 'https://picsum.photos/seed/news12/600/400',
            ],
            [
                'title' => 'Revolusi E-Commerce di Indonesia: Pengaruh pada Industri Ritel',
                'content' => 'E-commerce di Indonesia mengalami lonjakan pesat dalam beberapa tahun terakhir, terutama sejak pandemi COVID-19. Perubahan ini mempengaruhi cara berbelanja masyarakat dan memberikan dampak signifikan pada industri ritel tradisional. Banyak toko fisik yang beralih ke platform digital untuk menjangkau pelanggan lebih luas. Perusahaan e-commerce besar seperti Tokopedia, Bukalapak, dan Shopee semakin mendominasi pasar.',
                'category' => 'Kesehatan', // Map to Kesehatan
                'image' => 'https://picsum.photos/seed/news13/600/400',
            ],
            [
                'title' => 'Peningkatan Kesadaran Lingkungan di Kalangan Generasi Muda Indonesia',
                'content' => 'Generasi muda Indonesia semakin sadar akan pentingnya menjaga kelestarian lingkungan hidup. Berbagai kampanye tentang pengurangan sampah plastik, penanaman pohon, dan penggunaan energi terbarukan semakin ramai diikuti oleh kalangan muda. Banyak komunitas yang terbentuk untuk mendukung kegiatan-kegiatan ramah lingkungan dan diharapkan dapat mempengaruhi kebijakan pemerintah dalam menangani masalah lingkungan hidup.',
                'category' => 'Olahraga', // Map to Olahraga
                'image' => 'https://picsum.photos/seed/news14/600/400',
            ]
        ];

        foreach ($newsData as $newsItem) {
            // Mengambil kategori yang sesuai berdasarkan nama kategori
            $category = Category::where('name', $newsItem['category'])->first();
            
            if ($category) {
                News::create([
                    'title' => $newsItem['title'],
                    'content' => $newsItem['content'],
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'image' => $newsItem['image'],
                ]);
            }
        }

        $this->command->info('NewsSeeder telah selesai.');
    }
}