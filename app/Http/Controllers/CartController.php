<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\MyCart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        if(Auth::user()){
            $id = Auth::user()->id;
        }else{
            $id = 0;
        }
        $carts = MyCart::where('user_id',$id)->get();
        $cart_total = $carts->sum('total');
        return view('front.cart',compact('carts','cart_total'));
    }
    public function addCart(Request $request)
    {
      // dd($request->subindustry_id);
          $subindustry_id = $request->subindustry_id;
          $report_id = $request->report_id;
          if($subindustry_id == null){
             $subindustry_id = 0;
          }
          if($report_id == null){
            $report_id = 0;
         }
          $check_cart_item =   MyCart::where('subindustry_id',$subindustry_id)->where('user_id',Auth::user()->id)->first();
          $check_cart_report = MyCart::where('report_id',$report_id)->where('user_id',Auth::user()->id)->first();
       
           if($check_cart_item){
            $new_qty = ($check_cart_item->qty+1);
            $check_cart_item->qty = $new_qty;
            $check_cart_item->total = ($check_cart_item->total * $new_qty);
            $check_cart_item->save();
        }elseif($check_cart_report){
      
            $new_qty_2 = ($check_cart_report->qty+1);
            $check_cart_report->qty = $new_qty_2;
            $check_cart_report->total =($check_cart_report->total * $new_qty_2);
            $check_cart_report->save();
        }else{
            
            $cart = new MyCart;
            $cart->subindustry_id = $request->subindustry_id;
            $cart->report_id = $request->report_id;
            $cart->price = $request->price;
            $cart->qty = 1;
            $cart->total = ($request->price*1);
            $cart->type = $request->order_type;
            $cart->user_id = Auth::user()->id;
            $cart->save();
         }
        return redirect()->route('cart.index')->with('success','Items has been added into cart');
    }
    public function deleteCart(Request $request)
    {
        $cart = MyCart::find($request->id);
        $cart->delete();
        return response([
            'status'=>true,
            'message'=>'Cart has been removed'
        ]);
    }
    public function checkout(Request $request)
    {
        $carts = MyCart::where('user_id',Auth::user()->id)->get();
        $cart_total = $carts->sum('total');
        $check_order = Order::orderBy('id','desc')->first();
        if($check_order == null){
            $orderNumber = 1;
        }else{
            $orderNumber =  ($check_order->orderNumber+1);
        }
        $today = date('Y-m-d');
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->orderNumber  =  $orderNumber;
        $order->paymentStatus  =  'COD';
        $order->orderDate  =  date('Y-m-d');
        $order->trnStatus  =  'Unpaid';
        $order->paid  =  0;
        $order->paymentDate =  date('Y-m-d');
        $order->total  =  $cart_total;
        $order->subtotal  = $cart_total;
        if($order->save()){
            foreach($carts as $cart){
                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->type = $cart->type;
                $order_detail->report_id = $cart->report_id;
                $order_detail->subindustry_id = $cart->subindustry_id;
                $order_detail->price = $cart->price;
                $order_detail->qty = $cart->qty;
                $order_detail->total = $cart->total;
                $order_detail->save();
            }
            foreach($carts as $cart){
                
                $cart = MyCart::where('user_id',Auth::user()->id)->first();
                $cart->delete();
            }
             
            return redirect()->route('homePage')->with('success','Order has been completed');
        }else{
            return redirect()->back()->with('error','Order Not Completed');
        }
    }
}
