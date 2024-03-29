@extends('admin.master')
@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Product
          <small>Edit</small>
        </h1>
      </div>
      <!-- /.col-lg-12 -->
      <form action="" method="POST" name="frmEditProduct" enctype="multipart/form-data">
        <div class="col-lg-7" style="padding-bottom:120px">

          @include('admin.blocks.error')

          <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="sltParent">
              <option value="">Please Choose Category</option>
              <?php cate_parent($cate, 0, '--', $product['cate_id']); ?>
            </select>
          </div>
          <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName', isset($product) ? $product['name'] : null) !!}"/>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{!! old('txtPrice', isset($product) ? $product['price'] : null) !!}"/>
          </div>
          <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro', isset($product) ? $product['intro'] : null) !!}</textarea>
            <script type="text/javascript">
              ckeditor('txtIntro')
            </script>
          </div>
          <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent', isset($product) ? $product['content'] : null) !!}</textarea>
            <script type="text/javascript">
              ckeditor('txtContent')
            </script>
          </div>
          <div class="form-group">
            <label>Image Current</label>
            <img src="{!! asset('resources/upload/'.$product['image']) !!}" class="img_current"/>
            <input type="hidden" name="img_current" value="{!! $product['image'] !!}"/>
          </div>
          <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages" value="{!! old('fImages', isset($product) ? $product['image'] : null) !!}">
          </div>
          <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords', isset($product) ? $product['keywords'] : null) !!}"/>
          </div>
          <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription', isset($product) ? $product['description'] : null) !!}</textarea>
          </div>
          <!-- <div class="form-group">
            <label>Product Status</label>
            <label class="radio-inline">
              <input name="rdoStatus" value="1" checked="" type="radio">Visible
            </label>
            <label class="radio-inline">
              <input name="rdoStatus" value="2" type="radio">Invisible
            </label>
          </div> -->
          <button type="submit" class="btn btn-default">Product Edit</button>
          <button type="reset" class="btn btn-default">Reset</button>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
          @foreach($product_image as $key => $item)
            <div class="form-group" id="{!! $key !!}">
              <img src="{!! asset('resources/upload/detail/'.$item['image']) !!}" class="img_detail" id="{!! $key !!}" idHinh="{!! $item['id'] !!}"/>
              <a type="button" id="del_img_demo" class="btn btn-danger btn-circle icon_del" href="javascript:void(0)"><i class="fa fa-times"></i></a>
            </div>
          @endforeach
          <button type="button" class="btn btn-primary" id="addImages" style="width: 50%">Add Images</button>
          <div id="insert"></div>
        </div>
      </form>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
@endsection()
