<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CateRequest;
use App\Cate;
use Auth;

class CateController extends Controller
{
  public function getAdd() {
    if(Auth::check()) {
      $parent = Cate::select('id', 'name', 'parent_id')->get()->toArray();
      return view('admin.cate.add', compact('parent'));
    } else {
      return redirect()->route('getLogin');
    }
  }

  public function postAdd(CateRequest $request) {
    if(Auth::check()) {
      $cate = new Cate;
      $cate->name = $request->txtCateName;
      $cate->alias = changeTitle($request->txtCateName);
      $cate->order = $request->txtOrder;
      $cate->parent_id = $request->sltParent;
      $cate->keywords = $request->txtKeywords;
      $cate->description = $request->txtDescription;
      $cate->save();

      return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success','flash_message'=>'Success !!! Complete Add Category']);
    } else {
      return redirect()->route('getLogin');
    }
  }

  public function getList() {
    if(Auth::check()) {
      $data = Cate::select('id', 'name', 'parent_id')->orderBy('id', 'DESC')->get()->toArray();
      return view('admin.cate.list', compact('data'));
    } else {
      return redirect()->route('getLogin');
    }
  }

  public function getDelete($id) {
    if(Auth::check()) {
      $cate = Cate::find($id);
      $parent = Cate::where('parent_id', $id)->count();
      if($parent == 0) {
        $cate->delete($id);
        return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success', 'flash_message'=>'Success !!! Complete Delete Category']);
      }
      else {
        echo "<script type='text/javascript'> alert('Sorry ! You Can Not Delete This Category');
          window.location = '";
          echo route('admin.cate.getList');
        echo "'
          </script>";
      }
    } else {
      return redirect()->route('getLogin');
    }
  }

  public function getEdit($id) {
    if(Auth::check()) {
      $data = Cate::findOrFail($id)->toArray();
      $parent = Cate::select('id', 'name', 'parent_id')->get()->toArray();
      return view('admin.cate.edit', compact('parent', 'data'));
    } else {
      return redirect()->route('getLogin');
    }
  }

  public function postEdit(Request $request, $id) {
    if(Auth::check()) {
      $this->validate($request,
        ['txtCateName'=>'required'],
        ['txtCateName.required'=>'Please Enter Name Category 1']
      );

      $cate = Cate::find($id);
      $cate->name = $request->txtCateName;
      $cate->alias = changeTitle($request->txtCateName);
      $cate->order = $request->txtOrder;
      $cate->parent_id = $request->sltParent;
      $cate->keywords = $request->txtKeywords;
      $cate->description = $request->txtDescription;
      $cate->save();

      return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success','flash_message'=>'Success !!! Complete Edit Category']);
    } else {
      return redirect()->route('getLogin');
    }
  }
}
