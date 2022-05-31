# Sistem Aduan MJII

Sistem ini adalah sistem aduan MJII yang diselenggara oleh [TEAM NODE](https://node.my). Tujuan sistem ini dibangunkan untuk memudahkan pengurusan aduan-aduan di dalam sebuah sistem.

## Fungsi-fungsi Sistem Aduan MJII

- Membaca / mengakses laporan / aduan yang baru
- Laporan dengan fungsi tag progress, solved, read & unread
- Kemaskini aduan dengan fungsi balas mesej
- Sistem admin login untuk kemudahan pengurusan aduan
- Pengguna biasa dapat mengakses laporan secara awam (hanya progress dan solved).
- Dilengkapi dengan Sistem Pengawasan Voltan & Pengawasan Status Access Point (AP)

## Cara Menggunakan Source Code AduanMJII

- Download software [GIT-SCM](https://git-scm.com/)
- Install GIT-SCM
- Download XAMPP dan Install
- Klon Source code melalui command prompt Windows atau GIT terminal

```bash
git clone https://github.com/haikal-dev/aduanmjii
```

- Dalam source code ini ada fail SQL untuk di eksport ke dalam MySQL server anda.
- Buat database baru: 'mjiinetwork' dan export fail SQL ke MySQL server
- Tetapkan konfigurasi apache2 anda ke arah C:\xampp\htdocs\aduanmjii\public
- Jalankan program XAMPP server (PHP & MYSQL)
- Akses http://localhost:80 pada browser
