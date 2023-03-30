@extends('layouts.main.master')
@section('title')
{{languageName($product->name)}}
@endsection
@section('description')
{{languageName($product->description)}}
@endsection
@section('image')
@php
$img = json_decode($product->images);
@endphp
{{url(''.$img[0])}}
@endsection
@section('css')
@endsection
@section('js')
<script src="{{asset('frontend/js/detail.js')}}" type="text/javascript"></script>	
<script src="{{asset('frontend/js/jquery.elevatezoom308.min.js')}}" type="text/javascript"></script>		
<script src="{{asset('frontend/js/jquery.prettyphoto.min005e.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/jquery.prettyphoto.init.min367a.js')}}" type="text/javascript"></script>
<script>
   $('.add_to_cart').click(function (e) { 
      e.preventDefault();
      var quantity = $('#qty').val();
      var url = $(this).data('url');
      $.ajax({
         type: "get",
         url: url,
         data: {
            quantity:quantity,
         },
         success: function (data) {
            $('.count-item').html(data.html2);
                    $.notify("Thêm vào giỏ hàng thành công", "success");
         }
      });
   });
</script>
@endsection
@section('content')
<section class="bread_crumb py-4">
    <div class="container">
       <div class="row">
          <div class="col-xs-12">
             <ul class="breadcrumb" >
                <li class="home">
                   <a  href="{{route('home')}}" ><span >Trang chủ</span></a>						
                   <span> <i class="fa fa-angle-right"></i> </span>
                </li>
                <li>
                   <a  href="{{route('allListProCate',['danhmuc'=>$product->cate->slug])}}"><span >{{languageName($product->cate->name)}}</span></a>						
                   <span> <i class="fa fa-angle-right"></i> </span>
                </li>
                @if ($product->typeCate)
                <li>
                    <a  href="{{route('allListType',[ 'danhmuc'=>$product->cate->slug,'loaidanhmuc'=>$product->typeCate->slug])}}"><span >{{languageName($product->typeCate->name)}}</span></a>						
                    <span> <i class="fa fa-angle-right"></i> </span>
                 </li>
                 @endif
                <li><strong><span >{{languageName($product->name)}}</span></strong>
                <li>
             </ul>
          </div>
       </div>
    </div>
 </section>
 <section class="product ">
    <div class="container">
       <div class="row">
          <div class="col-lg-9 ">
             <div class="details-product">
                <div class="row">
                    @php
                        $img = json_decode($product->images);
                    @endphp
                   <div class="col-xs-12 col-sm-12 col-md-5">
                      <div class="large-image">
                         <a href="{{$img[0]}}" data-rel="prettyPhoto[product-gallery]">
                         <img id="zoom_01" src="{{$img[0]}}" alt="{{languageName($product->name)}}">
                         </a>
                         <div class="hidden">
                             @foreach ($img as $item)
                             <div class="item">
                                <a href="{{$item}}" data-image="{{$item}}" data-zoom-image="{{$item}}" data-rel="prettyPhoto[product-gallery]">
                                </a>
                             </div>
                             @endforeach
                         </div>
                      </div>
                      <div id="gallery_01" class="fixborder   thumbnail-product" style="visibility: hidden;" data-md-items="4" data-sm-items="4" data-xs-items="4" data-xss-items="2" data-margin="10" data-nav="true">
                        @foreach ($img as $item) 
                        <div class="item">
                            <a class="clearfix" href="#" data-image="{{$item}}" data-zoom-image="{{$item}}">
                            <img  src="{{$item}}" alt="{{languageName($product->name)}}">
                            </a>
                        </div>
                        @endforeach
                      </div>
                   </div>
                   <div class="col-xs-12 col-sm-12 col-md-7 details-pro">
                      <h1 class="title-head">{{languageName($product->name)}}</h1>
                      <div class="status clearfix">
                         Trạng thái: <span class="inventory">
                         <i class="fa fa-check"></i> Còn hàng
                         </span>
                      </div>
                      <div class="price-box clearfix">
                         <div class="special-price"><span class="price product-price" >{{number_format($product->price-($product->price*($product->discount/100)))}}đ</span> </div>
                         <!-- Giá -->
                      </div>
                      <div class="product-summary product_description margin-bottom-15">
                         <div class="rte description">
                            {!!languageName($product->description)!!}
                         </div>
                      </div>
                      <div class="form-product ">
                         <div class="social-sharing">
                            <div class="social-media">
                              <div class="custom custom-btn-numbers form-control">	
                            
                                 <button 
                                 onclick="var result = document.getElementById('qty'); 
                                 var qty = result.value;
                                 if( !isNaN(qty) & qty > 1 ) result.value--;return false;" 
                                 class="btn-minus btn-cts" 
                                 type="button">–</button>
                         
                                 <input type="text" class="qty input-text" id="qty" name="quantity" size="4" value="1" maxlength="3" disabled/>
                         
                                 <button onclick="var result = document.getElementById('qty'); var qty = result.value; 
                                 if( !isNaN(qty)) result.value++;return false;" 
                                 class="btn-plus btn-cts" 
                                 type="button">+</button>
                                 </div>
                                 <br>
                                 <br>
                              <button class="add_to_cart button-mua" data-url="{{route('add.to.cart',['id'=>$product->id])}}" >Mua Ngay</button>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-xs-12 col-lg-12 margin-top-15 margin-bottom-10">
                      <!-- Nav tabs -->
                      <div class="product-tab e-tabs">
                         <ul class="tabs tabs-title clearfix">
                            <li class="tab-link" data-tab="tab-1">
                               <h3><span>Chi tiết sản phẩm</span></h3>
                            </li>
                         </ul>
                         <div  class="tab-1 tab-content">
                            <div class="rte" id="article-content">
                               {!!languageName($product->content)!!}
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <aside class="dqdt-sidebar sidebar right left-content col-lg-3 ">
             <aside class="aside-item sidebar-category collection-category">
                <div class="aside-title">
                   <h2 class="title-head margin-top-0"><span>Danh mục</span></h2>
                </div>
                <div class="aside-content">
                   <nav class="nav-category navbar-toggleable-md">
                    <ul class="nav navbar-pills">
                        @foreach ($categoryhome as $item)
                        <li class="nav-item okactive">
                           <i class="fa fa-caret-right"></i>
                           <a title="{{languageName($item->name)}}" href="{{route('allListProCate',['danhmuc'=>$item->slug])}}" class="nav-link">{{languageName($item->name)}}</a>
                           @if (count($item->typeCate) > 0)
                           <i class="fa fa-angle-down"></i>
                           <ul class="dropdown-menu">
                              @foreach ($item->typeCate as $i)
                              <li class="dropdown-submenu nav-item">
                                 <a title="{{languageName($i->name)}}" class="nav-link" href="{{route('allListType',['danhmuc'=>$item->slug,'loaidanhmuc'=>$i->slug])}}">{{languageName($i->name)}}</a>
                              </li>
                              @endforeach
                           </ul>
                           @endif
                        </li>
                        @endforeach
                     </ul>
                   </nav>
                </div>
             </aside>
             <div class="aside-item aside-mini-list-product mb-5">
                <div >
                   <div class="aside-title">
                      <h2 class="title-head">
                         <a href="/san-pham-noi-bat" title="Sản phẩm mới nhất">Sản phẩm mới nhất</a>
                      </h2>
                   </div>
                   <div class="aside-content related-product">
                    <div class="product-mini-lists">
                       <div class="products">
                          @foreach ($pronew as $pro)
                          @php
                                $img = json_decode($pro->images);
                          @endphp
                          <div class="row row-noGutter">
                             <div class="col-sm-12">
                                <div class="product-mini-item clearfix  ">
                                   <div class="product-img relative">
                                      <a href="{{route('detailProduct',['cate'=>$pro->cate_slug,'type'=>$pro->type_slug ? $pro->type_slug : 'loai','id'=>$pro->slug])}}">
                                      <img src="{{$img[0]}}" alt="{{languageName($pro->name)}}">
                                      </a>
                                   </div>
                                   <div class="product-info">
                                      <h3><a href="{{route('detailProduct',['cate'=>$pro->cate_slug,'type'=>$pro->type_slug ? $pro->type_slug : 'loai','id'=>$pro->slug])}}" title="{{languageName($pro->name)}}" class="product-name">{{languageName($pro->name)}}</a></h3>
                                      <div class="price-box">
                                         @if ($pro->price > 0)
                                         <div class="special-price"><span class="price product-price">{{number_format($pro->price-($pro->price*($pro->discount/100)))}}đ</span> </div>
                                         @else 
                                         <div class="special-price"><span class="price product-price">Liên hệ</span> </div>
                                         @endif
                                         <!-- Giá -->
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                          @endforeach
                       </div>
                       <!-- /.products -->
                    </div>
                 </div>
                </div>
             </div>
          </aside>
          <div id="open-filters" class="open-filters hidden-lg">
             <i class="fa fa-align-right"></i>
             <span>Lọc</span>
          </div>
       </div>
    </div>
    <section class="section featured-product wow fadeInUp mb-4">
       <div class="container">
          <div class="section-title a-center">
             <h2><a href="/san-pham-noi-bat">Sản phẩm liên quan</a></h2>
          </div>
          <div class="slick-rela upsell-product custom-carousel owl-theme outer-top-xs" data-lgg-items="4" data-lg-items='4' data-md-items='4' data-sm-items='3' data-xs-items="2" data-xss-items="2" data-nav="true">
            @foreach ($productlq as $item)
            <div class="item item-carousel">
                @include('layouts.product.item',['pro'=>$item])
             </div>
            @endforeach 
          </div>
          <script>
             $('.slick-rela').slick({
                 autoplay: true,
                 autoplaySpeed: 5000,
                 dots: false,
                 arrows: false,
                 speed: 300,
                 rows: 1,
                 loop: false,
                 infinite:false,
                 slidesToShow: 4,
                 slidesToScroll: 3,
                 responsive: [
                     {
                         breakpoint: 1200,
                         settings: {
                             slidesToShow: 4,
                             slidesToScroll: 3
                         }
                     },
                     {
                         breakpoint: 1024,
                         settings: {
                             slidesToShow: 3,
                             slidesToScroll: 3
                         }
                     },
                     {
                         breakpoint: 991,
                         settings: {
                             slidesToShow: 3,
                             slidesToScroll: 2
                         }
                     },
                     {
                         breakpoint: 767,
                         settings: {
                             slidesToShow: 2,
                             slidesToScroll: 2
                         }
                     }
                 ]
             });
          </script>
          <!-- /.home-owl-carousel -->
       </div>
    </section>
    <!-- /.section -->
 </section>
@endsection