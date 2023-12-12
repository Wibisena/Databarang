<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

use Config\Recaptcha as RecaptchaConfig;
use App\Libraries\Recaptcha;


class Login extends BaseController
{
    protected RecaptchaConfig $config;
    protected Recaptcha $Recaptcha;
    function __construct()
    {
        $this->config = new RecaptchaConfig();
        $this->Recaptcha = new Recaptcha($this->config);
    }
    public function index()
    {
        $data['renderCaptcha'] = $this->Recaptcha->getWidget(array('data-theme'=>'light'));
        $data['renderScript'] = $this->Recaptcha->getScriptTag();
    
        return view('login/index', $data);
    }

    public function cekUser()
    {
        $iduser = $this->request->getPost('iduser');
        $pass = $this->request->getPost('pass');

        $validation = \config\services::validation();

        $valid = $this->validate([
            'iduser' => [
                'label' => 'ID User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'pass' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        if (!$valid) {
            $sessError = [
                'errIdUser' => $validation->getError('iduser'),
                'errPassword' => $validation->getError('pass')
            ];

            session()->setFlashdata($sessError);
            return redirect()->to(site_url('login/index'));
        } else {
            $modelLogin = new ModelLogin();

            $cekUserLogin = $modelLogin->find($iduser);
            if ($cekUserLogin == null) {
                $sessError = [
                    'errIdUser' => 'Maaf user tidak terdaftar',
                ];

                session()->setFlashdata($sessError);
                return redirect()->to(site_url('login/index'));
            } else {
                $passwordUser = $cekUserLogin['userpassword'];

                if (password_verify($pass, $passwordUser)) {
                    // lanjutkan
                    $idlevel = $cekUserLogin['userlevelid'];

                    $simpan_session = [
                        'iduser' => $iduser,
                        'namauser' => $cekUserLogin['usernama'],
                        'idlevel' => $idlevel
                    ];
                    session()->set($simpan_session);

                    return redirect()->to('/main/index');
                } else {
                    $sessError = [
                        'errPassword' => 'Password anda salah',
                    ];

                    session()->setFlashdata($sessError);
                    return redirect()->to(site_url('login/index'));
                }
        
            }
        }    
    }
    
    public function keluar()
    {
        session()->destroy();
        return redirect()->to('/login/index');
    }
}