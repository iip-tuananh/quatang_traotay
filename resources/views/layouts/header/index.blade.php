<header class="header">
   <div class="topbar-mobile hidden-lg hidden-md text-center text-md-left">
      <div class="container">
         Hotline: 
         <span>
         <a  title="{{$setting->phone1}}" href="tel:{{$setting->phone1}}"> {{$setting->phone1}}</a>
         </span>
      </div>
   </div>
   <div class="topbar hidden-sm hidden-xs">
      <div class="container">
         <div>
            <div class="row">
               <div class="col-sm-6 col-md-9 a-left">
                  <ul class="list-inline f-left">
                     <li>
                        Hotline 1: 
                        <span>
                        <a  title="{{$setting->phone1}}" href="tel:{{$setting->phone1}}"> {{$setting->phone1}}</a>
                        </span>
                     </li>
                     <li>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
                     @if($setting->phone2 != '')
                     <li>
                        Hotline 2: 
                        <span>
                        <a  title="{{$setting->phone1}}" href="tel:{{$setting->phone1}}"> {{$setting->phone1}}</a>
                        </span>
                     </li>
                     @endif
                     <li>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
                     <li class="margin-left-20">
                        <b>Địa chỉ</b>: 
                        <span>
                           {{$setting->address1}}
                        </span>
                     </li>
                  </ul>
               </div>
               <div class="col-sm-6 col-md-3">
                  <ul class="list-inline f-right">
                     <li class="li-search">
                        <a href="{{$setting->facebook}}">
                        <i class="fa fa-facebook-official"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="header-content clearfix a-center">
         <div class="row">
            <div class="col-xs-12 col-md-3 text-lg-left">
               <div class="logo inline-block">
                  <a href="/" class="logo-wrapper ">					
                  <img src="{{$setting->logo}}" alt="logo " width="103">					
                  </a>
               </div>
            </div>
            <div class="col-xs-12 col-md-9 col-lg-9 hidden-xs">
               <div class="policy d-flex justify-content-around">
                  <div class="item-policy d-flex align-items-center">
                     <a title="policy1_title" href="#">
                     <img src="{{url('frontend/images/policy1.png')}}"  alt="policy1.png" >
                     </a>
                     <div class="info a-left">
                        <a title="Miễn phí vận chuyển" href="javascript:;">Giao hàng toàn quốc</a>
                        <p>Nhận hàng 3 - 5 ngày</p>
                     </div>
                  </div>
                  <div class="item-policy d-flex align-items-center">
                     <a title="policy2_title" href="javascript:;">
                     <img src="{{url('frontend/images/policy2.png')}}"  alt="policy1.png" >
                     </a>
                     <div class="info a-left">
                        <a title="Hỗ trợ 24/7" href="javascript:;">Hỗ trợ 24/7</a>
                        <p>Hotline: <a href="callto:{{$setting->phone1}}"> {{$setting->phone1}}</a></p>
                     </div>
                  </div>
                  <div class="item-policy d-flex align-items-center">
                     <a title="policy3_title" href="javascript:;">
                     <img src="{{url('frontend/images/policy3.png')}}"  alt="policy1.png" >
                     </a>
                     <div class="info a-left">
                        <a title="Giờ làm việc" href="javascript:;">Giờ làm việc</a>
                        <p>T2 - T7 Giờ hành chính</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="menu-bar hidden-md hidden-lg">
         <img src="{{url('frontend/images/menu-bar.png')}}" alt="menu bar" />
      </div>
      <div class="icon-cart-mobile hidden-md hidden-lg f-left absolute" onclick="window.location.href='{{$setting->facebook}}'">
         <div class="icon relative">
            <i class="fa fa-facebook-official"></i>
         </div>
      </div>
   </div>
   <nav>
      <div class="container">
         <div class="menu-offcanvas">
            <div class="hidden-lg hidden-xl hidden-md head-menu clearfix">
               <ul class="list-inline">
                  <li class="li-search">
                     <div class="header_search search_form">
                        <form class="input-group search-bar search_form" action="{{route('search_result')}}" method="post" role="search">		
                           @csrf
                           <input type="search" name="keyword" value="" placeholder="Tìm sản phẩm" class="input-group-field st-default-search-input search-text" autocomplete="off">
                           <span class="input-group-btn">
                           <button class="btn icon-fallback-text" type="submit">
                           <i class="fa fa-search"></i>
                           </button>
                           </span>
                        </form>
                     </div>
                  </li>
               </ul>
               <div class="menuclose"><i class="fa fa-times"></i></div>
            </div>
            <ul id="nav-mobile" class="nav nav-left">
               <li class="nav-item active"><a title="Trang chủ" class="nav-link" href="{{route('home')}}">Trang chủ</a></li>
               <li class="nav-item  has-mega">
                  <a title="Sản phẩm"  href="{{route('allProduct')}}" class="nav-link">Sản phẩm <i class="fa fa-angle-right" ></i></a>			
                  <div class="mega-content">
                     <div class="level0-wrapper2">
                        <div class="nav-block nav-block-center">
                           <ul class="level0">
                              @foreach ($categoryhome as $item)
                                 <li class="level1 parent item">
                                    <h2 class="h4"><a  title="{{languageName($item->name)}}" href="{{route('allListProCate',['danhmuc'=>$item->slug])}}"><span>{{languageName($item->name)}}</span><i class="hidden-md hidden-lg hidden-xl fa fa-angle-right"></i></a></h2>
                                    @if(count($item->typeCate) > 0)
                                    <ul class="level1">
                                       @foreach ($item->typeCate as $i)
                                          <li class="level2"> <a title="{{languageName($i->name)}}" href="{{route('allListType',['danhmuc'=>$item->slug,'loaidanhmuc'=>$i->slug])}}"><span>{{languageName($i->name)}}</span></a> </li>
                                       @endforeach
                                    </ul>
                                    @endif
                                 </li>
                              @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="nav-item "><a title="Giới thiệu" class="nav-link" href="{{route('pagecontent',['slug'=>'gioi-thieu'])}}">Giới thiệu</a></li>
               <li class="nav-item ">
                  <a title="Tin tức"  href="{{route('allListBlog')}}" class="nav-link">Tin tức</a>		
               </li>
               <li class="nav-item "><a title="Liên hệ" class="nav-link" href="{{route('lienHe')}}">Liên hệ</a></li>
            </ul>
            <div class="menu-search f-right bbbbb hidden-sm hidden-xs">
               <div class="header_search search_form">
                  <form class="input-group search-bar search_form" action="{{route('search_result')}}" method="post" role="search">		
                     @csrf
                     <input type="search" name="keyword" placeholder="Tìm sản phẩm" class="input-group-field st-default-search-input search-text auto-search" autocomplete="off">
                     <span class="input-group-btn">
                     <button class="btn icon-fallback-text" type="submit">
                     <i class="fa fa-search"></i>
                     </button>
                     </span>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </nav>
</header>