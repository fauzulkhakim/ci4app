<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About',
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact',
            'alamat' => [[
                'tipe' => 'Rumah',
                'alamat' => 'Wergu Wetan',
                'kota' => 'Kudus'
            ], [
                'tipe' => 'Kantor',
                'alamat' => 'Getaspejaten',
                'kota' => 'Kudus'
            ]]
        ];

        return view('pages/contact', $data);
    }
}
