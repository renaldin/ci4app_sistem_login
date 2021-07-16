<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
        $data = [
            'title' => 'Home | Sistem Informasi B',
            'tes'   => ['satu', 'dua', 'tiga']
        ];
		return view('pages/home', $data);
	}

    public function about()
    {
        $data = [
            'title' => 'About | Sistem Informasi B'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us | Sistem Informasi B',
            'alamat'=> [
                [
                    'tipe'  => 'Rumah',
                    'alamat'=> 'Kasomalang',
                    'kota'  => 'Subang'    
                ],
                [
                    'tipe'  => 'Kosan',
                    'alamat'=> 'Cibogo',
                    'kota'  => 'Subang'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
