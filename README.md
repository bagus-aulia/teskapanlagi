## Deploy ke Heroku

Untuk men-deploy aplikasi Laravel ke [Heroku](https://www.heroku.com/), Anda harus mempunyai akun Heroku terlebih dahulu. Anda bisa [login](https://id.heroku.com/login) atau [daftar](https://signup.heroku.com/login).

Setelah akun Anda terverifikasi, pastikan Anda sudah mempunyai Aplikasi Heroku, PHP (XAMPP atau WAMP), Composer, dan Git di komputer Anda. Apabila belum, Anda bisa mendownload dipage ini : [Download Heroku](https://devcenter.heroku.com/articles/getting-started-with-php#set-up), [Download WAMP](https://bitnami.com/stack/wamp/installer), [Download XAMPP](https://www.apachefriends.org/download.html), [Download Composer](https://getcomposer.org/download/), [Download Git](https://git-scm.com/downloads).

Lakukan pengecekan apakah aplikasi diatas sudah terpasang dengan menjalankan Command Prompt (cmd.exe)
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

## Cara Penggunaan

Aplikasi ini menggunakan penyimpanan data ke file txt. File akan tersimpan di direktori **storage/app/biodata**. Demo aplikasi bisa diakses di [https://evening-forest-35613.herokuapp.com/](https://evening-forest-35613.herokuapp.com/).

Pada halaman utama, akan ditampilkan form untuk mengisi biodata.

## Cara Pembuatan Aplikasi

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell):

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[British Software Development](https://www.britishsoftware.co)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
