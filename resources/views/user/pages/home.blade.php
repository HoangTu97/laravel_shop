@extends('user.master')

@section('content')
<!-- Slider Start-->
@include('user.blocks.slider')
<!-- Slider End-->

<!-- Section Start-->
@include('user.blocks.ortherdetail')
<!-- Section End-->

<!-- Featured Product-->
<section id="featured" class="row mt40">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"> See Our Most featured Products</span></h1>
    <ul class="thumbnails">
      @foreach($product as $item)
      <li class="span3">
        <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}">{!! $item->name !!}</a>
        <div class="thumbnail">
          <span class="sale tooltip-test">Sale</span>
          <a href="{!! url('chi-tiet-san-pham',[$item->id,$item->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item->image) !!}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="{!! url('mua-hang',[$item->id,$item->alias]) !!}" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">{!! number_format($item->price,0,",",".") !!} €</div>
              <!-- <div class="priceold">$5000.00</div> -->
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</section>

<!-- Latest Product-->
<section id="latest" class="row">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
    <ul class="thumbnails">
      @foreach($lasted_product as $item_lasted_product)
      <li class="span3">
        <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item_lasted_product->id,$item_lasted_product->alias]) !!}">{!! $item_lasted_product->name !!}</a>
        <div class="thumbnail">
          <a href="{!! url('chi-tiet-san-pham',[$item_lasted_product->id,$item_lasted_product->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item_lasted_product->image) !!}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="{!! url('mua-hang',[$item_lasted_product->id,$item_lasted_product->alias]) !!}" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">{!! number_format($item_lasted_product->price,0,",",".") !!} €</div>
              <!-- <div class="priceold">$5000.00</div> -->
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</section>
@endsection
