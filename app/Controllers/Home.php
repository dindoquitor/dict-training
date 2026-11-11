<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('homepage');
    }

    public function about(): string
    {
        return view('about');
    }

     public function test(): string
    {
        return view('test');
    }

}
