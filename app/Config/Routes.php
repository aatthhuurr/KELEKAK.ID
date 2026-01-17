<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Saya daftarin jalan buat nampilin form tambah data
$routes->get('tambah', 'Home::tambah');

// Saya daftarin jalan buat proses nyimpen datanya (pakai post karena kirim data)
$routes->post('simpan', 'Home::simpan');
