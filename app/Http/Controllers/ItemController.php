<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => ['string', 'required', 'min:5', 'max:30'],
            'stock' => ['integer', 'required', 'min:0', 'max:100'],
            'image' => ['file', 'required', 'mimes:png,jpg,jpeg,svg,heic', 'max:2048'],
            'desc' => ['required']
        ]);

        // maping nilai dari request
        $simpan = [
            'item_name' => $request->input('item_name'),
            'stock' => $request->input('stock'),
            'desc' => $request->input('desc'),
            'slug' => Str::slug($request->input('item_name')).random_int(0000,9999),
        ];

        // kondisi saat ada input file (image)

        if($request->hasFile('image')){
            $img = $request->file('image'); //file yang diupload dari form.
            $path = 'public/images/items'; //tempat penyimpanan file yang diupload
            $ext = $img->getClientOriginalExtension();
            $name = 'item_'.Carbon::now('Asia/jakarta')->format('dmYhis').'.'.$ext; //output : item_16122025173040.jpg
            $simpan['image'] = $name;
        }

        return $simpan;

    }
}
