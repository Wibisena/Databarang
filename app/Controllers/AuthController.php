<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function index()
    {
        // Tampilkan halaman login
        return view('login/auth');
    }

    public function login()
    {
        // Validasi form login di sini
        // Jika validasi berhasil, lakukan autentikasi dan alihkan ke halaman beranda
        // Jika validasi gagal, kembali ke halaman login dengan pesan kesalahan
    }

    public function logout()
    {
        // Lakukan logout dan alihkan ke halaman login
    }
}
