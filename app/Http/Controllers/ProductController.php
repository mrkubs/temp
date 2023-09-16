<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product = Products::all();
        return view('admin.product.index', ["title"=> "Product", "products" => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.product.create', [
            'title' => "Create Product",
            'categories' => Categories::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $message = [
            'nama.required' => 'Nama Product Tidak Boleh Kosong',
            'harga.required' => 'Harga Product Tidak Boleh Kosong',
            'harga.numeric' => 'Harga Hanya Menerima Inputan Number',
            'jenis.required' => 'Jenis Product Tidak Boleh Kosong',
            'is_ready.required' => 'Field Is_ready Tidak Boleh Kosong',
            'categories_id.required' => 'Field Categori Tidak Boleh Kosong',
            'gambar.mimes' => 'format yang diterima hanya JPG, JPEG, PNG',
            'gambar.max' => 'Ukuran Yang Diboleh Tidak Boleh Melebihi 2Mb',
            'description.required' => 'Description Product Tidak Boleh Kosong',
        ];

        $request->validate([
            'nama' => 'required|min:2',
            'harga' => 'required|numeric',
            'is_ready' => 'required|max:1',
            'jenis' => 'required',
            'categories_id' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg',
            'description' => 'required',
        ], $message);

        $namaFile = time().'-'.Str::slug($request->nama, '-').'.'.$request->gambar->extension();

        $request->gambar->move(public_path('img'), $namaFile);

        $product = new Products();

        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->is_ready = $request->is_ready;
        $product->jenis = $request->jenis;
        $product->categories_id = $request->categories_id;
        $product->gambar = $namaFile;
        $product->description = $request->description;

        $product->save();

        return redirect('/product')->with('success', 'Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('admin.product.edit',
        [
            "title" => "Edit Product",
            "product" => Products::find($id),
            "categories" => Categories::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $message = [
            'nama.required' => 'Nama Product Tidak Boleh Kosong',
            'harga.required' => 'Harga Product Tidak Boleh Kosong',
            'harga.numeric' => 'Harga Hanya Menerima Inputan Number',
            'jenis.required' => 'Jenis Product Tidak Boleh Kosong',
            'is_ready.required' => 'Field Is_ready Tidak Boleh Kosong',
            'categories_id.required' => 'Field Categori Tidak Boleh Kosong',
            'gambar.mimes' => 'format yang diterima hanya JPG, JPEG, PNG',
            'gambar.max' => 'Ukuran Yang Diboleh Tidak Boleh Melebihi 2Mb',
            'description.required' => 'Description Product Tidak Boleh Kosong',
        ];

        $request->validate([
            'nama' => 'required|min:2',
            'harga' => 'required|numeric',
            'is_ready' => 'required|max:1',
            'jenis' => 'required',
            'categories_id' => 'required',
            'gambar' => 'mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
        ], $message);

        $product = Products::find($id);

        if($request->has('gambar')){
            $path = 'img/';
            Storage::delete($path. $product->gambar);

            $namaFile = time().'-'.Str::slug($request->nama, '-').'.'.$request->gambar->extension();
            $request->gambar->move(public_path('img'), $namaFile);

            $product->gambar = $namaFile;
            $product->save();
        }

        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->is_ready = $request->is_ready;
        $product->categories_id = $request->categories_id;
        $product->jenis = $request->jenis;
        $product->description = $request->description;
        $product->save();

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $products = Products::find($id);

        $path = 'img/';
        Storage::delete($path. $products->gambar);

        $products->delete();

        return redirect('/product')->with('success', 'Berhasil dihapus');

    }
}
