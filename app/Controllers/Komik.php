<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController{

    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {

        $data = [
            'title' => 'List Of Article | Sistem Informasi B',
            'komik' => $this->komikModel->getKomik()
        ];


        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Article Details',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        // Jika komik tidak ada di tabel
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul artikel '.$slug.' tidak ditemukan!');
        }

        return view('komik/detail', $data);
    }

    public function create()
    {
        $data = [
            'title'         => 'Add Article Data Form',
            'validation'    => \Config\Services::validation()
        ];

        return view('komik/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors'=> [
                    'required' => '{field} artikel harus diisi!',
                    'is_unique'=> '{field} artikel sudah ada.'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors'=> [
                    'required' => '{field} artikel harus diisi!'
                ]
            ],
            'temaa' => [
                'rules' => 'required',
                'errors'=> [
                    'required' => '{field} artikel harus diisi!'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors'=> [
                    'max_size'  => 'Ukuran gambar sampul terlalu besar.',
                    'is_image'  => 'Yang Anda pilih bukan gambar.',
                    'mime_in'   => 'Yang Anda pilih bukan gambar.'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create/')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
        }

        // Ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        // Apakah tidak ada gambar yang diupload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }
        

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'temaa'     => $this->request->getVar('temaa'),
            'sampul'    => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data telah ditambahkan.');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $komik = $this->komikModel->find($id);

        // cek jika gambarnya defoult
        if ($komik['sampul'] != 'default.jpg') {
            // hapus gambar dalam folder
            unlink('img/'.$komik['sampul']);
        }


        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'Data telah dihapus.');
        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        $data = [
            'title'     => 'Change Article Data',
            'validation'=> \Config\Services::validation(),
            'komik'     => $this->komikModel->getKomik($slug)
        ];

        return view('komik/edit', $data);
    }

    public function update($id)
    {
        // cek judul
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }


        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors'=> [
                    'required' => '{field} artikel harus diisi!',
                    'is_unique'=> '{field} artikel sudah ada.'
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors'=> [
                    'required' => '{field} artikel harus diisi!'
                ]
            ],
            'temaa' => [
                'rules' => 'required',
                'errors'=> [
                    'required' => '{field} artikel harus diisi!'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors'=> [
                    'max_size'  => 'Ukuran gambar sampul terlalu besar.',
                    'is_image'  => 'Yang Anda pilih bukan gambar.',
                    'mime_in'   => 'Yang Anda pilih bukan gambar.'
                ]
            ]
        ])) {
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
        }

        // Ambil gambar
        $fileSampul = $this->request->getFile('sampul');

        // Cek gambar, apakah tetap atau berubah
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // Generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            // Hapus file yang lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id'        => $id,
            'judul'     => $this->request->getVar('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getVar('penulis'),
            'temaa'     => $this->request->getVar('temaa'),
            'sampul'    => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/komik');
    }
}