@extends('admin.master')
@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Order
          <small>List</small>
        </h1>
      </div>
      <!-- /.col-lg-12 -->
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address1</th>
            <th>Address2</th>
            <th>City</th>
            <th>View</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php $stt = 0 ?>
          @foreach($orders as $item_order)
            <?php $stt++ ?>
            <tr class="<?php if ($stt % 2) { echo 'odd'; } else { echo 'even'; }; ?> grade<?php if ($stt % 2) { echo 'X'; } else { echo 'C'; }; ?>" align="center">
              <td>{!! $stt !!}</td>
              <td><?php echo $item_order->first_name.' '.$item_order->last_name ?></td>
              <td>{!! $item_order->email !!}</td>
              <td>{!! $item_order->phone !!}</td>
              <td>{!! $item_order->address1 !!}</td>
              <td>{!! $item_order->address2 !!}</td>
              <td>{!! $item_order->city !!}</td>
              <td><a href="{!! URL::route('admin.order.getView', $item_order->id) !!}">cart</a></td>
              <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.order.getDelete', $item_order->id) !!}" onClick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không')"> Delete</a></td>
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
