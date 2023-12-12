<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelsurat;
use App\Models\Modelkategori;

class surat extends BaseController
{
    public function __construct()
    {
        $this->surat = new Modelsurat();
    }
    public function index()
    {
        $data = [
            'tampildata' => $this->surat->tampildata()
        ];
        return view('surat/viewsurat', $data);
    }

    public function tambah()
    {
        $modelkategori = new Modelkategori();

        $data = [
            'datakategori' => $modelkategori->findAll()
        ];
        return view('surat/formtambah', $data);
    }

    public function simpandata()
    {
        $surat_kode = $this->request->getVar('surat_kode');
        $surat_nama = $this->request->getVar('surat_nama');
        $kategori = $this->request->getVar('kategori');
        $status = $this->request->getVar('status');
        $surat_catatan = $this->request->getVar('surat_catatan');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'surat_kode' => [
                'rules' => 'required|is_unique[surat.surat_kode]',
                'label' => 'Kode surat',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada...',
                ]
            ],

            'surat_nama' => [
                'rules' => 'required',
                'label' => 'Nama surat',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

            'kategori' => [
                'rules' => 'required',
                'label' => 'Kategori',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

            'status' => [
                'rules' => 'required',
                'label' => 'Status',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

            'surat_catatan' => [
                'rules' => 'required',
                'label' => 'surat_catatan',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

            'gambar' => [
                'rules' => 'mime_in[gambar,image/png,image/jpg,image/jpeg]ext_in[gambar,png,jpg,jpeg]',
                'label' => 'Gambar',
            ]
        ]);

        if (!$valid) {
            $sess_Pesan = [
                'error' => '<div class="alert alert-danger alert dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                ' . $validation->listErrors() . '
                </div>'
            ];

            session()->setFlashdata($sess_Pesan);
            return redirect()->to('/surat/tambah');
        } else {
            $gambar = $_FILES['gambar']['name'];

            if ($gambar != NULL) {
                $namaFileGambar = $surat_kode;
                $fileGambar = $this->request->getFile('gambar');
                $fileGambar->move('upload', $namaFileGambar . '.' . $fileGambar->getExtension());

                $pathGambar = 'upload/' . $fileGambar->getName();
            } else {
                $pathGambar = '';
            }

            $this->surat->insert([
                'surat_kode' => $surat_kode,
                'surat_nama' => $surat_nama,
                'id_penerima' => $kategori,
                'surat_status' => $status,
                'surat_catatan' => $surat_catatan,
                'surat_gambar' => $pathGambar
            ]);

            $pesan_sukses = [
                'sukses' => '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Berhasil !</h5>
                Data surat dengan kode <strong> ' . $surat_kode . ' </strong> berhasil disimpan
                </div>'
            ];

            session()->setFlashdata($pesan_sukses);
            return redirect()->to('/surat/tambah');
        }
    }

    public function edit($kode)
    {
        $cekData = $this->surat->where(array('surat_kode' => $kode))->find();

        if ($cekData) {

            $modelkategori = new Modelkategori();

            $data = [
                'surat_kode' => $cekData[0]['surat_kode'],
                'surat_nama' => $cekData[0]['surat_nama'],
                'kategori' => $cekData[0]['id_penerima'],
                'status' => $cekData[0]['surat_status'],
                'surat_catatan' => $cekData[0]['surat_catatan'],
                'datakategori' => $modelkategori->findAll(),
                'gambar' => $cekData[0]['surat_gambar']
            ];
            return view('surat/formedit', $data);
        } else {
            $pesan_error = [
                'error' => '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Error !</h5>
                Data surat tidak ditemukan..
                </div>'
            ];

            session()->setFlashdata($pesan_error);
            return redirect()->to('/surat/index');
        }
    }

    public function updatedata()
    {
        $surat_kode = $this->request->getVar('surat_kode');
        $surat_nama = $this->request->getVar('surat_nama');
        $kategori = $this->request->getVar('kategori');
        $status = $this->request->getVar('status');
        $surat_catatan = $this->request->getVar('surat_catatan');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'surat_nama' => [
                'rules' => 'required',
                'label' => 'Nama surat',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

            'kategori' => [
                'rules' => 'required',
                'label' => 'Kategori',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

            'status' => [
                'rules' => 'required',
                'label' => 'Status',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

            'surat_catatan' => [
                'rules' => 'required',
                'label' => 'surat_catatan',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

            'gambar' => [
                'rules' => 'mime_in[gambar,image/png,image/jpg,image/jpeg]ext_in[gambar,png,jpg,jpeg]',
                'label' => 'Gambar',
            ]
        ]);

        if (!$valid) {
            $sess_Pesan = [
                'error' => '<div class="alert alert-danger alert dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                ' . $validation->listErrors() . '
                </div>'
            ];

            session()->setFlashdata($sess_Pesan);
            return redirect()->to('/surat/formedit');
        } else {
            $cekData = $this->surat->where('surat_kode', $surat_kode)->first();
            $pathGambarLama = $cekData['surat_gambar'];

            $gambar = $_FILES['gambar']['name'];

            if ($gambar != NULL) {
                ($pathGambarLama == '' || $pathGambarLama == null) ? '' : unlink($pathGambarLama);
                $namaFileGambar = $surat_kode;
                $fileGambar = $this->request->getFile('gambar');
                $fileGambar->move('upload', $namaFileGambar . '.' . $fileGambar->getExtension());

                $pathGambar = 'upload/' . $fileGambar->getName();
            } else {
                $pathGambar = $pathGambarLama;
            }

            $this->surat->update($surat_kode, [
                'surat_nama' => $surat_nama,
                'id_penerima' => $kategori,
                'surat_status' => $status,
                'surat_catatan' => $surat_catatan,
                'surat_gambar' => $pathGambar
            ]);

            $pesan_sukses = [
                'sukses' => '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Berhasil !</h5>
                Data surat dengan kode <strong> ' . $surat_kode . ' </strong> berhasil diupdate
                </div>'
            ];

            session()->setFlashdata($pesan_sukses);
            return redirect()->to('/surat/index');
        }
    }

    public function hapus($kode)
    {
        $cekData = $this->surat->find($kode);

        if ($cekData) {

            $pathGambarLama = './' . $cekData['surat_gambar'];
            unlink($pathGambarLama);
            // unlink($cekData['surat_gambar']);
            // unlink("./upload/333.png");
            $this->surat->delete($kode);
            $pesan_sukses = [
                'sukses' => '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Berhasil !</h5>
            Data surat dengan kode <strong> ' . $kode . ' </strong> berhasil dihapus
            </div>'
            ];

            session()->setFlashdata($pesan_sukses);
            return redirect()->to('/surat/index');
        } else {
            $pesan_error = [
                'error' => '<div class="alert alert-danger alert dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                Data surat tidak ditemukan..
                </div>'
            ];

            session()->setFlashdata($pesan_error);
            return redirect()->to('/surat/index');
        }
    }
}