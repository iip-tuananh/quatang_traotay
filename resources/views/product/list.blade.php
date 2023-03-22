@extends('layouts.main.master')
@section('title')
{{$title}}
@endsection
@section('description')
Danh sách {{$title}}
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('js')
@endsection
@section('css')
@endsection
@section('content')
<section class="bread_crumb py-4">
   <div class="container">
      <div class="row">
         <div class="col-xs-12">
            <ul class="breadcrumb">
               <li class="home">
                  <a href="{{route('home')}}"><span>Trang chủ</span></a>						
                  <span> <i class="fa fa-angle-right"></i> </span>
               </li>
               <li><strong><span> {{$title}}</span></strong></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<div class="container">
   <div class="row">
      <section class="main_container collection col-lg-9 col-lg-push-3">
         <div class="box-heading hidden relative">
            <h1 class="title-head margin-top-0">Tất cả sản phẩm</h1>
         </div>
         <div class="category-products products">
            <section class="products-view products-view-grid">
               <div class="row">
                  @foreach ($list as $item)
                  <div class="col-xs-6 col-xss-6 col-sm-4 col-md-4 col-lg-4">
                     @include('layouts.product.item',['pro'=>$item])
                  </div>
                  @endforeach
               </div>
               <div class="text-center">
                  <nav>
                     {{$list->links()}}
                  </nav>
               </div>
            </section>
         </div>
      </section>
      <aside class="dqdt-sidebar sidebar left left-content col-lg-3 col-lg-pull-9">
         <aside class="aside-item sidebar-category collection-category">
            <div class="aside-title">
               <h2 class="title-head margin-top-0"><span>Danh mục</span></h2>
            </div>
            <div class="aside-content">
               <div class="nav-category navbar-toggleable-md">
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
               </div>
            </div>
         </aside>
         <div class="aside-item aside-mini-list-product mb-5">
            <div>
               <div class="aside-title">
                  <h2 class="title-head">
                     <a href="javascript:;">Sản phẩm mới nhất</a>
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
@endsection