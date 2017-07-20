<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Order;
use App\MyCart;

class DashboardController extends Controller
{
    public function index() {
      if (Auth::check()) {
        $orders = Order::select('id', 'first_name', 'last_name', 'email', 'phone', 'address1', 'address2', 'city')->orderBy('id', 'DESC')->get();
        return view('admin.order.list', compact('orders'));
      } else {
        return redirect()->route('getLogin');
      }
    }

    public function getDelete($id) {
      if (Auth::check()) {
        $user = Order::find($id);
        $user->delete($id);
        return redirect()->route('admin.order.getList')->with(['flash_level'=>'success', 'flash_message'=>'Success !!! Complete Delete Order']);
      } else {
        return redirect()->route('getLogin');
      }
    }

    public function getView($id) {
      if (Auth::check()) {
        $cart = MyCart::select('id', 'product_id', 'price', 'qty')->where('order_id', $id)->get();
        return view('admin.order.view', compact('cart'));
      } else {
        return redirect()->route('getLogin');
      }
    }
}
