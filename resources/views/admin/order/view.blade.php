@extends('admin.master')
@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Order
          <small>View List Product</small>
        </h1>
      </div>
      <!-- /.col-lg-12 -->
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr align="center">
            <th>ID</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php $stt = 0 ?>
          @foreach($cart as $item_cart)
            <?php $stt++ ?>
            <tr class="<?php if ($stt % 2) { echo 'odd'; } else { echo 'even'; }; ?> grade<?php if ($stt % 2) { echo 'X'; } else { echo 'C'; }; ?>" align="center">
              <?php $product_info = DB::table('products')->select('name', 'image')->where('id', $item_cart->product_id)->first(); ?>
              <td>{!! $stt !!}</td>
              <td><img title="product" alt="product" src="{!! asset('resources/upload/'.$product_info->image) !!}" height="50" width="50"></td>
              <td>{!! $product_info->name !!}</td>
              <td>{!! $item_cart->qty !!}</td>
              <td>{!! number_format($item_cart->price, 0, ',', '.') !!} €</td>
              <td>{!! number_format($item_cart->price * $item_cart->qty, 0, ',', '.') !!} €</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
@endsection()
