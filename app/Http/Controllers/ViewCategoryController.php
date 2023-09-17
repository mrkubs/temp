<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\PesananDetails;

class ViewCategoryController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        
        if(Categories::where('id',$id)->exists()){
            $cate = Categories::all();
            $categories = Categories::where('id',$id)->first();
            $products = Products::where('categories_id',$categories->id)->get();
            $title = 'Menu';
            $orders = PesananDetails::count();
            return view('home.contents.menu', compact('categories','products','title','cate','orders'));

        }else{
            return redirect('/category')->with('status',"Category Doesn't Exist");
        }
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
