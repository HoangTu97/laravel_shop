<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CheckoutRequest;
use DB;
use Mail;
use Cart;
use Request;
use App\Order;
use App\MyCart;

class WelcomeController extends Controller
{
    public function index() {
      $product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(4)->get();
      $lasted_product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->take(4)->get();
      return view('user.pages.home', compact('product','lasted_product'));
    }

    public function loaisanpham($id) {
      $product_cate = DB::table('products')->select('id','name','image','price','alias','cate_id')->where('cate_id',$id)->paginate(9);
      $cate = DB::table('cates')->select('parent_id')->where('id',$id)->first();
      $menu_cate = DB::table('cates')->select('id','name','alias')->where('parent_id',$cate->parent_id)->get();
      $lasted_product = DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->take(4)->get();
      $bestseller = $lasted_product;
      $must_have = DB::table('products')->where('cate_id',$id)->take(2)->get();
      $name_cate = DB::table('cates')->select('name')->where('id', $id)->first();
      return view('user.pages.category', compact('product_cate','menu_cate','lasted_product','bestseller','must_have','name_cate'));
    }

    public function chitietsanpham($id) {
      $product_detail = DB::table('products')->where('id',$id)->first();
      $image = DB::table('product_images')->select('id','image')->where('product_id',$product_detail->id)->get();
      $product_cate = DB::table('products')->where('cate_id',$product_detail->cate_id)->where('id','<>',$id)->take(4)->get();
      return view('user.pages.detail', compact('product_detail','image','product_cate'));
    }

    public function get_lienhe() {
      return view('user.pages.contact');
    }

    public function post_lienhe(Request $request) {
      $data = ['hoten'=>Request::input('name'),
              'tinnhan'=>Request::input('message')];
      Mail::send('email.blanks', $data,
      function ($msg) {
        $msg->from($request->email, $request->name);
        $msg->to('peterpanphieuluuky@gmail.com','Hoang Tu', subject('[Shop] liên hệ - '.$request->name));
      });
      echo "<script>
        alert('Cám ơn bạn đá góp ý. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất');
        window.location='".url('/')."'
      </script>";
    }

    public function muahang($id) {
      $product_buy = DB::table('products')->where('id',$id)->first();
      Cart::add(array(
        'id'=>$id,
        'name'=>$product_buy->name,
        'qty'=>1,
        'price'=>$product_buy->price,
        'options'=>array('img'=>$product_buy->image)));
      return redirect()->route('giohang');
    }

    public function giohang() {
      $content = Cart::content();
      $total = Cart::total() - Cart::tax();
      return view('user.pages.shopping', compact('content','total'));
    }

    public function getThanhtoan() {
      $content = Cart::content();
      $total = Cart::total() - Cart::tax();
      return view('user.pages.checkout', compact('content','total'));
    }

    public function postThanhtoan(CheckoutRequest $request) {
      $order = new Order();
      $order->first_name = $request->first_name;
      $order->last_name = $request->last_name;
      $order->email = $request->email;
      $order->phone = $request->phone;
      $order->address1 = $request->address1;
      $order->address2 = $request->address2;
      $order->city = $request->city;
      $order->total = Cart::total() - Cart::tax();
      $order->save();
      $content = Cart::content();
      foreach($content as $item) {
          $item_info = DB::table('products')->where('id',$item->id)->first();
          $cart = new MyCart();
          $cart->order_id = $order->id;
          $cart->product_id = $item_info->id;
          $cart->price = $item_info->price;
          $cart->qty = $item->qty;
          $cart->save();
      }
      return redirect()->route('getThanhtoan')->with(['flash_level'=>'success', 'flash_message'=>'Success !!! Complete Checkout']);
    }

    public function xoasanpham($id) {
      Cart::remove($id);
      return redirect()->route('giohang');
    }

    public function capnhat() {
      if(Request::ajax()) {
        $id = Request::get('id');
        $qty = Request::get('qty');
        Cart::update($id, $qty);
        echo "Oke";
      }
    }
}
