@extends('admin.master')
@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">User
          <small>Edit</small>
        </h1>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-lg-7" style="padding-bottom:120px">

        @include('admin.blocks.error')

        <form action="" method="POST">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="txtUser" value="{!! $data['username'] !!}" disabled />
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
          </div>
          <div class="form-group">
            <label>RePassword</label>
            <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{!! old('txtEmail', isset($data) ? $data['email'] : null) !!}"/>
          </div>
          @if(Auth::user()->id != $id)
            <div class="form-group">
              <label>User Level</label>
              <label class="radio-inline">
                <input name="rdoLevel" value="1" checked="" type="radio"
                  @if($data['level'] == 1)
                    checked='checked'
                  @endif
                />Admin
              </label>
              <label class="radio-inline">
                <input name="rdoLevel" value="2" type="radio" />Member
              </label>
            </div>
          @endif
          <button type="submit" class="btn btn-default">User Edit</button>
          <button type="reset" class="btn btn-default">Reset</button>
        </form>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
@endsection()
