<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SantriController extends Controller
{
    public function index()
    {
        return view('layouts.santri.index');
    }
}
