@extends('layouts.main.master')
@section('title')
{{$pagecontentdetail->title}}
@endsection
@section('description')
{{$pagecontentdetail->title}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
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
					
					<li><strong>{{$pagecontentdetail->title}}</strong></li>
					
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="page">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="page-title category-title">
					<h1 class="title-head"><a href="#">Giới thiệu</a></h1>
				</div>
				<div class="content-page rte" id="article-content">
					{!!$pagecontentdetail->content!!}
				</div>
			</div>
		</div>
	</div>
</section>

@endsection