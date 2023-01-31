<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
class checkoutController extends Controller
{

    public function confirmOrder()
    {
       return view('confirmOrder');
    }
    public function process(Request $request)
    {

           $check_order = Order::orderBy('id','desc')->first();
           if($check_order == null){
                $orderNumber = 1;
           }else{
                $orderNumber =  ($check_order->orderNumber+1);
           }
           $today = date('Y-m-d');
           $order = new Order;
           $order->user_id = Auth()->id();
           $order->orderNumber  =  $orderNumber;
           $order->paymentStatus  =  'COD';
           $order->orderDate  =  date('Y-m-d');
           $order->trnStatus  =  'Unpaid';
           $order->paid  =  0;
           $order->paymentDate =  date('Y-m-d');
           $order->total  =  Cart::total();  ;
           $order->subtotal  =  Cart::subtotal();

           if($order->save()){
            $ids = '';
                foreach (Cart::content() as $item){
                    $orderDetail = new OrderDetail;
                    $orderDetail->orderId  = $order->id;
                    if($item->options->model == 'Subindustry'){
                        $orderDetail->subindustry_id  = $item->model->id;
                    }else{
                        $orderDetail->report_id  = $item->model->id;
                    }
                    $orderDetail->price  = $item->price;
                    $orderDetail->qty  = $item->qty;
                    $orderDetail->date  = $today;
                    $orderDetail->save();
                }

                Cart::destroy();
               return  redirect()->route('confirmOrder')->with('success','Thanks for Your Order');

           }else{
               redirect()->back()->with('error','Order Not Completed');
           }
    }
}
