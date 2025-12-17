<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        $data = Item::all();
        return view('barang.index', compact('data'));
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
            'slug' => Str::slug($request->input('item_name')) . random_int(0000, 9999),
        ];

        // kondisi saat ada input file (image)

        if ($request->hasFile('image')) {
            $img = $request->file('image'); //file yang diupload dari form.
            $path = 'public/images/items'; //tempat penyimpanan file yang diupload
            $ext = $img->getClientOriginalExtension();
            $name = 'item_' . Carbon::now('Asia/jakarta')->format('dmYhis') . '.' . $ext; //output : item_16122025173040.jpg
            $simpan['image'] = $name; //nilai yang disimpan ke database

            // simpan file ke folder storage
            $img->storeAs($path, $name);
        }

        // simpan semua data di request ke database.
        Item::create($simpan);

        return redirect()->route('item.index')->with('success', 'Item created');

    }

    public function detail($param)
    {
        $data = Item::where('slug', $param)->firstOrFail();
        return view('barang.detail', compact('data'));
    }

    public function update(Request $request, $param)
    {
        $id = Item::where('slug', $param)->first(); //id yang dipilih.
        $data = Item::find($id->id);

        $request->validate([
            'item_name' => ['string', 'required', 'min:5', 'max:30'],
            'stock' => ['integer', 'required', 'min:0', 'max:100'],
            'image' => ['file', 'mimes:png,jpg,jpeg,svg,heic', 'max:2048'],
            'desc' => ['required']
        ]);

        // maping nilai dari request
        $simpan = [
            'item_name' => $request->input('item_name'),
            'stock' => $request->input('stock'),
            'desc' => $request->input('desc'),
            'slug' => Str::slug($request->input('item_name')) . random_int(0000, 9999),
        ];

        // kondisi saat ada input file (image)

        if ($request->hasFile('image')) {


            $old_path = 'public/images/items/' . $data->image;
            // Jika gambar lama masih tersedia, Maka hapus : 
            if($data->image && Storage::exists($old_path))
            {
                Storage::delete($old_path);
            }

            $img = $request->file('image'); //file yang diupload dari form.
            $path = 'public/images/items'; //tempat penyimpanan file yang diupload
            $ext = $img->getClientOriginalExtension();
            $name = 'item_' . Carbon::now('Asia/jakarta')->format('dmYhis') . '.' . $ext; //output : item_16122025173040.jpg
            $simpan['image'] = $name; //nilai yang disimpan ke database

            // simpan file ke folder storage
            $img->storeAs($path, $name);
        }

        // simpan semua data di request ke database.
        $data->update($simpan);
        return redirect()->route('item.index')->with('success', 'Item has been updated');


    }

}
