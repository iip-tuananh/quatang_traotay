
<div class="container" style="min-height: 350px">
    <div class="rounded p-2 p-md-3 bg-white">
       <h1 class="cart-name font-weight-bold text-uppercase pb-2 pt-2 mb-2">
          Giỏ hàng
       </h1>
       @php
       $totalPrice = 0;
       @endphp
       @if(count($cartcontent)>0)
       <div class="row js-cart listcartajax">
          <div class="basket cart__basket col-md-8 ">
             @foreach ($cartcontent as $item)
             @php
             $pricePro = $item['price'] - $item['price'] * ($item['discount']/100);
             $totalPrice += $item['quantity'] * $pricePro ;
             @endphp
             <div class="row" >
                <div class="col-md-3 col-xs-2">
                    <img src="{{$item['image']}}" class="js-img position-absolute" alt="undefined">
                </div>
                <div class="col-md-3 col-xs-3">
                   <p class="item-title clearfix mb-2">
                      <a href="/xiaomi-redmi-note-11-pro-plus-5g" title="{{languageName($item['name'])}}" class="js-titlte font-weight-bold">{{languageName($item['name'])}}</a>
                   </p>
                   {{-- <span class="js-price  ml-auto text-right clearfix"><del style="color:black">{{number_format($item['price'])}}</del>&nbsp;₫</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                   <span class="js-price price font-weight-bold  clearfix">{{number_format($pricePro)}}&nbsp;₫</span>
                </div>
                <div class="col-md-4 col-xs-5 flex-gio">
                   <button
                   onclick="btnMinus('{{$item['id']}}','{{route('update.cart')}}')"
                   class="reduced_pop items-count btn-minus btn btn-default bootstrap-touchspin-down"
                   type="button">–</button>
                   <input
                      type="text"
                      maxlength="12" min="1" disabled=""
                      class="form-control quantity-r2 quantity js-quantity-product input-text number-sidebar input_pop input_pop qtyItem27698914 quantity-cus"
                      id="qty{{$item['id']}}" name="Lines"
                      size="4" value="{{$item['quantity']}}" style="text-align: center">
                      <button
                      onclick="btnPlus('{{$item['id']}}','{{route('update.cart')}}')"
                      class="increase_pop items-count btn-plus btn btn-default bootstrap-touchspin-up"
                      type="button">+</button>
                   
                    </div>
                    <div class="col-md-2 col-xs-2">
                    <button data-url="{{route('remove.from.cart')}}" data-id="{{$item['id']}}" class="btn btn-outline-danger remove ml-auto remove_item_cart" title="Xoá" data-variantid="70103789">Xoá</button>

                </div>
             </div>
             <br>
             @endforeach
          </div>
          <div class="summary cart__summary col-md-4">
             <dl class="total mb-4 p-3 d-flex align-items-center clearfix flex-wrap justify-content-end rounded">
                <dt class="text-uppercase font-weight-bold roun" style="color: black">Tổng tiền</dt>
                <dd class="cart__summary_total font-weight-bold ml-auto mb-0">{{number_format($totalPrice)}}&nbsp;₫</dd>
             </dl>
             <a class="btn btn-block btn-checkout btn-danger rounded mb-3 text-uppercase font-weight-bold pt-3 pb-3" href="{{route('checkout')}}" role="button">Thanh toán</a>
             <hr>
             <a class="btn btn-block btn-clearcart js-clearcart btn-dark rounded w-100 font-weight-bold mb-4" href="{{route('home')}}" role="button" >Tiếp tục mua hàng</a>
          </div>
       </div>
       @else
       <div class="basket cart__basket col-md-12 ">
          <div class="d-flex cart__basket__item product mb-4 rounded ux-card position-relative clearfix">
             Hiện tại không có sản phẩm nào trong giỏ hàng
          </div>
       </div>
       <div class="summary cart__summary col-md-12">
          <a class="btn btn-block btn-clearcart js-clearcart btn-dark rounded w-100 font-weight-bold mb-4" href="{{route('home')}}" role="button" >Tiếp tục mua hàng</a>
       </div>
       @endif
    </div>
 </div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script>
    $('.remove_item_cart').click(function (e) { 
      e.preventDefault();
         var id = $(this).data('id');
         var url = $(this).data('url');
         $.ajax({
            type: "get",
            url: url,
            data: {
               id:id,
            },
            success: function (data) {
               $('.cart-layout-new').html(data.html3);
               $('.count-item').html(data.html2);
            }
         });
   });
</script>
