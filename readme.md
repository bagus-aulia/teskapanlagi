# Form Biodata - Laravel 5.6

Aplikasi ini menampilkan form input biodata yang berada pada domain [evening-forest-35613.herokuapp.com](https://evening-forest-35613.herokuapp.com/). Data akan disimpan dalam file .txt yang berada di dalam folder `/storage/app/biodata`. Untuk daftar file yang telah tersimpan bisa diakses di halaman [Daftar Biodata](https://evening-forest-35613.herokuapp.com/biodata/list.html).

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
C:\xampp\htdocs>composer create-project –-prefer-dist laravel/laravel tes_kapanlagi
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

### 5. Push ke Heroku

Apabila ada perubahan script, Anda bisa melakukan langkah ini
<pre>
C:\xampp\htdocs\tes_kapanlagi>git add .

C:\xampp\htdocs\tes_kapanlagi>git commit -m "Keterangan Commit"

C:\xampp\htdocs\tes_kapanlagi>git push heroku master
</pre>


## Deploy ke Github

### 1. Masuk ke Web Github

Untuk men-deploy aplikasi Anda ke Github, Anda harus memiliki akun Github. Anda bisa [login](https://github.com/login) atau [daftar](https://github.com/).

### 2. Membuat Repository

- Setelah akun Anda terverifikasi, klik tombol `New Repository` berwarna hijau di Halaman Utama Anda.
- Isikan nama repository Anda dan pilih Public agar bisa diakses oleh orang lain.
- Klik tombol `Create Repository`.

### 3. Mengupload File

- Download dan install [GitHub Desktop](https://desktop.github.com/) untuk memudahkan Anda mengupload file project Anda ke Github.
- Klik tombol `Connect to GitHub`
- Login ke Akun Anda
- Karena di langkah ke 2 Anda sudah mempunyai repository, klik tombol `Clone a Repository`.
- Pilih repository yang ingin Anda clone.
- Masukkan alamat tempat project Anda berada pada inputan Local Path. *Contoh : C:\xampp\htdocs\tes_kapanlagi*
- Klik tombol `Clone`
- *(Apabila cloning gagal, buatlah folder kosong dan arahkan Local Path GitHub ke alamat folder kosong tersebut.)*
- *(Setelah cloning selesai, copy and replace project Anda sebelumnya ke folder kosong tersebut.)*
- Setelah proses cloning selesai, Anda akan ditampilkan daftar perubahan file dan inputan untuk Commit.
- Isi inputan `Summary` dengan keterangan commit Anda. Dan isi inputan `Description` apabila diperlukan.
- Klik tombol `Commit to master`.
- Klik tombol `Push origin` yang terletak pada toolbar di atas halaman.
- Cek kembali halaman repository GitHub Anda.


## Integrasi ke Scrutinizer

### 1. Masuk ke Scrutinizer

Untuk mengintegrasikan aplikasi Anda ke Scrutinizer, Anda harus login terlebih dahulu menggunakan akun GitHub. [Login](https://scrutinizer-ci.com/login).

### 2. Authorize Scrutinizer ke Akun GitHub

### 3. Melengkapi Informasi Akun

Apabila Anda belum mempunyai akun Scrutinizer, Anda akan diminta untuk melengkapi informasi akun Anda.

### 4. Menghubungkan Repository Scrutinizer dan GitHub

- Klik tombol `GitHub`.
- Isi GitHub Repository dengan alamat Repository Anda. *Contoh : bagusshinoda/teskapanlagi*
- Isi Default Config dengan `PHP`.
- Centang checkbox Test. Agar Scrutinizer menjalankan test pada script Anda.
- Klik tombol `Add Repository`
- Pada halaman repository, Anda akan ditampilkan nilai script Anda. Pilih `Run your first inspection (might take a few minutes longer)` pada pilihan
<pre>
The repository was created. What's next?
- Run your first inspection (might take a few minutes longer)
- Change the inspection configuration
- Change the tracking/notification settings
- Add collaborators to your repository
</pre>
- Nilai script Anda akan muncul setelah beberapa menit.


## Penggunaan Aplikasi

### [Halaman Utama](https://evening-forest-35613.herokuapp.com)

Pada halaman utama, Anda akan ditampilkan form mengisi Biodata yang membutuhkan data Nama, Email, Tanggal Lahir dan Alamat. Setelah disimpan, Anda akan ditampilkan [halaman pesan](https://evening-forest-35613.herokuapp.com/biodata/pesan.html) berisi teks "Terima kasih telah mengisi form".

### [Halaman Daftar File](https://evening-forest-35613.herokuapp.com/biodata/list.html)

Pada halaman daftar file, Anda akan ditampilkan daftar file yang telah tersimpan menggunakan aplikasi ini. Anda bisa mengedit ataupun menghapus file tersebut. Apabila Anda mengedit data, Anda akan diarahkan ke halaman https://evening-forest-35613.herokuapp.com/biodata/{namaFile}. {namaFile} akan disesuaikan berdasarkan nama file yang Anda ingin perbarui.


## Spesifikasi Form Biodata

### Form Biodata

Form biodata menggunakan helper [Laravel Collective](https://laravelcollective.com/docs/master/html) untuk memudahkan penulisan script. Selain itu, terdapat validasi karakter "," pada semua inputan text. Validasi tersebut menggunakan Jquery yang terletak di `/public/js/custom.js` dengan nama function `keyVallidate`.

### Menyimpan Data Kedalam File txt

Sebelum data disimpan ke dalam file txt, data tersebut divalidasi terlebih dahulu apakah inputan sudah sesuai dengan rules dari Laravel. Validasi tersebut terletak di `/app/Http/Controllers/BiodataController.php` dengan nama function `store`. Pada function ini juga terdapat pengecekean karakter "," yang akan dihapus sebelum disimpan ke dalam file berformat .txt. Penyimpanan data tersebut menggunakan fitur `Storage` dari Laravel. Script tersebut terletak di `/app/Models/Biodata.php` dengan nama function `saveToFile`.

### Halaman Feedback

Setelah data telah tersimpan, Anda akan diredirect ke halaman feedback. Halaman ini berisi pesan penyimpanan bertuliskan "Terima kasih telah mengisi form. Data Arthur berhasil disimpan!". Namun, apabila mengakses halaman ini tanpa mengisi form, pesan akan bertuliskan "Silahkan menuju halaman utama untuk mengisi form.". Untuk mengubah pesan tersebut, bisa Anda lihat di `/resources/views/biodata/message.blade.php`.

### Halaman Daftar File

Daftar semua file akan ditampilkan di halaman ini. Anda bisa memperbarui dan menghapus file yang Anda kehendaki. Terdapat beberapa proses yang berada di Halaman ini, yaitu sebagai berikut :
- Script untuk menampilkan semua daftar file berada di `/app/Http/Controllers/BiodataController.php` dengan nama function `show` dengan diproses terlebih dahulu pada model di `/app/Models/Biodata.php` dengan nama function `getAllFiles`.
- Sedangkan script untuk menampilkan data dari file yang akan diperbarui berada di `/app/Http/Controllers/BiodataController.php` dengan nama function `edit` dengan diproses terlebih dahulu menggunakan model di `/app/Models/Biodata.php` dengan nama function `getFile`. Apabila file yang ingin Anda perbarui tidak ada dalam direktori, akan muncul pesan "File Henryk tidak ditemukan!" dan penginputan pada form tersebut akan disimpan sebagai file baru.
- Dan script untuk menghapus file berada di `/app/Http/Controllers/BiodataController.php` dengan nama function `destroy` dengan diproses terlebih dahulu menggunakan model di `/app/Models/Biodata.php` dengan nama function `deleteFile`. Apabila file telah terhapus, di halaman daftar file akan muncul informasi berupa div alert berisi pesan "File Henryk berhasil dihapus.".

2018 - Bagus Aulia Al Ilhami
