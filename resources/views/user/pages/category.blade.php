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
        <li class="active">Category</li>
      </ul>
      <div class="row">
        <!-- Sidebar Start-->
        <aside class="span3">
         <!-- Category-->
          <div class="sidewidt">
            <h2 class="heading2"><span>Categories</span></h2>
            <ul class="nav nav-list categories">
              @foreach($menu_cate as $item_cate)
              <li>
                <a href="{!! url('loai-san-pham',[$item_cate->id,$item_cate->alias]) !!}">{!! $item_cate->name !!}</a>
              </li>
              @endforeach
            </ul>
          </div>
         <!--  Best Seller -->
          <div class="sidewidt">
            <h2 class="heading2"><span>Best Seller</span></h2>
            <ul class="bestseller">
              @foreach($bestseller as $item_bestseller)
              <li>
                <img width="50" height="50" src="{!! asset('resources/upload/'.$item_bestseller->image) !!}" alt="product" title="product">
                <a class="productname" href="{!! url('chi-tiet-san-pham',[$item_bestseller->id,$item_bestseller->alias]) !!}"> {!! $item_bestseller->name !!}</a>
                <span class="procategory">{!! $name_cate->name !!}</span>
                <span class="price">{!! number_format($item_bestseller->price,0,",",".") !!} €</span>
              </li>
              @endforeach
            </ul>
          </div>
          <!-- Latest Product -->
          <div class="sidewidt">
            <h2 class="heading2"><span>Latest Products</span></h2>
            <ul class="bestseller">
              @foreach($lasted_product as $item_lasted_product)
              <li>
                <img width="50" height="50" src="{!! asset('resources/upload/'.$item_lasted_product->image) !!}" alt="product" title="product">
                <a class="productname" href="{!! url('chi-tiet-san-pham',[$item_lasted_product->id,$item_lasted_product->alias]) !!}"> {!! $item_lasted_product->name !!}</a>
                <span class="procategory">{!! $name_cate->name !!}</span>
                <span class="price">{!! number_format($item_lasted_product->price,0,",",".") !!} €</span>
              </li>
              @endforeach
            </ul>
          </div>
          <!--  Must have -->
          <div class="sidewidt">
          <h2 class="heading2"><span>Must have</span></h2>
          <div class="flexslider" id="mainslider">
            <ul class="slides">
              @foreach($must_have as $item_must_have)
              <li>
                <img src="{!! asset('resources/upload/'.$item_must_have->image) !!}" alt="" />
              </li>
              @endforeach
            </ul>
          </div>
          </div>
        </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="span9">
          <!-- Category Products-->
          <section id="category">
            <div class="row">
              <div class="span9">
               <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
                    @foreach($product_cate as $item_product_cate)
                    <li class="span3">
                      <a class="prdocutname" href="{!! url('chi-tiet-san-pham',[$item_product_cate->id,$item_product_cate->alias]) !!}">{!! $item_product_cate->name !!}</a>
                      <div class="thumbnail">
                        <span class="sale tooltip-test">Sale</span>
                        <a href="{!! url('chi-tiet-san-pham',[$item_product_cate->id,$item_product_cate->alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$item_product_cate->image) !!}"></a>
                        <div class="pricetag">
                          <span class="spiral"></span><a href="{!! url('mua-hang',[$item_product_cate->id,$item_product_cate->alias]) !!}" class="productcart">ADD TO CART</a>
                          <div class="price">
                            <div class="pricenew">{!! number_format($item_product_cate->price,0,",",".") !!} €</div>
                            <!-- <div class="priceold">$5000.00</div> -->
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                  <div class="pagination pull-right">
                    <ul>
                      @if($product_cate->total())
                        @if($product_cate->currentPage() != 1)
                        <li><a href="{!! str_replace('/?','?',$product_cate->url($product_cate->currentPage() - 1)) !!}">Prev</a>
                        </li>
                        @endif

                        @for($i = 1; $i <= $product_cate->lastPage(); $i++)
                        <li class="{!! ($product_cate->currentPage() == $i) ? 'active' : '' !!}">
                          <a href="{!! str_replace('/?','?',$product_cate->url($i)) !!}">{!! $i !!}</a>
                        </li>
                        @endfor

                        @if($product_cate->currentPage() != $product_cate->lastPage())
                        <li><a href="{!! str_replace('/?','?',$product_cate->url($product_cate->currentPage() + 1)) !!}">Next</a>
                        </li>
                        @endif
                      @endif
                    </ul>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
@endsection
