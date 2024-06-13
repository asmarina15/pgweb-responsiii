<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Ragam Pasar & Kuliner Boyolali

Ragam Pasar dan Kuliner Boyolali adalah sebuah situs *webGIS* yang memberikan informasi lengkap mengenai berbagai pasar tradisional dan pilihan kuliner khas di Boyolali, Jawa Tengah. Situs ini menyajikan informasi tentang tempat-tempat kuliner terbaik, menu spesial, dan pengalaman unik yang bisa ditemukan di setiap pasar. Situs ini memiliki tujuan untuk mempromosikan kekayaan budaya dan cita rasa lokal, Ragam Pasar dan Kuliner Boyolali menjadi panduan penting bagi wisatawan dan pecinta kuliner yang ingin mengeksplorasi pesona di Boyolali.

*WebGIS* Ragam Pasar dan Kuliner Boyolali disusun dengan menerapkan beberapa komponen penting antara lain:
a. Menggunakan *platform Laravel* untuk penyusunan *webGIS* yang diintegrasikan dengan *GeoServer* untuk menampilkan data batas administrasi Kecamatan Boyolali dalam format *GeoJSON*.  *Laravel* merupakan *framework* PHP yang menjadi dasar aplikasi, menawarkan *routing, kontroler*, dan fitur lain untuk mengelola permintaan HTTP dan logika bisnis.
B. *WebGIS* ini disusun dengan bahasa pemrograman HTML, CSS, dan *JavaScript*.
c. Menggunakan *BootStrap* untuk mengatur tampilan *web* menjadi lebih menarik.
d. Menggunakan *database* seperti *MySQL/PostgreSQL* untuk menyimpan data titik persebaran pasar yang memuat nama lokasi, titik geometri, gambar, tanggal dibuat, dan foto lokasi.
e. Menggunakan API *Google Maps* untuk pencarian lokasi pada tampilan peta.

Sumber data:
a. *Google Maps* untuk persebaran titik pasar di Boyolali
b. Data *Shapefile* Batas Administrasi Kecamatan Boyolali
c. *Website*:
    - Soto Seger Mbok Giyem (https://kumparan.com/harley-b-sastha/soto-seger-mbok-giyem-kuliner-legendaris-boyolali-yang-segernya-bikin-nagih-1uF0yCPrmr4)
    - Tahu Susu (https://inibaru.id/kulinary/tahu-susu-olahan-unik-dari-susu-khas-boyolali)

Tangkapan Layar Komponen Penting
a. Tampilan Awal
    ![alt text](image.png)
b. *Dashbord*
    ![alt text](image-1.png)
c. *Map*
    ![alt text](image-2.png)
    - *Edit Point & Update Point*
        ![alt text](image-3.png)
d. *Table-point*
    ![alt text](image-4.png)
e. *About*
    ![alt text](image-5.png)
