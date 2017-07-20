@extends('admin.master')
@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Product
          <small>List</small>
        </h1>
      </div>
      <!-- /.col-lg-12 -->
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Date</th>
            <th>Category</th>
            <!-- <th>Status</th> -->
            <th>Delete</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php $stt = 0 ?>
          @foreach($data as $item)
            <?php $stt++ ?>
            <tr class="<?php if ($stt % 2) { echo 'odd'; } else { echo 'even'; }; ?> grade<?php if ($stt % 2) { echo 'X'; } else { echo 'C'; }; ?>" align="center">
              <td>{!! $stt !!}</td>
              <td>{!! $item["name"] !!}</td>
              <td>{!! number_format($item["price"], 0, ',', '.') !!} €</td>
              <td>{!! \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans() !!}</td>
              <td>
                <?php $cate = DB::table('cates')->where('id', $item['cate_id'])->first(); ?>
                @if(!empty($cate->name))
                  {!! $cate->name !!}
                @endif
              </td>
              <!-- <td>Hiện</td> -->
              <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.product.getDelete', $item['id']) !!}" onClick="return xacnhanxoa('Do You Wan To Delete This Product')"> Delete</a></td>
              <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit', $item['id']) !!}">Edit</a></td>
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
