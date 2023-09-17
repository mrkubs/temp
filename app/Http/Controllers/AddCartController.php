<?php

namespace App\Http\Controllers;

use App\Models\PesananDetails;
use App\Models\Products;
use Illuminate\Http\Request;

class AddCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.contents.cart', [
            "title"=> "AddCart",
            "orders" => PesananDetails::count()
            ]);
    }

    public function tambah($id)
    {

            

            //$title = "Cart";
            $product = Products::findOrFail($id);
            if($product->is_ready === 0){
            return redirect('menu')->with('failed', 'Item tidak tersedia');
            }
            $cart = session()->get('cart',[]);
            if(isset($cart[$id])){
                $cart[$id]['quantity']++;
            }else{
                $cart[$id] = [
                    "name" => $product->nama,
                    "quantity" => 1,
                    "price" => $product->harga,
                    "image" => $product->gambar,
                    "category" => $product->categories,
                    "id" => $product->id
                ];
            }
            session()->put('cart', $cart);
            return redirect('/details');

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
    public function delete($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
