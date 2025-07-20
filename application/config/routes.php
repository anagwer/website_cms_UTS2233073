<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';

// Route untuk login
$route['login'] = 'login';
$route['register'] = 'login/register';

// Route untuk dashboard (TAMBAHKAN INI SEBELUM (:any))
$route['dashboard'] = 'dashboard';
$route['dashboard/(:any)'] = 'dashboard/$1'; // Tangkap semua URL di bawah /dashboard/
$route['dashboard/(:any)/(:num)'] = 'dashboard/$1/$2'; // Tangkap parameter ID

// Route untuk blog
$route['blog'] = 'welcome/blog';
$route['blog/(:num)'] = 'welcome/blog/$1';

// Route untuk halaman kategori
$route['kategori/(:any)'] = 'welcome/kategori/$1';
$route['kategori/(:any)/(:num)'] = 'welcome/kategori/$1/$2'; // Perbaiki typo $s2 -> $2

// Route untuk pencarian
$route['search'] = 'welcome/search';
$route['search/(:any)'] = 'welcome/search/$1';
$route['search/(:any)/(:num)'] = 'welcome/search/$1/$2';

// Route untuk halaman statis
$route['page/(:any)'] = 'welcome/page/$1';

$route['layanan'] = 'welcome/layanan_list'; // ← WAJIB SEBELUM (:any)
$route['layanan/(:any)'] = 'welcome/layanan/$1';

$route['portofolio'] = 'welcome/portofolio_list';
$route['portofolio/(:any)'] = 'welcome/portofolio/$1';

$route['testimonial'] = 'welcome/testimonial';
$route['testimonial/(:any)'] = 'welcome/testimonial/$1';
$route['testimonial/form']  = 'welcome/testimonial_form';
$route['testimonial/kirim_testimonial'] = 'welcome/kirim_testimonial';

$route['produk'] = 'welcome/produk';
$route['produk/detail/(:num)'] = 'welcome/produk_detail/$1';

// Route fallback (taruh paling bawah)
$route['404_override'] = 'welcome/notfound';
$route['translate_uri_dashes'] = FALSE;
$route['(:any)'] = 'welcome/single/$1'; // Hanya untuk artikel