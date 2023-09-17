<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetails;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function add(Request $request,$id){
        //$cart = session()->get('cart');
        //$total = 0;

        //foreach ($cart as $data) {
        //$total_harga = $data['price'] * $data['quantity'];
        //$qty = $data['quantity'];
        //}

        $product = Products::where('id',$id)->first();
        //$tanggal = Carbon::now();

        //Product Status Validation
        if($product->is_ready === 0){
            return redirect('details')->with('failed', 'Item tidak tersedia');
        }

        //Validation order
        $order_check = Pesanan::where('status',0)->first();

        //Post to pesanan
        if(empty($order_check)){
            $order = session()->get('cart');

            $order = new Pesanan();
            $order->nomeja = $request->nomeja;
            $order->status = 0;
            $order->total_harga = 0;
            $order->nama_pemesan = $request->nama;
            $order->no_hp = $request->number;
            $order->save();
        }
        
    

        //Post to pesanan details
        $new_order = Pesanan::where('status',0)->first();
         //Check Order Details
        $check_order_details = PesananDetails::where('products_id',$product->id)->where('pesanan_id',$new_order->id)->first();

        if(empty($check_order_details)){
            $order_detail = session()->get('cart');

            $order_detail = new PesananDetails();
            $order_detail->pesanan_id = $new_order->id;
            $order_detail->products_id = $product->id;
            $order_detail->qty = $request->quantity;
            $order_detail->total_harga = $product->harga*$request->quantity;
            $order_detail->save();
        } else {
            $order_detail = session()->get('cart');

            $order_detail = PesananDetails::where('products_id',$product->id)->where('pesanan_id',$new_order->id)->first();
            $order_detail->qty = $order_detail->qty+$request->quantity;
            $new_price = $product->harga*$request->quantity;
            $order_detail->total_harga = $order_detail->total_harga+$new_price;
            $order_detail->update();
        }
    
        //total price
        $order = Pesanan::where('status',0)->first();
        $order->total_harga =  $order->total_harga+$product->harga*$request->quantity;
        $order->update();

        return redirect('menu')->with('added', 'Add to Cart Successfully');
    }


    public function index(){

        return view('home.contents.order', [
            "title"=> "Orders",
            "order" => Pesanan::all(),
            "orders" => PesananDetails::count(),
            "order_details" => PesananDetails::all()
            ]);

    }
}
