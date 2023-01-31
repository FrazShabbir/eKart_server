<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class cartController extends Controller
{
    public function index()
    {
        return view('front.cart');
    }
    public function category()
    {

        return view('front.cart_category');
    }


    public function store(Request $request){
        $request->validate([
            'report_id' => 'required',
            'report_title' => 'required',
            'report_author' => 'required',
            'report_price' => 'required',
            'report_qty' => 'required',

        ]);
        Cart::add($request->report_id, $request->report_title, $request->report_qty, $request->report_price,['model' => 'Report'])->
        associate('App\Models\Report');
        return redirect()->route('cart.index')->with('success','Your Report Added In Cart');
    }

    public function empty(Request $request){
        Cart::destroy();
        return  'Empty';
    }
    public function removeItem(Request $request){
        $request->validate([
            'itemId' => 'required',
        ]);

        Cart::remove($request->itemId);
        return redirect()->back();
    }

    public function store_category(Request $request){

        $request->validate([
            'category_id' => 'required',
            'category_title' => 'required',
            'category_price' => 'required',
            'category_qty' => 'required',
        ]);
        Cart::destroy();

        $cartItem =  Cart::add($request->category_id, $request->category_title, $request->category_qty,$request->category_price,['model' => 'Subindustry'])->
        associate('App\Models\Subindustry');
        return redirect()->route('cart.index')->with('success','Category Added In Cart');
    }


}
