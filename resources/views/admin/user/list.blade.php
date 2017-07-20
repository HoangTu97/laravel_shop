@extends('admin.master')
@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">User
          <small>List</small>
        </h1>
      </div>
      <!-- /.col-lg-12 -->
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr align="center">
            <th>ID</th>
            <th>Username</th>
            <th>Level</th>
            <!-- <th>Status</th> -->
            <th>Delete</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php $stt = 0 ?>
          @foreach($user as $item_user)
            <?php $stt++ ?>
            <tr class="<?php if ($stt % 2) { echo 'odd'; } else { echo 'even'; }; ?> grade<?php if ($stt % 2) { echo 'X'; } else { echo 'C'; }; ?>" align="center">
              <td>{!! $stt !!}</td>
              <td>{!! $item_user['username'] !!}</td>
              <td>
                @if($item_user['id'] == 1)
                  Superadmin
                @elseif($item_user['level'] == 1)
                  Admin
                @else
                  Member
                @endif
              </td>
              <!-- <td>Hiện</td> -->
              <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.user.getDelete', $item_user['id']) !!}" onClick="return xacnhanxoa('Bạn Có Chắc Là Muốn Xóa Không')"> Delete</a></td>
              <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit', $item_user['id']) !!}">Edit</a></td>
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
