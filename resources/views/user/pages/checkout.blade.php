@extends('user.master')

@section('content')
  <section id="product">
    <div class="container">
    <!--  breadcrumb -->
      <ul class="breadcrumb">
        <li>
          <a href="#">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Checkout</li>
      </ul>

      <!-- flash message -->
      <div class="col-sm-10 col-sm-offset-2" style="padding-top: 10px">
        @if(Session::has('flash_message'))
          <div class="alert alert-{!! Session::get('flash_level') !!}">
            {!! Session::get('flash_message') !!}
          </div>
        @endif
      </div>

      <div class="row">

        @include('admin.blocks.error')

        <!-- Account Login-->
        <div class="span9">
          <div class="checkoutsteptitle">Step 1 : Delivery Details<a class="modify">Modify</a>
          </div>

          <div class="checkoutstep">
            <div class="row">
              <form class="form-horizontal" action="" method="POST" id="form1">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" for="first_name" >First Name<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class="" name="first_name" id="first_name" value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="last_name" >Last Name<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class="" name="last_name" id="last_name" value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="email" >E-Mail<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class="" name="email" id="email" value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="phone" >Telephone<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class="" name="phone" id="phone" value="">
                      </div>
                    </div>
                  </div>
                  <div class="span4">
                    <div class="control-group">
                      <label class="control-label" for="address1">Address 1<span class="red">*</span></label>
                      <div class="controls">
                        <input type="text" class="" name="address1" id="address1" value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" >Address 2</label>
                      <div class="controls">
                        <input type="text" class="" name="address2" id="address2" value="">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="city">City<span class="red">*</span></label>
                      <div class="controls">
                        <select name="city" id="city">
                          <option value="">Please Select</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
            <button type="submit" class="btn btn-orange pull-right" form="form1">Continue</button>
          </div>
          <div class="checkoutsteptitle">Step 2: Confirm Order<a class="modify">Modify</a>
          </div>
          <div class="checkoutstep">
            <div class="cart-info">
              <table class="table table-striped table-bordered">
                <tr>
                  <th class="image">Image</th>
                  <th class="name">Product Name</th>
                  <th class="quantity">Quantity</th>
                  <th class="price">Unit Price</th>
                  <th class="total">Total</th>
                </tr>
                <form class="" action="" method="post">
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                  @foreach($content as $item)
                  <tr>
                    <?php $item_info = DB::table('products')->where('id',$item->id)->first(); ?>
                    <td class="image"><a href="{!! url('chi-tiet-san-pham',[$item_info->id,$item_info->alias]) !!}"><img title="product" alt="product" src="{!! asset('resources/upload/'.$item->options->img) !!}" height="50" width="50"></a></td>
                    <td  class="name"><a href="{!! url('chi-tiet-san-pham',[$item_info->id,$item_info->alias]) !!}">{!! $item->name !!}</a></td>
                    <td class="quantity"><input type="text" size="1" value="{!! $item->qty !!}" name="quantity[40]" class="span1">
                      &nbsp;
                      <a href="#" class="updatecart" id="{!! $item->rowId !!}"><img class="tooltip-test" data-original-title="Update" src="{!! asset('user/img/update.png') !!}" alt=""></a>
                      <a href="{!! url('xoa-san-pham',['id'=>$item->rowId]) !!}"><img class="tooltip-test" data-original-title="Remove"  src="{!! asset('user/img/remove.png') !!}" alt=""/></a>
                    <td class="price">{!! number_format($item->price,0,",",".") !!} €</td>
                    <td class="total">{!! number_format($item->price * $item->qty,0,",",".") !!} €</td>
                  </tr>
                  @endforeach
              </table>
            </div>
            <div class="row">
              <div class="pull-right">
                <div class="span4 pull-right">
                  <table class="table table-striped table-bordered ">
                    <tbody>
                      <tr>
                        <td><span class="extra bold totalamout">Total :</span></td>
                        <td><span class="bold totalamout">{!! number_format($total,0,",",".") !!}</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Sidebar Start-->
        <div class="span3">
          <aside>
            <div class="sidewidt">
              <h2 class="heading2"><span> Checkout Steps</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a class="active" href="#">Checkout Options</a>
                </li>
                <li>
                  <a href="#">Billing Details</a>
                </li>
                <li>
                  <a href="#">Delivery Details</a>
                </li>
                <li>
                  <a href="#">Delivery Method</a>
                </li>
                <li>
                  <a href="#"> Payment Method</a>
                </li>
              </ul>
            </div>
          </aside>
        </div>
        <!-- Sidebar End-->
      </div>
    </div>
  </section>
  @endsection
