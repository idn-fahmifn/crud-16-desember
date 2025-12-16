<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('barang.index');
    }

     public function create()
    {
        return view('barang.create');
    }
}
