@extends('admin.master')
@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Category
          <small>Edit</small>
        </h1>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-lg-7" style="padding-bottom:120px">

        @include('admin.blocks.error')

        <form action="" method="POST">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
          <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="sltParent">
              <option value="0">Please Choose Category</option>
              <?php cate_parent($parent,0,"--",$data["parent_id"]) ?>
            </select>
          </div>
          <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{!! old('txtCateName', isset($data) ? $data['name'] : null) !!}"/>
          </div>
          <div class="form-group">
            <label>Category Order</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{!! old('txtOrder', isset($data) ? $data['order'] : null) !!}"/>
          </div>
          <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords', isset($data) ? $data['keywords'] : null) !!}"/>
          </div>
          <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription', isset($data) ? $data['description'] : null) !!}</textarea>
          </div>
          <!-- <div class="form-group">
            <label>Category Status</label>
            <label class="radio-inline">
              <input name="rdoStatus" value="1" checked="" type="radio">Visible
            </label>
            <label class="radio-inline">
              <input name="rdoStatus" value="2" type="radio">Invisible
            </label>
          </div> -->
          <button type="submit" class="btn btn-default">Category Edit</button>
          <button type="reset" class="btn btn-default">Reset</button>
        </form>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
@endsection()
