<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('admin.order.index',compact('orders'));
    }

    public function orderDetails($id)
    {

        // $orderdetails = Order::with('details','details.subIndustry','details.subIndustry.reports')->findorfail($id);
        $orderdetails = OrderDetail::where('orderId',$id)->with('report','subIndustry.reports','subIndustry')->get();
        return view('admin.order.detail',compact('orderdetails'));
    }
    public function reportInfo($id)
    {
        $report = Report::where('id',$id)->with('overview')->first();
        $details = Content::where('report_id',$id)->get();
        return view('admin.order.reportInfo',compact('report','details'));
    }


    public function invoice($id)
    {
        $order = Order::with('user')->where('id',$id)->first();
        $orderdetails = OrderDetail::where('orderId',$id)->get();
        return view('admin.order.invoice',compact('orderdetails','order'));
    }


    public function myorders()
    {
          $orders = Order::with('user')->where('user_id',Auth::user()->id)->get();
        return view('admin.order.index',compact('orders'));
    }



}
