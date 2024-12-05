<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('dashboard', 'DashboardController::index');
// pelanggan
$routes->get('/pelanggan', 'PelangganController::index');
$routes->get('/pelanggan/create', 'PelangganController::create');
$routes->post('/pelanggan/store', 'PelangganController::store');
$routes->get('/pelanggan/edit/(:num)', 'PelangganController::edit/$1');
$routes->post('/pelanggan/update/(:num)', 'PelangganController::update/$1');
$routes->get('/pelanggan/delete/(:num)', 'PelangganController::delete/$1');

// kategori
$routes->get('/kategori', 'KategoriController::index');
$routes->get('/kategori/create', 'KategoriController::create');
$routes->post('/kategori/store', 'KategoriController::store');
$routes->get('/kategori/edit/(:num)', 'KategoriController::edit/$1');
$routes->post('/kategori/update/(:num)', 'KategoriController::update/$1');
$routes->get('/kategori/delete/(:num)', 'KategoriController::delete/$1');

// produk
$routes->get('/produk', 'ProdukController::index');
$routes->get('/produk/create', 'ProdukController::create');
$routes->post('/produk/store', 'ProdukController::store');
$routes->get('/produk/edit/(:num)', 'ProdukController::edit/$1');
$routes->post('/produk/update/(:num)', 'ProdukController::update/$1');
$routes->get('/produk/delete/(:num)', 'ProdukController::delete/$1');

// status_barang
$routes->get('/StatusBarang', 'StatusBarangController::index');
$routes->get('/StatusBarang/create', 'StatusBarangController::create');
$routes->post('/StatusBarang/store', 'StatusBarangController::store');
$routes->get('/StatusBarang/edit/(:num)', 'StatusBarangController::edit/$1');
$routes->post('/StatusBarang/update/(:num)', 'StatusBarangController::update/$1');
$routes->get('/StatusBarang/delete/(:num)', 'StatusBarangController::delete/$1');

// pesanan/booking
$routes->get('/pesanan', 'PesananController::index');
$routes->get('/pesanan/create', 'PesananController::create');
$routes->post('/pesanan/store', 'PesananController::store');
$routes->get('/pesanan/detail/(:num)', 'PesananController::detail/$1');
$routes->get('/pesanan/edit/(:num)', 'PesananController::edit/$1');
$routes->post('/pesanan/update/(:num)', 'PesananController::update/$1');
$routes->get('/pesanan/delete/(:num)', 'PesananController::delete/$1');

// Order
$routes->get('/item_pesanan', 'ItemPesananController::index');
$routes->get('/item_pesanan/(:num)', 'ItemPesananController::index/$1');
$routes->get('/item_pesanan/create/(:num)', 'ItemPesananController::create/$1');
$routes->post('/item_pesanan/store', 'ItemPesananController::store');
$routes->get('/item_pesanan/delete/(:num)', 'ItemPesananController::delete/$1');

// Bayar
$routes->get('/pembayaran', 'PembayaranController::index');
$routes->get('/pembayaran/create/(:num)', 'PembayaranController::create/$1');
$routes->post('/pembayaran/store', 'PembayaranController::store');
$routes->get('/pembayaran/delete/(:num)', 'PembayaranController::delete/$1');


// Route untuk registrasi
$routes->get('register', 'AuthController::register', ['as' => 'register']); // Halaman registrasi
$routes->post('register', 'AuthController::storeRegister'); // Proses simpan registrasi

// Route untuk login
$routes->get('login', 'AuthController::login', ['as' => 'login']); // Halaman login
$routes->post('login', 'AuthController::authenticate'); // Proses autentikasi login

// Route untuk logout
$routes->get('logout', 'AuthController::logout', ['as' => 'logout']); // Proses logout