<?php

namespace App\Controllers;

class Home extends BaseController
{
   
    public function Test(){
        return view ('Main');
    }
    public function Create(){
        echo 'hi';
    }
    public function index(): string
    {
        return view('welcome_message');
    }
}
