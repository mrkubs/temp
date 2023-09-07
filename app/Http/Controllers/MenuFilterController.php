<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class MenuFilterController extends Controller
{
    public function index(Request $request)
    {
        //return $request->all();
        $users = Products::query();

        //filter by name
        $users->when($request->name, function($query)use ($request){
            return $query->where('name','like','%'.$request->name.'%');
        });
    }
}
