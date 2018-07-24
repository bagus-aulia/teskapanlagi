## Deploy ke Heroku

### 1. Pengecekan Aplikasi Pendukung Heroku

Untuk men-deploy aplikasi Laravel ke [Heroku](https://www.heroku.com/), Anda harus mempunyai akun Heroku terlebih dahulu. Anda bisa [login](https://id.heroku.com/login) atau [daftar](https://signup.heroku.com/login). Setelah akun Anda terverifikasi, pastikan Anda sudah mempunyai Aplikasi Heroku, PHP (XAMPP atau WAMP), Composer, dan Git di komputer Anda. Apabila belum, Anda bisa mendownload dipage ini : [Download Heroku](https://devcenter.heroku.com/articles/getting-started-with-php#set-up), [Download WAMP](https://bitnami.com/stack/wamp/installer), [Download XAMPP](https://www.apachefriends.org/download.html), [Download Composer](https://getcomposer.org/download/), [Download Git](https://git-scm.com/downloads).

Lakukan pengecekan apakah aplikasi di atas sudah terpasang dengan menjalankan Command Prompt (cmd.exe)
- **Heroku**, login dengan akun heroku Anda.
<pre>
C:\Users\Anonim>heroku login
Enter your Heroku credentials.
Email: penggguna@contoh.com
Password: *****************
</pre>

- **PHP**, tutorial pengecekan PHP telah terinstall
<pre>
C:\Users\Anonim>php -v
PHP 7.1.18 (cli) (built: May 24 2018 18:07:46) ( ZTS MSVC14 (Visual C++ 2015) x86 )

Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.1.0, Copyright (c) 1998-2018 Zend Technologies
</pre>

- **Composer**, tutorial pengecekan Composer telah terinstall
<pre>
C:\Users\Anonim>composer -v
Composer version 1.6.5 2018-05-04 11:44:59
</pre>

- **Git**, tutorial pengecekan Git telah terinstall
<pre>
C:\Users\Anonim>git --version
git version 2.18.0.windows.1
</pre>


### 2. Pembuatan Project dan File Konfigurasi Heroku

Setelah keempat aplikasi diatas sudah terinstall, buatlah project Laravel dengan perintah :
<pre>
C:\xampp\htdocs>composer create-project –prefer-dist laravel/laravel tes_kapanlagi
</pre>
*(tes_kapanlagi menunjukkan folder project. Bisa Anda sesuaikan dengan project Anda)*

Setelah proses create-project selesai, masuklah ke dalam folder project Anda dan lakukan login ke heroku
<pre>
C:\xampp\htdocs>cd tes_kapanlagi

C:\xampp\htdocs\tes_kapanlagi>heroku login
Enter your Heroku credentials.
Email: penggguna@contoh.com
Password: *****************
</pre>

Buatlah file bernama `Procfile` tanpa ekstensi di dalam folder project Anda. Procfile merupakan file konfigurasi untuk heroku. Karena Laravel merupakan bahasa pemrograman PHP dan menggunakan web server apache, isikan file Procfile dengan script berikut
<pre>
web: vendor/bin/heroku-php-apache2 public/
</pre>
*(public merupakan folder index.php milik Laravel berada)*


### 3. Inisialisasi Git

Inisialisasikan git ke dalam folder project Anda dengan perintah cmd :
<pre>
C:\xampp\htdocs\tes_kapanlagi>git init
</pre>

Kemudian buatlah app heroku dengan perintah :
<pre>
C:\xampp\htdocs\tes_kapanlagi>heroku create
</pre>

Apabila selesai, Anda akan mendapatkan alamat domain dan folder repository dari Heroku
*(cth domain     = https://evening-forest-35613.herokuapp.com/)*
*(cth repository = https://git.heroku.com/evening-forest-35613.git)*

Build aplikasi Anda dengan perintah
<pre>
C:\xampp\htdocs\tes_kapanlagi>heroku buildpacks:set heroku/php
</pre>
*(heroku/php menunjukkan bahasa pemrograman yang Anda gunakan)*

Untuk menambahkan file project Anda ke dalam repository git, ketikkan perintah
<pre>
C:\xampp\htdocs\tes_kapanlagi>git add .
</pre>


Kemudian untuk melakukan commit atau mencatat proses dari penambahan atau perubahan script, ketikkan perintah
<pre>
C:\xampp\htdocs\tes_kapanlagi>git commit -m "Commit Pertama"
</pre>
*("Commit Pertama" bisa Anda isi keterangan proses yang sudah Anda tambahkan pada script Anda)*

Upload git Anda ke Heroku dengan perintah
<pre>
C:\xampp\htdocs\tes_kapanlagi>git push heroku master
</pre>


### 4. Pengaturan ENV Pada Heroku

Agar Laravel Anda bisa diakses, tambahkan perintah berikut untuk mengkonfigurasi project Laravel dengan domainnnya. Rincian APP bisa Anda lihat di dalam file .env pada folder project Anda.
<pre>
C:\xampp\htdocs\tes_kapanlagi>heroku config:add APP_NAME=TesKapanlagi
C:\xampp\htdocs\tes_kapanlagi>heroku config:add APP_ENV=production
C:\xampp\htdocs\tes_kapanlagi>heroku config:add APP_KEY=base64:SamS5VUd1dfJBRueY8hVFO75QBdPPptIlZefg18gIO0=
C:\xampp\htdocs\tes_kapanlagi>heroku config:add APP_DEBUG=true
C:\xampp\htdocs\tes_kapanlagi>heroku config:add APP_LOG_LEVEL=log
C:\xampp\htdocs\tes_kapanlagi>heroku config:add APP_URL=https://evening-forest-35613.herokuapp.com/
</pre>
(**APP_NAME**      berisi nama project Anda)

(**APP_ENV**       diisi production agar bisa diakses dalam bentuk alamat web)

(**APP_KEY**       berisi key project Anda)

(**APP_DEBUG**     bernilai true)

(**APP_LOG_LEVEL** berisi log)

(**APP_URL**       berisi domain yang telah Anda peroleh dari Heroku)
