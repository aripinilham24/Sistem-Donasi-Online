<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('/', 'Auth::index');
$routes->get('/', 'Beranda::index');
$routes->get('/auth/login', 'Auth::login');
$routes->post('/Auth/proses_login', 'Auth::proses_login');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/beranda', 'Beranda');
$routes->get('beranda/detail_kampanye/(:num)', 'Beranda::detail_kampanye/$1');
$routes->get('beranda/kategori/(:segment)', 'Beranda::kategori/$1');
$routes->get('/dashboard', 'DashboardAdmin::index', ['filter' => 'auth']);
$routes->get('/logout', 'Auth::logout');
$routes->get('/cdonasi', 'Cdonasi::index');
$routes->get('/tambahdata', 'Cdonasi::tambah_data');
$routes->post('/simpan_data', 'Cdonasi::simpan_data');
$routes->get('/hapus_data/(:num)', 'Cdonasi::hapus_data/$1');
$routes->get('/edit_data/(:num)', 'Cdonasi::edit_data/$1');
$routes->post('cdonasi/update_data/(:num)', 'Cdonasi::update_data/$1');
$routes->get('/lihatuser', 'Cuser::index');
$routes->get('/tambah_user', 'Cuser::create');
$routes->post('/simpan_user', 'Cuser::store');
$routes->get('/edit_user/(:num)', 'Cuser::edit/$1');
$routes->put('/update_user/(:num)', 'Cuser::update/$1');
$routes->get('/hapus_user/(:num)', 'Cuser::delete/$1');
$routes->get('cuser/setting', 'Cuser::setting');
$routes->get('cuser/edit_profile', 'Cuser::edit_profile');
$routes->post('cuser/update_profile', 'Cuser::update_profile');
$routes->get('transaksi/(:num)', 'Transaksi::index/$1');
$routes->post('transaksi/donasi/(:num)', 'Transaksi::donasi/$1');

// midtrans
$routes->post('donasi/(:num)', 'Donasi::index/$1');
$routes->get('donasi/bayar', 'Donasi::bayar');
$routes->post('donasi/callback', 'Donasi::callback');

