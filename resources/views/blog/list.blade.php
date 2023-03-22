@extends('layouts.main.master')
@section('title')
{{$title_page}} 
@endsection
@section('description')
Tin tức nổi bật và mới nhất
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
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
               <li><strong>{{$title_page}}</strong></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<div class="container">
   <div class="row">
      <section class="right-content col-md-9 col-md-push-3">
         <div class="box-heading relative">
            <h1 class="title-head page_title">Tin tức</h1>
            <span> ( Có tất cả 8 bài viết ) </span>
         </div>
         <section class="list-blogs blog-main">
            <div class="row">
                @foreach ($blog as $item)
               <div class="col-xs-12">
                  <article class="blog-item">
                     <div class="row">
                        <div class="col-xs-12 col-sm-4">
                           <div class="blog-item-thumbnail">						
                              <a title="{{languageName($item->title)}}" href="{{route('detailBlog',['slug'=>$item->slug])}}">
                              <img src="{{$item->image}}" alt="{{languageName($item->title)}}">
                              </a>
                           </div>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                           <div class="blog-item-info">
                              <h3 class="blog-item-name"><a title="{{languageName($item->title)}}" href="{{route('detailBlog',['slug'=>$item->slug])}}">{{languageName($item->title)}}</a></h3>
                              <div class="post-time">
                                 <div class="inline-block">{{date_format($item->created_at,'d/m/Y')}}
                                 </div>
                              </div>
                              <p class="blog-item-summary linea"> {{languageName($item->description)}}</p>
                           </div>
                        </div>
                     </div>
                  </article>
               </div>
               @endforeach
            </div>
         </section>
         <div class="row">
            <div class="col-xs-12 text-center">
               <nav>
                  {{$blog->links()}}
               </nav>
            </div>
         </div>
      </section>
      <aside class="left left-content col-md-3 col-md-pull-9">
         <aside class="blog-aside aside-item sidebar-category">
            <div class="aside-title">
               <h2 class="title-head"><span>Danh mục tin</span></h2>
            </div>
            <div class="aside-content">
               <div class="nav-category  navbar-toggleable-md">
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
         <div class="blog-aside aside-item">
            <div>
               <div class="aside-title mb-4">
                  <h2 class="title-head"><a href="javascript:;">Tin mới nhất</a></h2>
               </div>
               <div class="aside-content">
                  <div class="blog-list blog-image-list">
                      @foreach ($blog as $item)
                      <div class="loop-blog">
                        <div class="thumb-left">
                           <a title="{{languageName($item->title)}}" href="{{route('detailBlog',['slug'=>$item->slug])}}">
                           <img src="{{$item->image}}" style="width:100%;" alt="{{languageName($item->title)}}" class="img-responsive">
                           </a>
                        </div>
                        <div class="name-right">
                           <h3><a href="{{route('detailBlog',['slug'=>$item->slug])}}">{{languageName($item->title)}}</a></h3>
                           <div class="post-time">
                            {{date_format($item->created_at,'d/m/Y')}}
                           </div>
                        </div>
                     </div>
                      @endforeach
                  </div>
               </div>
            </div>
         </div>
      </aside>
   </div>
</div>
@endsection