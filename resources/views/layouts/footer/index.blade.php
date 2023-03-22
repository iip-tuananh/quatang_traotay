<footer class="footer">
   <div class="content">
      <div class="site-footer">
         <div class="footer-inner padding-top-35 pb-lg-5">
            <div class="container">
               <div class="row">
                  <div class="col-xs-12 col-sm-6 col-lg-3">
                     <div class="footer-widget">
                        <h3 class="hastog"><span>Liên hệ</span></h3>
                        <ul class="list-menu list-showroom">
                           <li style="padding-left: 0;">
                              <p>{{$setting->webname}}</p>
                           </li>
                           <li class="clearfix">
                              <i class="block_icon fa fa-map-marker"></i> 
                              <p>
                                 {{$setting->address1}}
                              </p>
                           </li>
                           <li class="clearfix">
                              <i class="block_icon fa fa-phone"></i>
                              <a href="tel:{{$setting->phone1}}"> {{$setting->phone1}}</a>
                              <p>Thứ 2 - Chủ nhật: 9:00 - 18:00</p>
                           </li>
                           <li class="clearfix"><i class="block_icon fa fa-envelope"></i>
                              <a title="{{$setting->email}}" href="mailto:{{$setting->email}}"> {{$setting->email}}</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-3">
                     <div class="footer-widget">
                        <h3 class="hastog"><span>Về chúng tôi</span></h3>
                        <ul class="list-menu list-blogs">
                           @foreach ($pageContent as $item)
                              @if ($item->type == 've-chung-toi')
                                 <li><a title="Trang chủ" href="{{route('pagecontent',['slug'=>$item->slug])}}">{{$item->title}}</a></li>
                              @endif
                           @endforeach
                        </ul>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-3">
                     <div class="footer-widget">
                        <h3 class="hastog"><span>Hỗ trợ khách hàng</span></h3>
                        <ul class="list-menu list-blogs">
                           @foreach ($pageContent as $item)
                              @if ($item->type == 'ho-tro-khanh-hang')
                                 <li><a title="Trang chủ" href="{{route('pagecontent',['slug'=>$item->slug])}}">{{$item->title}}</a></li>
                              @endif
                           @endforeach
                        </ul>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-lg-3">
                     <div class="footer-widget">
                        <h3 class="hastog"><span>Vị trí</span></h3>
                        {!!$setting->iframe_map!!}
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="copyright clearfix">
            <div class="container">
               <div class="inner clearfix">
                  <div class="row">
                     <div class="col-md-12 text-center text-lg-left">
                        <span>© Bản quyền thuộc về <b>Trung Thành</b> <b class="fixline">|</b> Cung cấp bởi 
                       Cubon web
                        </span>
                     </div>
                  </div>
               </div>
               <div class="back-to-top">
                  <i class="fa  fa-angle-up"></i>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>