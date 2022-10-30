<!-- <p align="center"><a href="" target="_blank"><img src="https://user-images.githubusercontent.com/68214221/167259266-ebf72cd7-d495-4d04-b91f-d98c4fab4e55.png" width="400"></a></p> -->

## DEFINISI APLIKASI INVENTORY BARANG

Inventory merupakan suatu ketersediaan barang pada setiap perusahaan atau pun non-perusahaan, ini berguna untuk memanajemen stok barang yang ada di gudang agar mudah untuk di tracking.

Sehingga jika barang kekurangan atau pun kelebihan, kita bisa mudah mengetahui nya dengan sistem inventory ini, Tugas ini dibuat untuk memenuhi syarat kelulusan yakni untuk tugas akhir pada toko alat kesehatan rayyan medical, mereka membutuhkan sistem inventory barang yang bisa di track secara digital dan realtime.

## MASALAH ATAU TANTANGAN

Web Aplikasi Inventory ini dibuat untuk memudahkan karyawan dan yang lain nya agar mudah mentracking stok barang, dengan adanya aplikasi ini Rayyan Medical yakin kedepanya akan semakin mudah dan efesien dalam melakukan manajemen stok barang. Namun dalam proses pembuatan nya terdapat beberapa tantangan dan masalah.

Tantangan yang didapatkan saat mengerjakan project ini adalah :

-   melakukan research dan interview orang lain untuk kebutuhan aplikasi ini
-   sulit nya membuat tampilan untuk aplikasi ini

## SOLUSI

Solusi dari tantangan yang dihadapi adalah :

-   Melakukan interview dengan client untuk melihat apa yang mereka inginkan pada aplikasi ini.
-   Membuat design nya terlebih dahulu lalu di presentasikan ke client, sehingga jika ada revisi bisa dilakukan sebelum koding pembuatan aplikasi ini.

## PROSES PEMBUATAN

Selengkapnya di portofolio :

## ALUR PROGRAM INVENTORY

Selengkapnya di portofolio :

## CARA MENGGUNAKAN APLIKASI INVENTORY BARANG

Aplikasi ini dibuat menggunakan framework laravel 8, jadi jika ingin menggunakan aplikasi ini hal yang diperlukan adalah :

1. terinstall composer versi terbaru
2. terinstall laravel versi 8 (dengan catatan port phpmyadmin sudah berubah menjadi 8080)
3. terinstall xampp atau sejenisnya
4. terinstall php versi 8.0

Lalu untuk cara menggunakanya ikuti langkah berikut :

-   download project ini lalu simpan di htdocs local kalian
-   lalu buka project ini di kode editor favorit kalian
-   rename file .env.example menjadi .env
-   buka file .env.example lalu ubah isi pada bagian "DB_DATABASE" menjadi "db_inventory" tetapi kalian harus membuat databasenya terlebih dahulu di phpmyadmin
-   setelah itu buka terminal kalian yang sudah mengarah di project ini
-   lalu ketikan di terminal kalian

```
   composer install
```

-   lalu setelah itu jalankan perintah ini

```
   php artisan migrate:fresh --seed
```

-   masih di terminal ketikan kembali ini lalu enter

```
 php artisan storage:link
```

-   jika sampai sini kalian tidak ada masalah maka aplikasi sudah siap digunakan

Lalu untuk menjalankan aplikasi nya dengan cara berikut :

-   buka terminal yang sudah mengarah di project ini
-   lalu ketikan

```
 php artisan serve
```

-   setelah itu copy url yang muncul "http://127.0.0.1:8000/" biasanya itu yang akan tertulis
-   lalu pastekan url tersebut di browser yang kalian suka lalau klik enter

## FITUR YANG ADA DI APLIKASI INVENTORY

Fitur yang terdapat pada aplikasi ini diantaranya :

### ADMINISTRATOR

<!-- <img src="https://user-images.githubusercontent.com/68214221/167260281-0c1a8aa3-bc65-467d-84ba-c5f245a10cf3.png" width="500"> -->

<!-- Administrator dapat mengelola : -->

<!-- 1. Login dengan cara ketik di url "http://127.0.0.1:8000/login"
   <img src="https://user-images.githubusercontent.com/68214221/167260912-979f2157-5490-4b3d-8aa5-356d6ed248e7.png" width="500">

2. Melakukan CRUD(Create, Read, Update dan Delete) pada Tipe Kamar
   <img src="https://user-images.githubusercontent.com/68214221/167260309-bb4e3499-4c4f-47a1-bb88-cc046f10d9bf.png" width="500">

3. Melakukan CRUD(Create, Read, Update dan Delete) pada Fasilitas Kamar
   <img src="https://user-images.githubusercontent.com/68214221/167260308-bd2549d3-1f26-41fa-a647-73a3fc11a556.png" width="500">

4. Melakukan CRUD(Create, Read, Update dan Delete) pada Fasilitas Hotel
   <img src="https://user-images.githubusercontent.com/68214221/167260306-3b5022c6-e0d5-4f79-8621-c0486b64cd66.png" width="500">

kalian bisa mencoba nya sendiri untuk fitur admin ini -->

### KARYAWAN

<!-- <img src="https://user-images.githubusercontent.com/68214221/167260695-663dfa0d-2225-4c73-98a5-bc4964ecfcf1.png" width="500">

Resepsionis dapat mengelola :

1. Login dengan cara ketik di url "http://127.0.0.1:8000/login"
   <img src="https://user-images.githubusercontent.com/68214221/167260912-979f2157-5490-4b3d-8aa5-356d6ed248e7.png" width="500">

2. Melakukan filtering data berdasarkan tanggal check-in dan nama tamu. Serta dapat melakukan check-in kamar yang sudah dipesan dan dapat melakukan pembatalan pesan.
   <img src="https://user-images.githubusercontent.com/68214221/167260698-b6b7f038-065e-434c-b5e1-afb97c753f54.png" width="500">

3. Melihat nota reservasi pada tombol "lihat" dan tampilan nya seperti ini jika di klik.
   <img src="https://user-images.githubusercontent.com/68214221/167260781-a607e447-e1f6-4867-b32b-18c267294aef.png" width="500">

Resepsionis tidak mengatur check-out reservasi karena fitur chekc-out sudah dibuat otomatis oleh sistem.
Jika hari ini sama dengan hari check-out maka status reservasi akan berubah menjadi "check-out" secara otomatis selama halaman itu di refresh. -->

## KONTAK

Sekian project ujian dunia industri tahun 2022 milik saya ini, <br>
Jika ada yang ingin ditambahkan atau dikoreksi bisa hubungi saya ke email yang berada di portofolio ya!

Arigatou. :)

🔥 TERIMAKASIH 🔥 <br>
Terimakasih banyak untuk kalian yang udah mampir kesini, semoga mempelajari sesuatu! ❤️

```

```
