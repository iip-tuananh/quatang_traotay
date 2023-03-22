@extends('layouts.main.master')
@section('title')
Liên hệ với chúng tôi
@endsection
@section('description')
Liên hệ với chúng tôi
@endsection
@section('image')
{{url(''.$setting->logo)}}
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
               <li><strong>Liên hệ</strong></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<div class="container container-fix-hd contact margin-bottom-30">
   <div class="box-heading hidden relative">
      <h1 class="title-head">Liên hệ</h1>
   </div>
   <h2 class="title-head"><span> Gửi tin nhắn cho chúng tôi</span></h2>
   <div class="row">
      <div class="col-sm-12">
         <div class="row">
            <div class="col-md-6">
               <div id="login">
                  <form accept-charset="utf-8"action="{{route('postcontact')}}" method="post">
					@csrf
                     <div class="form-signup form_contact clearfix">
                        <div class="row row-8Gutter">
                           <div class="col-md-12">
                              <fieldset class="form-group">							
                                 <input type="text" placeholder="Họ tên*" name="name" id="name" class="form-control  form-control-lg" required="">
                              </fieldset>
                           </div>
                           <div class="col-md-12">
                              <fieldset class="form-group">							
                                 <input type="email" placeholder="Email*" name="email" class="form-control form-control-lg" required="">
                              </fieldset>
                           </div>
                           <div class="col-md-12">
                              <fieldset class="form-group">						
                                 <input type="tel" placeholder="Điện thoại*" name="phone" class="form-control form-control-lg fixnumber" required="">
                              </fieldset>
                           </div>
                        </div>
                        <fieldset class="form-group">							
                           <textarea name="mess" placeholder="Nhập nội dung*" class="form-control form-control-lg" rows="6" required=""></textarea>
                        </fieldset>
                        <div>
                           <button tyle="summit" class="btn btn-primary" style="padding:0 40px;text-transform: inherit;">Gửi liên hệ</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-md-6">
               <div class="contact-box-info clearfix margin-bottom-30">
                  <div>
                     <div class="item">
                        <div>
                           <i class="fa fa-map-marker"></i> 
                           <div class="info">
                              <label>Địa chỉ liên hệ</label>
                              {{$setting->address1}}
                           </div>
                        </div>
                        <div>
                           <i class="fa fa-phone"></i> 
                           <div class="info">
                              <label>Số điện thoại</label>
                              <a href="tel:{{$setting->phone1}}">{{$setting->phone1}}</a>
                              <p>Thứ 2 - Chủ nhật: 9:00 - 18:00</p>
                           </div>
                        </div>
                        <div>
                           <i class="fa fa-envelope"></i> 
                           <div class="info">
                              <label>Email</label>
                              <a href="mailto:{{$setting->email}}">{{$setting->email}}
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-12">
         {!!$setting->iframe_map!!}
      </div>
   </div>
</div>
@endsection