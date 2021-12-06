<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cfcontroller extends Controller
{
    public function __invoke()
    {
        return "jalankan script ini";
    }

    public function index() {
        return "ini adalah index";
    }
}
