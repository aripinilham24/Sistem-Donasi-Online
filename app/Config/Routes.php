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
$routes->get('/dashboard', 'DashboardAdmin::index', ['filter' => 'auth']);
$routes->get('/logout', 'Auth::logout');
$routes->get('/lihatdonasi', 'Cdonasi::index');
$routes->get('/tambahdata', 'Cdonasi::tambah_data');
$routes->post('/simpan_data', 'Cdonasi::simpan_data');
$routes->get('/hapus_data/(:num)', 'Cdonasi::hapus_data/$1');
$routes->get('/edit_data/(:num)', 'Cdonasi::edit_data/$1');
$routes->post('/update_data/(:num)', 'Cdonasi::update_data/$1');
$routes->get('/lihatuser', 'Cuser::index');
$routes->get('/tambah_user', 'Cuser::create');
$routes->post('/simpan_user', 'Cuser::store');
$routes->get('/edit_user/(:num)', 'Cuser::edit/$1');
$routes->put('/update_user/(:num)', 'Cuser::update/$1');
$routes->get('/hapus_user/(:num)', 'Cuser::delete/$1');


