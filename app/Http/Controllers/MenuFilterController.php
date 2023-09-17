<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\PesananDetails;

class MenuFilterController extends Controller
{
    public function search(Request $request)
    {
        //return $request->all();
        $products = Products::query();
        $categories = Categories::query();
        $orders = PesananDetails::count();
        $title = 'Menu';
        //filter by name
        $products->when($request->name, function($query)use ($request){
            return $query->where('nama','like','%'.$request->name.'%');
        });

        //filter by category
        $products->when($request->category, function($query) use ($request){
            return $query->where('categories_id',$request->category);
            
        });
        $category = Categories::all();

        return view('home.contents.menu', ['products' => $products->paginate(10),'title' => $title,'cate'=>$category,'orders'=>$orders]);
    }
}
