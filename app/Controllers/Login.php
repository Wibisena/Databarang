<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('login/index');
    }

    public function login()
    {
        $username = $this->login->post('username');
        $password = $this->login->post('password');

        $user = $this->modeluser->check_login($username, $password);

        if ($user) {
            // Login berhasil, atur sesi atau cookie sesuai kebutuhan
            // Redirect ke halaman yang sesuai
            redirect('dashboard');
        } else {
            // Login gagal, tampilkan pesan error
            $data['error'] = 'Login gagal, cek kembali username dan password Anda.';
            $this->load->view('login', $data);
        }
        // Validasi form login di sini
        // Jika validasi berhasil, lakukan autentikasi dan alihkan ke halaman beranda
        // Jika validasi gagal, kembali ke halaman login dengan pesan kesalahan
    }

    public function logout()
    {
        // Lakukan logout dan alihkan ke halaman login
    }
}
