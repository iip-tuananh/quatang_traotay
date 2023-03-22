@extends('layouts.main.master')
@section('title')
{{languageName($blog_detail->title)}}
@endsection
@section('description')
{{languageName($blog_detail->description)}}
@endsection
@section('image')
{{url(''.$blog_detail->image)}}
@endsection
@section('css')
@endsection
@section('js')
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
               <li>
                  <a href="javascript:;"><span>Tin tức</span></a>	
                  <span> <i class="fa fa-angle-right"></i> </span>
               </li>
               <li><strong>{{languageName($blog_detail->title)}}</strong></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<div class="container article-wraper">
   <div class="row">
      <section class="right-content col-lg-12">
         <article class="article-main" itemscope="" itemtype="http://schema.org/Article">
            <div class="row">
               <div class="col-lg-12">
                  <div class="article-details">
                     <h1 class="article-title"><a href="javascript:;">{{languageName($blog_detail->title)}}</a></h1>
                     <div class="post-time">
                        {{date_format($blog_detail->created_at,'d/m/Y')}}
                     </div>
                     <div class="article-image">
                        <a href="javascript:;">
                        <img class="img-fluid" src="{{$blog_detail->image}}" alt="{{languageName($blog_detail->title)}}">
                        </a>
                     </div>
                     <div class="article-content">
                        <div class="rte" id="article-content">
                            {!!languageName($blog_detail->content)!!}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </article>
      </section>
   </div>
</div>
@endsection