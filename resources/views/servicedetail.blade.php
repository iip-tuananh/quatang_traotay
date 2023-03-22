@extends('layouts.main.master')
@section('title')
{{languageName($detail_service->name)}}
@endsection
@section('description')
{{languageName($detail_service->description)}}
@endsection
@section('image')
{{url(''.$detail_service->image)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<section class="page-title" style="background-image: url({{url('frontend/images/bannenews.jpg')}});">
	<div class="auto-container">
	   <div class="content-box">
		  <div class="title-box">
			 <h1>{{languageName($detail_service->name)}}</h1>
		  </div>
		  <ul class="bread-crumb clearfix">
			 <li><a href="{{route('home')}}">Home</a></li>
			 <li>{{languageName($detail_service->name)}}</li>
		  </ul>
	   </div>
	</div>
 </section>
 <section class="sidebar-page-container blog-standard"> 
	<div class="auto-container">
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 content-side">
				<div class="blog-details-content">
					<div class="inner-box">
						<div class="content-one" id="article-content">
							<h3>{{languageName($detail_service->name)}}</h3>
							{!!languageName($detail_service->content)!!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection