@extends('layouts.main.master')
@section('title')
Giới thiệu về Faifo Foods
@endsection
@section('description')
Giới thiệu về Faifo Foods
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<section class="page-title" style="background-image: url({{url('frontend/images/banneraboutus.jpg')}});">
    <div class="auto-container">
       <div class="content-box">
          <div class="title-box">
             <h1>Giới thiệu về Faifo Foods </h1>
          </div>
          <ul class="bread-crumb clearfix">
             <li><a href="{{route('home')}}">Home</a></li>
             <li>Giới thiệu </li>
          </ul>
       </div>
    </div>
 </section>
 <section class="portfolio-section">
   <div class="auto-container">
      <div class="sec-title text-center">
         <h2 style="font-size:30px;padding-top:22px">Giới thiệu về FaiFo Foods</h2>
      </div>
      <div class="row clearfix">
         <div class="col-lg-12 col-md-12 col-sm-12 content-side">
            {!!languageName($pageContent->content)!!}
         </div>
      </div>
   </div>
</section>
 <section class="service-section bg-color-1">
    <div class="icon-layer" style="background-image: url({{url('frontend/images/bg-icon-1.png')}});"></div>
    <div class="auto-container">
       <div class="sec-title text-center">
          <h2>Dịch vụ cung cấp</h2>
       </div>
       <div class="row clearfix">
          @foreach ($services as $services)
          <div class="col-lg-4 col-md-6 col-sm-12 service-block">
             <div class="service-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                <div class="inner-box">
                   <div class="icon-box">
                      <img
                      src="{{$services->image}}" alt="services">
                   </div>
                   <h3><a href="{{route('serviceDetail',['slug'=>$services->slug])}}">{{languageName($services->name)}}</a></h3>
                   <p>{{languageName($services->description)}}</p>
                   <div class="btn-box">
                      <a href="{{route('serviceDetail',['slug'=>$services->slug])}}" class="theme-btn">Đọc thêm</a>
                   </div>
                </div>
             </div>
          </div>
          @endforeach
       </div>
    </div>
 </section>
 <section class="about-style-two">
   <div class="auto-container">
      <div class="row align-items-center clearfix">
         <div class="col-lg-6 col-md-12 col-sm-12 content-column">
            <div id="content_block_2">
               <div class="content-box">
                  <div class="sec-title style-two">
                     <h2>Giá trị cốt lõi</h2>
                  </div>
                  <div class="text">
                     <p>Trung thực <br>
                        Cùng cộng đồng phát triển<br>
                        Công bằng<br>
                        Vì hạnh phúc sức khỏe cộng đồng
                     </p>
                  </div>
                  <ul class="list clearfix">
                     <li>
                        <i class="flaticon-call-center-agent"></i>
                        +100 Nhân sự
                     </li>
                     <li>
                        <i class="flaticon-free-delivery"></i>
                        20 Cửa hàng trên toàn quốc
                     </li>
                     <li>
                        <i class="flaticon-return-of-investment"></i>
                        10 Đối tác
                     </li>
                     <li>
                        <i class="flaticon-winner"></i>
                        3 Năm hoạt động
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-md-12 col-sm-12 image-column">
            <div id="image_block_1">
               <div class="image-box">
                  <figure class="image image-1"><img
                     src="{{url('frontend/images/aa.jpg')}}"
                     alt=""></figure>
                  <figure class="image image-2"><img
                     src="{{url('frontend/images/sumenh.jpg')}}"
                     alt=""></figure>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
 <section class="funfact-section centred bg-color-2">
   
</section>
 <section class="team-section centred">
    <div class="outer-container">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url({{url('frontend/images/shape-1.png')}});"></div>
            <div class="pattern-2" style="background-image: url({{url('frontend/images/shape-2.png')}});"></div>
        </div>
        <div class="anim-icon">
            <div class="icon icon-1 float-bob-y" style="background-image: url({{url('frontend/images/anim-icon-1.png')}});"></div>
            <div class="icon icon-2" style="background-image: url({{url('frontend/images/anim-icon-2.png')}});"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title style-two">
                <h2>Con người Faifo Foods</h2>
            </div>
            <div class="four-item-carousel owl-carousel owl-theme owl-nav-none">
                @foreach ($founder as $founder)
                   <div class="team-block-one">
                      <div class="inner-box">
                         <figure class="image-box">
                            <img src="{{$founder->image}}" alt="">
                         </figure>
                         <div class="lower-content">
                            <h3><a href="javascript:;">{{$founder->name}}</a></h3>
                            <p>{{$founder->position}}</p>
                         </div>
                      </div>
                   </div>
               @endforeach
                
            </div>
        </div>
    </div>
 </section>
 
 <section class="portfolio-section">
   <div class="auto-container">
       <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
          @foreach ($album as $album)
          <div class="portfolio-block-one">
            <div class="inner-box">
                <figure class="image-box"><img src="{{$album->image}}" alt=""></figure>
                <div class="lower-content">
                    <div class="inner">
                        <span>Faifo Foods Albums</span>
                        <h4><a href="javascript:;">{{$album->name}}</a></h4>
                        <div class="link"><a href="javascript:;"><i class="flaticon-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
          @endforeach
           
       </div>
   </div>
</section>
<section class="clients-section">
   <div class="auto-container">
      <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none owl-loaded owl-drag">
         @foreach ($partner as $item)
         <div class="item">
            <figure class="logo-image">
               <a href="{{$item->link}}">
                  <img src="{{$item->image}}" alt="partner">
               </a>
            </figure>
         </div>
         @endforeach
         
      </div>
   </div>
</section>
@endsection