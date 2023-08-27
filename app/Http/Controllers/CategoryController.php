<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('contents.category.index', 
        [
            "title" => "Categories",
            "categories" => Categories::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|min:2|unique:categories,nama',
        ],[
            'nama.required' => 'Nama Categories Harus Diisi',
            'nama.min' => 'Nama Categories Minimal 2 karakter',
            'nama.unique' => 'Nama Categories Ini Sudah Ada',
        ]);
        
        $categories = new Categories();

        $categories->nama = $request->nama;

        $categories->save();
        return redirect('/categories')->with('success', 'Berhasil menambah data');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //
        $request->validate([
            'nama' => 'required|min:2|unique:categories,nama',
        ],[
            'nama.required' => 'Nama Categories Harus Diisi',
            'nama.min' => 'Nama Categories Minimal 2 karakter',
            'nama.unique' => 'Nama Categories Ini Sudah Ada',
        ]);

        $categories = Categories::find($id);

        $categories->nama = $request->nama;
        $categories->save();

        return redirect('/cae$categories');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $categories = Categories::find($id);
        $categories->delete();

        return redirect('/categories')->with('success', 'Berhasil Menghapus Data');

    }
}
