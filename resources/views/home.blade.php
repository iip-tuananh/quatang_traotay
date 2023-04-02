@extends('layouts.main.master')
@section('title')
{{$setting->company}}
@endsection
@section('description')
{{$setting->webname}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<section class="awe-section-1" id="awe-section-1">
   <div class="section_category_slider">
      <div class="container">
         <h2 class="hidden">Danh mục</h2>
         <div class="row">
            <div class="col-md-9 col-md-push-3 px-md-4 px-0 mt-md-5 mb-5">
               <div class="home-slider owl-carousel" data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0'  data-nav="true">
                  @foreach ($banner as $item)
                  <div class="item">
                     <a href="{{$item->link}}" class="clearfix">
                     <img src="{{$item->image}}" alt="{{$item->image}}">
                     </a>	
                  </div>
                  @endforeach
               </div>
               <!-- /.products -->
            </div>
            <div class="col-md-3 col-md-pull-9 mt-5 hidden-xs aside-vetical-menu">
               <aside class="blog-aside aside-item sidebar-category">
                  <div class="aside-title text-center text-xl-left">
                     <h2 class="title-head"><span>Danh mục</span></h2>
                  </div>
                  <div class="aside-content">
                     <div class="nav-category  navbar-toggleable-md" >
                        <ul class="nav navbar-pills">
                           @foreach ($categoryhome as $item)
                           <li class="nav-item">
                              <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                              <a title="{{languageName($item->name)}}" href="{{route('allListProCate',['danhmuc'=>$item->slug])}}" class="nav-link">{{languageName($item->name)}}</a>
                              @if(count($item->typeCate) > 0)
                              <i class="fa fa-angle-down" ></i>
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
            </div>
         </div>
      </div>
   </div>
   <script>
      $('.home-slider').slick({
            lazyLoad: 'ondemand',
            centerMode: false,
            focusOnSelect: true,
            dots: false,
            loop: false,
         arrows: false,
            slidesToShow: 1
      
         });
   </script>
</section>
@if(count($bannerqc) > 0)
<section class="awe-section-2" id="awe-section-2">
   <div class="section_banner">
      <div class="container">
         <h2 class="hidden">Banner</h2>
         <div class="banner-slider slickp_banner_1" data-lg-items='4' data-md-items='4' data-sm-items='2' data-xs-items="2" data-nav="true">
            @foreach ($bannerqc as $item)
               <div class="item">
                  @if($item->name != '')
                  <a href="{{$item->name}}" class="clearfix">
                     @else
                     <a href="javascript:;" class="clearfix">
                        @endif
                  <img src="{{$item->image}}" alt="{{$item->image}}" height="158">
                  </a>	
               </div>
            @endforeach
         </div>
      </div>
   </div>
   <script>
      $('.slickp_banner_1').slick({
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
                  slidesToScroll: 4
               }
            },
            {
               breakpoint: 1024,
               settings: {
                  slidesToShow: 4,
                  slidesToScroll: 4
               }
            },
            {
               breakpoint: 991,
               settings: {
                  slidesToShow: 2,
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
</section>
@endif
@foreach ($categoryhome as $key => $item)
@if (count($item->product) > 0)
<section class="awe-section-3" id="awe-section-3">
   <div class="section section-collection section-collection-1">
      <div class="container">
         <div class="collection-border">
            <div class="collection-main">
               <div class="row ">
                  <div class="col-lg-12 col-sm-12">
                     <div class="e-tabs not-dqtab ajax-tab-1"  data-section="ajax-tab-1" data-view="car-1">
                        <div class="row row-noGutter">
                           <div class="col-sm-12">
                              <div class="content">
                                 <div class="section-title">
                                    <h2>
                                      {{languageName($item->name)}}
                                    </h2>
                                 </div>
                                 <div>
                                    <ul class="tabs tabs-title ajax clearfix hidden-xs">
                                       @foreach ($item->typeCate as $key => $i)
                                       <li class="tab-link has-content" >
                                          <a href="{{route('allListType',['danhmuc'=>$item->slug,'loaidanhmuc'=>$i->slug])}}">{{languageName($i->name)}}</a>
                                       </li>
                                       @endforeach
                                    </ul>
                                    <div class="row">
                                       @foreach ($item->product as $item)
                                       <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                          @include('layouts.product.item',['pro'=>$item])
                                       </div>
                                       @endforeach
                                    </div>
                                    <script></script>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script>
      var id = "{{$key}}";
      $('.slickprolist_'+id).slick({
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
</section>
@endif
@endforeach
<section class="awe-section-8" id="awe-section-8">
   <div class="section section_blog">
      <div class="container">
         <div class="section-title a-center">
            <h2><a  title="Tin cập nhật" href="{{route('allListBlog')}}">Tin cập nhật</a></h2>
         </div>
         <div class="section-content">
            <div class="blog-slider slick_blog" data-lg-items='3' data-md-items='3' data-sm-items='2' data-xs-items="2" data-nav="true">
               @foreach ($hotnews as $item)
               <div class="item">
                  <article class="blog-item text-center">
                     <div>
                        <div class="blog-item-thumbnail">						
                           <a  title="{{languageName($item->title)}}" href="{{route('detailBlog',['slug'=>$item->slug])}}">
                           <img src="{{$item->image}}" alt="{{languageName($item->title)}}">
                           </a>
                        </div>
                        <div class="blog-item-info m-4">
                           <h3 title="{{languageName($item->title)}}" class="blog-item-name"><a href="{{route('detailBlog',['slug'=>$item->slug])}}">{{languageName($item->title)}}</a></h3>
                           <p class="blog-item-summary linea"> {{languageName($item->description)}}</p>
                           <a  title="{{languageName($item->title)}}" class="btn" href="{{route('detailBlog',['slug'=>$item->slug])}}">Chi tiết</a>
                        </div>
                     </div>
                  </article>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <script>
      $('.slick_blog').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: false,
            arrows: false,
            speed: 300,
            rows: 1,
            loop: false,
            infinite:false,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
               {
                  breakpoint: 1200,
                  settings: {
                     slidesToShow: 3,
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
</section>
<section class="awe-section-9" id="awe-section-9">
   <div class="section section_testimonial">
      <div class="container">
         <div class="section-title a-center">
            <h2><span>Phản hồi của khách</span></h2>
         </div>
         <div class="section-content">
            <div class="testimonial-slider slick_tes" data-lg-items='3' data-md-items='3' data-sm-items='2' data-xs-items="2" data-nav="true">
               @foreach ($reviewCus as $item)
               <div class="item">
                  <div class="testimonial-item text-center p-4 mb-5">
                     <div class="image-avata">
                        <img src="{{$item->avatar}}" alt="{{languageName($item->name)}}" style="width:60px">
                     </div>
                     <h4 class="name">{{languageName($item->name)}}</h4>
                     <p class="designation m-0">{!!languageName($item->content)!!}</p>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <script>
      $('.slick_tes').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: false,
            arrows: false,
            speed: 300,
            rows: 1,
            loop: false,
            infinite:false,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
               {
                  breakpoint: 1200,
                  settings: {
                     slidesToShow: 3,
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
</section>
<section class="awe-section-10" id="awe-section-10">
   <div class="section section-brand mb-5">
      <div class="container">
         <h2 class="hidden">Thương hiệu</h2>
         <div class="slickbrand" data-lg-items="6" data-md-items="5" data-sm-items="4" data-xs-items="3" data-xss-items="2" data-margin="30">
            @foreach ($partner as $item)
            <div class="item">
               <div class="brand-item">
                  <a href="#" class="img25"><img src="{{$item->image}}"   alt="Đối tác Trung thành" >
                  </a>
               </div>
            </div>
            @endforeach
         </div>
         <!-- /.products -->
      </div>
   </div>
   <script>
      $('.slickbrand').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: false,
            arrows: false,
            speed: 300,
            rows: 1,
            loop: false,
            infinite:false,
            slidesToShow: 6,
            slidesToScroll: 6,
            responsive: [
               {
                  breakpoint: 1200,
                  settings: {
                     slidesToShow: 6,
                     slidesToScroll: 6
                  }
               },
               {
                  breakpoint: 1024,
                  settings: {
                     slidesToShow: 5,
                     slidesToScroll: 3
                  }
               },
               {
                  breakpoint: 991,
                  settings: {
                     slidesToShow: 4,
                     slidesToScroll: 2
                  }
               },
               {
                  breakpoint: 767,
                  settings: {
                     slidesToShow: 2,
                     slidesToScroll: 1
                  }
               }
            ]
         });	
   </script>
</section>
      
@endsection