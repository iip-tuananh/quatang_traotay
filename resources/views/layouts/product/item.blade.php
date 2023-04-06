
@php
         $img = json_decode($pro->images);
   @endphp
<div class="item">
   <div class="product-box">
      <div class="product-thumbnail flexbox-grid">
         <a href="" title="{{languageName($pro->name)}}">
         <img class="lazyload" src="{{url('frontend/images/rolling.svg')}}"  data-src="{{$img[0]}}" alt="{{languageName($pro->name)}}">
         </a>
      </div>
      <div class="product-info a-center">
         <h3 class="product-name"><a style="font-size:14px" href="{{route('detailProduct',['cate'=>$pro->cate_slug,'type'=>$pro->type_slug ? $pro->type_slug : 'loai','id'=>$pro->slug])}}" title="{{languageName($pro->name)}}">{{languageName($pro->name)}}</a></h3>
         <div class="sapo-product-reviews-badge" data-id="11480175"></div>
         <div class="price-box clearfix">
            <div class="special-price">
               @if ($pro->price > 0)
               <span class="price product-price">{{number_format($pro->price-($pro->price*($pro->discount/100)))}}đ</span>
               @else 
               <span class="price product-price">Liên hệ</span>
               @endif
               <br>
               <a  class="btn-xemthem" href="{{route('detailProduct',['cate'=>$pro->cate_slug,'type'=>$pro->type_slug ? $pro->type_slug : 'loai','id'=>$pro->slug])}}"><button class="">xem thêm</button></a>
            </div>
         </div>
      </div>
   </div>
</div>