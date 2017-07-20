<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Cate;
use App\Product;
use App\ProductImages;
use Input, File;
use Request;
use Auth;

class ProductController extends Controller
{
  public function getAdd() {
    if (Auth::check()) {
      $cate = Cate::select('name', 'id', 'parent_id')->get()->toArray();
      return view('admin.product.add', compact('cate'));
    } else {
      return redirect()->route('getLogin');
    }
  }

  public function postAdd(ProductRequest $product_request) {
    if (Auth::check()) {
      $file_name = Input::file('fImages')->getClientOriginalName();
      $product = new Product();
      $product->name = $product_request->txtName;
      $product->alias = changeTitle($product_request->txtName);
      $product->price = $product_request->txtPrice;
      $product->intro = $product_request->txtIntro;
      $product->content = $product_request->txtContent;
      $product->image = $file_name;
      $product->keywords = $product_request->txtKeywords;
      $product->description = $product_request->txtDescription;
      $product->user_id = Auth::user()->id;
      $product->cate_id = $product_request->sltParent;
      Input::file('fImages')->move('resources/upload/', $file_name);
      $product->save();

      $product_id = $product->id;
      if (Input::hasFile('fProductDetail')) {
        foreach(Input::file('fProductDetail') as $file) {
          $product_img = new ProductImages();
          if (isset($file)) {
            $product_img->image = $file->getClientOriginalName();
            $product_img->product_id = $product_id;
            $file->move('resources/upload/detail/', $file->getClientOriginalName());
            $product_img->save();
          }
        }
      }

      return redirect()->route('admin.product.getList')->with(['flash_level'=>'success', 'flash_message'=>'Success !!! Complete Add Product']);
    } else {
      return redirect()->route('getLogin');
    }
  }

  public function getList() {
    if (Auth::check()) {
      $data = Product::select('id', 'name', 'price', 'cate_id', 'created_at')->orderBy('id', 'DESC')->get()->toArray();
      return view('admin.product.list', compact('data'));
    } else {
      return redirect()->route('getLogin');
    }
  }

  public function getDelete($id) {
    if (Auth::check()) {
      $product_detail = Product::find($id)->pimages->toArray();
      foreach($product_detail as $value) {
        File::delete('resources/upload/detail/'.$value["image"]);
      }
      $product = Product::find($id);
      File::delete('resources/upload/'.$product->image);
      $product->delete($id);
      return redirect()->route('admin.product.getList')->with(['flash_level'=>'success', 'flash_message'=>'Success !!! Complete Delete Product']);
    } else {
      return redirect()->route('getLogin');
    }
  }

  public function getEdit($id) {
    if (Auth::check()) {
      $cate = Cate::select('id', 'name', 'parent_id')->get()->toArray();
      $product = Product::find($id);
      $product_image = Product::find($id)->pimages;
      return view('admin.product.edit', compact('cate', 'product', 'product_image'));
    } else {
      return redirect()->route('getLogin');
    }
  }

  public function postEdit($id, Request $request) {
    if (Auth::check()) {
      $product = Product::find($id);
      $product->name = Request::input("txtName");
      $product->alias = changeTitle(Request::input("txtName"));
      $product->price = Request::input("txtPrice");
      $product->intro = Request::input("txtIntro");
      $product->content = Request::input("txtContent");
      $product->keywords = Request::input("txtKeywords");
      $product->description = Request::input("txtDescription");
      $product->user_id = Auth::user()->id;
      $product->cate_id = Request::input("sltParent");

      $img_current = 'resources/upload/'.Request::input("img_current");
      if(!empty(Request::file('fImages'))) {
        $file_name = Request::file('fImages')->getClientOriginalName();
        $product->image = $file_name;
        Request::file('fImages')->move('resources/upload/', $file_name);
        if(File::exists($img_current)) {
          File::delete($img_current);
        }
      } else {
        echo "Không Có File";
      }

      $product->save();

      if(!empty(Request::file('fEditDetail'))) {
        foreach(Request::file('fEditDetail') as $file) {
          $product_img = new ProductImages();
          if(isset($file)) {
            $product_img->image = $file->getClientOriginalName();
            $product_img->product_id = $id;
            $file->move('resources/upload/detail/', $file->getClientOriginalName());
            $product_img->save();
          }
        }
      }
      return redirect()->route('admin.product.getList')->with(['flash_level'=>'success', 'flash_message'=>'Success !!! Complete Update Product']);
    } else {
      return redirect()->route('getLogin');
    }
  }

  public function getDelImg($id) {
    if (Auth::check()) {
      if ( Request::ajax() ) {
        $idHinh = (int)Request::get('idHinh');
        $image_detail = ProductImages::find($idHinh);
        if(!empty($image_detail)) {
          $img = 'resources/upload/detail/'.$image_detail->image;
          if(File::exists($img)) {
            File::delete($img);
          }
          $image_detail->delete();
        }
        return "Oke";
      }
    } else {
      return redirect()->route('getLogin');
    }
  }
}
