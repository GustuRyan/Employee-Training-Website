<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Topic;
use App\Models\Modules;
use App\Models\Topik;
use App\Models\Module;
use App\Models\QuestionEssay;
use App\Models\QuestionOption;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $Topiks = ['Nasionalisme', 'Bahasa Inggris', 'Teknis Programming', 'Teknis Jaringan', 'Analisis Data'];

        foreach ($Topiks as $Topik) {
            Topic::create(['nama_topik' => $Topik]);
        }

        $modules = [
            [
                'nama_modul' => 'Kewarganegaraan',
                'judul' => 'Kewarganegaraan',
                'deskripsi' => 'Modul ini berisi soal-soal yang berkaitan dengan materi kewarganegaraan',
                'id_topik' => 1 ,
                'durasi' => 60 ,
                'jumlah_option' => 15 ,
                'jumlah_esai' => 5 ,
            ],
            [
                'nama_modul' => 'Grammar',
                'judul' => 'Grammar',
                'deskripsi' => 'Modul ini berisi soal-soal yang berkaitan dengan materi grammar bahasa inggris',
                'id_topik' => 2 , 
                'durasi' => 60 ,
                'jumlah_option' => 15 ,
                'jumlah_esai' => 5 ,
            ],
            [
                'nama_modul' => 'Java',
                'judul' => 'Java',
                'deskripsi' => 'Modul ini berisi soal-soal yang berkaitan dengan dasar programming menggunakan bahasa Java',
                'id_topik' => 3 , 
                'durasi' => 60 ,
                'jumlah_option' => 15 ,
                'jumlah_esai' => 5 ,
            ],
            [
                'nama_modul' => 'Jaringan Virtual',
                'judul' => 'Jaringan Virtual',
                'deskripsi' => 'Modul ini berisi soal-soal yang berkaitan dengan jaringan virtual',
                'id_topik' => 4 , 
                'durasi' => 60 ,
                'jumlah_option' => 15 ,
                'jumlah_esai' => 5 ,
            ],
            [
                'nama_modul' => 'Visualisasi Data',
                'judul' => 'Visualisasi Data',
                'deskripsi' => 'Modul ini berisi soal-soal yang berkaitan dengan visualisasi data',
                'id_topik' => 5 , 
                'durasi' => 60 ,
                'jumlah_option' => 15 ,
                'jumlah_esai' => 5 ,
            ]
        ];

        foreach ($modules as $module) {
            Modules::create($module);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '123',
        ]);

        $questionOptions = [
            [
                'soal' => 'Nama kabinet yang dibentuk oleh Presiden Susilo Bambang Yudhoyono disebut dengan kabinet...',
                'jawaban' => 'Kabinet Indonesia Bersatu',
                'option_a' => 'Kabinet Gotong Royong',
                'option_b' => 'Kabinet Merah-Putih',
                'option_c' => 'Kabinet Bhineka Tunggal Ika',
                'option_d' => 'Kabinet Indonesia Bersatu',
                'option_e' => 'Kabinet Pembangunan',
                'id_modul' => 1
            ],
            [
                'soal' => 'Keberadaan Pancasila telah ada sebelum perumusan 5 nilai. Namun secara yuridis, Pancasila ada pada....',
                'jawaban' => 'Pembukaan UUD 1945',
                'option_a' => 'Pembukaan UUD 1945',
                'option_b' => 'Batang Tubuh UUD 1945',
                'option_c' => 'GBHN',
                'option_d' => 'Proklamasi',
                'option_e' => 'Sumpah Pemuda',
                'id_modul' => 1
            ],
            [
                'soal' => 'UUD Sementara 1950 pernah berlaku di Indonesia pada tanggal....',
                'jawaban' => '17 Agustus 1950 s.d 5 Juli 1950',
                'option_a' => '17 Agustus 1950 s.d 5 Juli 1950',
                'option_b' => '27 Desember 1949 s.d 17 Agustus 1950',
                'option_c' => '18 Agustus 1945 s.d 27 Desember 1949',
                'option_d' => '5 Juli 1959 s.d 11 Maret 1966',
                'option_e' => '5 Juli 1959 s.d 21 Mei 1989',
                'id_modul' => 1
            ],
            [
                'soal' => 'Makna alinea pertama dalam pembukaan UUD 1945 menyebutkan bahwa....', 
                'jawaban' => 'Dalil objektif bahwa penjajahan di atas dunia harus dihapuskan',
                'option_a' => 'Adanya cita-cita nasional Indonesia',
                'option_b' => 'Dalil objektif bahwa penjajahan di atas dunia harus dihapuskan',
                'option_c' => 'Pernyataan kemerdekaan',
                'option_d' => 'Semangat persatuan dan kesatuan',
                'option_e' => 'Perjuangan rakyat Indonesia dalam kemerdekaan',
                'id_modul' => 1
            ],
            [
                'soal' => 'Spirit moral dalam pembukaan Undang-Undang Dasar 1945 yang berperan sebagai nilai instrumental pelaksanaan nasionalisme pancasila adalah....',
                'jawaban' => 'Anti penjajahan dan penindasan',
                'option_a' => 'Semangat kemerdekaan',
                'option_b' => 'Pemerintah yang berdaulat',
                'option_c' => 'Kerakyatan dengan kemufakatan',
                'option_d' => 'Anti penjajahan dan penindasan',
                'option_e' => 'Bertujuan pada keadilan sosial',
                'id_modul' => 1
            ],
            [
                'soal' => 'UU tentang pertahanan negara telah terbit sejak masa...',
                'jawaban' => 'Megawati Soekarno Putri',
                'option_a' => 'Soeharto',
                'option_b' => 'Abdurrahman Wahid',
                'option_c' => 'Megawati Soekarno Putri',
                'option_d' => 'Susilo Bambang Yudhoyono',
                'option_e' => 'Jokowi',
                'id_modul' => 1
            ],
            [
                'soal' => 'Mengembangkan sikap bahwa bangsa Indonesia merupakan bagian dari seluruh umat manusia merupakan perwujudan sila Pancasila ke....',
                'jawaban' => 'Keempat',
                'option_a' => 'Pertama',
                'option_b' => 'Kedua',
                'option_c' => 'Ketiga',
                'option_d' => 'Keempat',
                'option_e' => 'Kelima',
                'id_modul' => 1
            ],
            [
                'soal' => 'Presiden memiliki hak prerogatif, yaitu memberikan grasi, rehabilitasi, amnesti, dan abolisi yang tercantum dalam UUD 1945 pasal....',
                'jawaban' => 'Pasal 14',
                'option_a' => 'Pasal 13',
                'option_b' => 'Pasal 14',
                'option_c' => 'Pasal 15',
                'option_d' => 'Pasal 17',
                'option_e' => 'Pasal 18',
                'id_modul' => 1
            ],
            [
                'soal' => 'Pasal berapa saja dalam UUD 1945 yang mengalami perubahan saat pengesahan amandemen....', 
                'jawaban' => 'Pasal 2, 6, 8, 11, 16, 21, 24, 29, 31, 32, 33, 34, dan 36',
                'option_a' => 'Pasal 2, 6, 8, 11, 16, 23, 24, 25, 29, 30, 31, 32, dan 33',
                'option_b' => 'Pasal 2, 6, 8, 11, 16, 23, 24, 25, 26, 30, 31, 32, dan 33',
                'option_c' => 'Pasal 2, 6, 8, 11, 16, 23, 24, 29, 30, 31, 32, 33, dan 34',
                'option_d' => 'Pasal 2, 6, 8, 11, 16, 23, 24, 28, 29, 31, 33, 34, dan 35',
                'option_e' => 'Pasal 2, 6, 8, 11, 16, 21, 24, 29, 31, 32, 33, 34, dan 36',
                'id_modul' => 1
            ],
            [
                'soal' => 'Pancasila yang benar dan perlu dihayati serta diamalkan adalah Pancasila yang rumusannya tercantum dalam....',
                'jawaban' => 'Pembukaan UUD 1945',
                'option_a' => 'Pembukaan UUD 1945',
                'option_b' => 'Konstitusi RIS',
                'option_c' => 'TAP MPR RI No. ll/ MPR/ 1978',
                'option_d' => 'Buku Sutasoma',
                'option_e' => 'Kitab Arjunawijaya',
                'id_modul' => 1
            ],
            [
                'soal' => 'Negara menghormati dan memelihara bahasa daerah sebagai kekayaan budaya nasional. Hal ini tercantum dari pasal.....',
                'jawaban' => '32',
                'option_a' => '23',
                'option_b' => '24',
                'option_c' => '27',
                'option_d' => '31',
                'option_e' => '32',
                'id_modul' => 1
            ],
            [
                'soal' => 'Proklamasi kemerdekaan Indonesia terjadi pada...',
                'jawaban' => '17 Agustus 1945',
                'option_a' => '17 Agustus 1945',
                'option_b' => '17 Agustus 1946',
                'option_c' => '17 Agustus 1947',
                'option_d' => '17 Agustus 1948',
                'option_e' => '17 Agustus 1949',
                'id_modul' => 1
            ],
            [
                'soal' => 'Mewujudkan nasionalisme yang tinggi dari rakyat Indonesia, yang lebih mengutamakan kepentingan nasional daripada kepentingan golongan merupakan ....',
                'jawaban' => 'Tujuan wawasan nusantara',
                'option_a' => 'Tujuan ketahanan nasional',
                'option_b' => 'Pengertian ketahanan nasional',
                'option_c' => 'Tujuan pembangunan nasional',
                'option_d' => 'Pengertian wawasan nusantara',
                'option_e' => 'Tujuan wawasan nusantara',
                'id_modul' => 1
            ],
            [
                'soal' => 'Ketentuan-Ketentuan Pokok Pertahanan Keamanan Negara Republik Indonesia diatur melalui....', 
                'jawaban' => 'Undang-Undang Nomor 20 Tahun 1982',
                'option_a' => 'Undang-Undang Nomor 20 Tahun 1982',
                'option_b' => 'Undang-Undang Nomor 26 Tahun 1984',
                'option_c' => 'Undang-Undang Nomor 20 Tahun 1990',
                'option_d' => 'Undang-Undang Nomor 22 Tahun 1992',
                'option_e' => 'Undang-Undang Nomor 31 Tahun 1993',
                'id_modul' => 1
            ],
            [
                'soal' => 'Keberadaan nilai-nilai Pancasila dapat diperas menjadi sebuah ekasila yang dikemukakan oleh Ir. Soekarno dikenal sebagai....',
                'jawaban' => 'Gotong royong',
                'option_a' => 'Sosio-nasionalisme',
                'option_b' => 'Sosio-demokrasi',
                'option_c' => 'Berketuhanan yang berbudaya',
                'option_d' => 'Gotong royong',
                'option_e' => 'Prinsip kebangsaan',
                'id_modul' => 1
            ],
            [
                'soal' => 'Alinea pertama Pembukaan UUD 1945 merupakan suatu pernyataan yang bersifat menegaskan...',
                'jawaban' => 'Hak asasi manusia',
                'option_a' => 'Hak asasi negara',
                'option_b' => 'Hak asasi bangsa',
                'option_c' => 'Kewajiban asasi warga negara',
                'option_d' => 'Hak asasi manusia',
                'option_e' => 'Hak dan kewajiban',
                'id_modul' => 1
            ],
            [
                'soal' => 'Jika Peraturan Pemerintah Pengganti Undang-Undang tidak mendapat persetujuan DPR dalam persidangan berikut, maka...',
                'jawaban' => 'Harus dicabut',
                'option_a' => 'Harus dicabut',
                'option_b' => 'Langsung sah',
                'option_c' => 'Wajib diundangkan',
                'option_d' => 'Ditulis dalam lembaran negara',
                'option_e' => 'Diundangkan oleh Menkumham',
                'id_modul' => 1
            ],
            [
                'soal' => 'Negara memprioritaskan anggaran untuk pendidikan sekurang-kurangnya...',
                'jawaban' => '20 persen dari APBN',
                'option_a' => '10 persen dari APBN',
                'option_b' => '15 persen dari APBN',
                'option_c' => '20 persen dari APBN',
                'option_d' => '25 persen dari APBN',
                'option_e' => '30 persen dari APBN',
                'id_modul' => 1
            ],
            [
                'soal' => 'Kunci pokok sistem pemerintahan mengenai struktur organisasi sistem politik, terutama tentang hakikat sistem kabinet presidensial dalam penjelasan UUD 1945 berjumlah...', 
                'jawaban' => '7 kunci pokok',
                'option_a' => '9 kunci pokok',
                'option_b' => '7 kunci pokok',
                'option_c' => '6 kunci pokok',
                'option_d' => '5 kunci pokok',
                'option_e' => '4 kunci pokok',
                'id_modul' => 1
            ],
            [
                'soal' => 'UUD 1945 sebagai hukum yang tertinggi mempunyai fungsi...',
                'jawaban' => 'Alat kontrol dan parameter seluruh norma dan peraturan yang ada di bawahnya',
                'option_a' => 'Mengikat seluruh warga negara',
                'option_b' => 'Alat kontrol dan parameter seluruh norma dan peraturan yang ada di bawahnya',
                'option_c' => 'Memuat tugas lembaga negara dan pelaksanaannya',
                'option_d' => 'Untuk menentukan lembaga negara',
                'option_e' => 'Mengontrol jalannya pemerintahan',
                'id_modul' => 1
            ],
            [
                'soal' => 'Cinta tanah air dan bangsa dapat dibuktikan dengan cara...',
                'jawaban' => 'Mengurangi impor barang dari luar negeri agar devisa tetap stabil.',
                'option_a' => 'Mengurangi impor barang dari luar negeri agar devisa tetap stabil.',
                'option_b' => 'Mengekspor semua hasil bumi Indonesia dan mengimpor semua barang dari luar negeri.',
                'option_c' => 'Tidak melakukan hubungan dengan negara lain dan melakukan proteksi.',
                'option_d' => 'Tidak menggunakan produksi dalam negeri, meskipun mampu membelinya.',
                'option_e' => 'Berbelanja di luar negeri.',
                'id_modul' => 1
            ],
            [
                'soal' => 'Sumber tertib hukum yang dianut negara Republik Indonesia adalah sebagaimana yang tercantum di bawah ini, kecuali...',
                'jawaban' => 'UUDS',
                'option_a' => 'UUDS',
                'option_b' => 'Proklamasi',
                'option_c' => 'UUD',
                'option_d' => 'Dekrit Presiden',
                'option_e' => 'Supersemar',
                'id_modul' => 1
            ],
            [
                'soal' => 'Indonesia adalah negara yang bineka apabila dilihat dari...',
                'jawaban' => 'Budaya',
                'option_a' => 'Jenis kelamin',
                'option_b' => 'Sistem politik',
                'option_c' => 'Budaya',
                'option_d' => 'Bahasa nasional',
                'option_e' => 'Nenek moyang',
                'id_modul' => 1
            ],
            [
                'soal' => 'Kepulauan Indonesia menempati posisi silang akibatnya terjadi kontak sangat luas dengan bangsa lain. Untuk itu dibutuhkan sikap...', 
                'jawaban' => 'Waspada',
                'option_a' => 'Curiga',
                'option_b' => 'Terbuka',
                'option_c' => 'Menyatu',
                'option_d' => 'Tertutup',
                'option_e' => 'Waspada',
                'id_modul' => 1
            ],
            [
                'soal' => 'Yang memegang kekuasaan tertinggi atas AD, AL, atau AU adalah...',
                'jawaban' => 'Presiden',
                'option_a' => 'Menteri koordinator bidang politik, hukum, dan keamanan',
                'option_b' => 'Menteri pertahanan',
                'option_c' => 'Presiden',
                'option_d' => 'Panglima TNI',
                'option_e' => 'Menteri pendayagunaan aparatur negara',
                'id_modul' => 1
            ],
            [
                'soal' => 'Apabila terjadi kekosongan jabatan wakil presiden dalam masa jabatannya, presiden berhak mengajukan calon wakil presiden sebanyak...',
                'jawaban' => '2 calon',
                'option_a' => '1 calon',
                'option_b' => '2 calon',
                'option_c' => '3 calon',
                'option_d' => '4 calon',
                'option_e' => '5 calon',
                'id_modul' => 1
            ],
            [
                'soal' => 'BPUPKI diketuai oleh...',
                'jawaban' => 'Radjiman Wedyodiningrat',
                'option_a' => 'Radjiman Wedyodiningrat',
                'option_b' => 'Soekarno',
                'option_c' => 'Muh Yamin',
                'option_d' => 'Mr Supomo',
                'option_e' => 'Moh Hatta',
                'id_modul' => 1
            ],
            [
                'soal' => 'Masa jabatan Komisi Yudisial adalah selama...',
                'jawaban' => '5 tahun',
                'option_a' => '2 tahun',
                'option_b' => '3 tahun',
                'option_c' => '4 tahun',
                'option_d' => '5 tahun',
                'option_e' => '6 tahun',
                'id_modul' => 1
            ],
            [
                'soal' => 'Batas laut teritorial suatu negara adalah ... mil diukur dari garis pangkal yang ditentukan sesuai konservasi.', 
                'jawaban' => '12',
                'option_a' => '12',
                'option_b' => '120',
                'option_c' => '200',
                'option_d' => '225',
                'option_e' => '500',
                'id_modul' => 1
            ],
            [
                'soal' => 'Indonesia menerapkan sistem pemerintahan parlementer pada masa Orde Lama di tahun...',
                'jawaban' => '1950-1959',
                'option_a' => '1945-1950',
                'option_b' => '1945-1949',
                'option_c' => '1950-1959',
                'option_d' => '1945-1959',
                'option_e' => '1956-1965',
                'id_modul' => 1
            ]
        ];
        
        foreach ($questionOptions as $questionOption) {
            QuestionOption::create($questionOption);
        }

        // Seed data for QuestionEssay
        $questionEssays = [
            [
                'soal' => 'Pada masa Soekarno pergantian kabinet terjadi sebanyak ... kali.',
                'jawaban' => '4',
                'id_modul' => 1
            ],
            [
                'soal' => 'Kabinet yang pembentukannya di luar campur tangan parlemen disebut dengan...',
                'jawaban' => 'Kabinet ministerial ',
                'id_modul' => 1
            ],
            [
                'soal' => 'Dalam melaksanakan hak angket DPRD, panitia angket yang telah dibentuk harus telah menyampaikan hasil kerjanya dalam waktu paling lama ... setelah dibentuk.',
                'jawaban' => '1 tahun',
                'id_modul' => 1
            ],
            [
                'soal' => 'Kekuasaan kehakiman merupakan kekuasaan yang merdeka untuk menyelenggarakan peradilan guna menegakkan hukum dan keadilan adalah bunyi pasal...',
                'jawaban' => '24 ayat (1)',
                'id_modul' => 1
            ],
            [
                'soal' => 'Menurut UUD 1945 Pasal 1 ayat 1, Negara Indonesia ialah negara kesatuan yang berbentuk:',
                'jawaban' => 'Republik',
                'id_modul' => 1
            ],
            [
                'soal' => 'Presiden merupakan penyelenggara pemerintah negara yang tertinggi di bawah...',
                'jawaban' => 'MPR',
                'id_modul' => 1
            ],
            [
                'soal' => 'Lembaga negara yang berwenang memutus sengketa antar lembaga negara dan perselisihan hasil pemilu adalah:',
                'jawaban' => 'Mahkamah Konstitusi (MK)',
                'id_modul' => 1
            ],
            [
                'soal' => 'Kedudukan Pancasila sebagai dasar negara Indonesia tercantum pada Pembukaan UUD 1945 alinea ke:',
                'jawaban' => 'Keempat',
                'id_modul' => 1
            ],
            [
                'soal' => 'Jelaskan pengertian identitas nasional?',
                'jawaban' => 'Identitas nasional adalah ciri khas suatu bangsa sehingga membedakan dengan bangsa lain. Diantaranya ciri fisik (geografis, demografis, kultural), psikologis (kepribadian) dan ideologis.',
                'id_modul' => 1
            ],
            [
                'soal' => 'Jelaskan hubungan antara norma dan nilai!',
                'jawaban' => 'Pada dasarnya norma adalah perwujudan dari nilai. Tanpa dibuatkan norma, nilai tidak bisa praktis artinya tidak mampu berfungsi konkret dalam kehidupan sehari- hari.',
                'id_modul' => 1
            ],
            [
                'soal' => 'Sebutkan hak warga Negara menurut pasal 27 ayat 2 UUD 1945?',
                'jawaban' => 'Pasal 27 ayat (2) UUD 1945, yang menyebutkan : “Tiap-tiap warga negaraberhak atas pekerjaan dan penghidupan yang layak bagi kemanusiaan”Maksud dari isi pasal tersebut bahwa Warga Negara Indonesia memiliki haktersendiri dan berhak mendapatkan pekerjaan yang layak dan penghidupan yangnyaman tanpa ada pengekangan dari Negara itu sendiri, sehingga wargatersebut dapat hidup dengan layak dan tenang.',
                'id_modul' => 1
            ],
            [
                'soal' => 'Apa-apa saja unsur dasar Bela Negara yang perlu untuk diimplementasikan?',
                'jawaban' => 'Cinta Tanah Air, Sadar berbangsa dan bernegara Indonesia, Yakin akan Pancasila sebagai Ideologi Bangsa, Rela berkorban untuk bangsa dan Negara, Memiliki kemampuan bela Negara.',
                'id_modul' => 1
            ],
            [
                'soal' => 'Jelaskan hakikat Wawasan Nusantara?',
                'jawaban' => 'Hakikat wawasan nusantara adalah Keutuhan nusantara/nasional, dalam pengertian : cara pandang yang selalu utuh menyeluruh dalam lingkup nusantaradan demi kepentingan nasional. Berarti setiap warga negara bangsa danaparatur negara harus berfikir, bersikap dan bertindak secara utuh menyeluruhdalam lingkup dan demi kepentingan bangsa termasuk produk-produk yangdihasilkan oleh lembaga negara.',
                'id_modul' => 1
            ],
            [
                'soal' => 'Jelaskan maksud dari Asas Ketahanan Nasional?',
                'jawaban' => 'Asas ketahanan nasional Indonesia merupakan kode etik yang berlandaskanpada nilai-nilai Pancasila, Undang-Undang Dasar 1945 dan wawasan nusantara. Asas ketahanan nasional adalah kondisi prasyarat utama untuk negara-negaraberkembang yang fokus pada pertahanan kelangsungan hidup danpengembangan negara.',
                'id_modul' => 1
            ],
            [
                'soal' => 'Jelaskan apa itu Warga Negara Indonesia?',
                'jawaban' => 'Warga Negara Indonesia (WNI) adalah orang yang diakui oleh UU sebagaiwarga negara Republik Indonesia. Kepada orang ini akan diberikan Kartu TandaPenduduk, berdasarkan Kabupaten atau (khusus DKI Jakarta) Provinsi, tempatia terdaftar sebagai penduduk/warga. Kepada orang ini akan diberikan nomoridentitas yang unik (Nomor Induk Kependudukan, NIK) apabila ia telah berusia17 tahun dan mencatatkan diri di kantor pemerintahan. Paspor diberikan olehnegara kepada warga negaranya sebagai bukti identitas yang bersangkutandalam tata hukum internasional.',
                'id_modul' => 1
            ]
        ];

        foreach ($questionEssays as $questionEssay) {
            QuestionEssay::create($questionEssay);
        }

    }
}
