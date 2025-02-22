@extends('layouts.layout')
@section('content')
<style>
    .radio-toolbar input[type="radio"] {
        display: none;
    }
    .radio-toolbar label {
        display: inline-block;
        background-color: #ddd;
        padding: 5px 20px;
        cursor: pointer;
    }
    .radio-toolbar input[type="radio"]:checked+label {
        background-color: #333;
        color:#fff
    }
    .radio-toolbar input[type="radio"]+label:hover {
        transition: transform .2s;
        transform: scale(1.2);
    }
    .product-info .number{
        width: max-content;
        border: 1px solid #D6D8DB;
        border-radius: 3px;
    }
    .numberInput {
        width: 50px;
        text-align: center;
        height: 45px;
        border-top: 0;
        border-bottom: 0;
        border-left: 1px solid #D6D8DB;
        border-right: 1px solid #D6D8DB;
    }
    .product-infor .numberInput:focus{
        outline: none;
    }
    .decreaseButton, .increaseButton{
        width: 100px;
        width: 30px;
        font-size: 35px;
        height: 45px;
        vertical-align: middle;
        border: 0;
        color: #D6D8DB;
        background: none;
    }
    .increaseButton {
        font-size: 25px;
        margin-left: -5px;
        padding-bottom: 5px; 
    }
    .decreaseButton {
        margin-top: -13px;
        margin-right: -5px;
        padding-bottom: 47px; 
    }
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0; 
    }
    .product__details__tab__content img{
        height: auto !important;
        width: auto !important;
    }
</style>
    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="/">Trang chủ</a>
                            <a href="/shop">Cửa hàng</a>
                            <span>{{$product->Title}}</span>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img class="thumb-product" src="/temp/images/product/{{$product->thumb}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product__details__text text-left product-infor-main product-info">
                            <h4 class="title-product-detail">{{$product->Title}}</h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span> - 5 Reviews</span>
                            </div>
                            @if($product->discount > 0)
                                <h5 class="discount text-danger font-weight-bold" style="text-decoration: line-through;">{{ number_format($product->price) }} VNĐ</h5>
                                <h4 class="price okPrice-product text-info font-weight-bold">{{ number_format($product->discount) }} VNĐ</h4>
                            @else
                                <h4 class="price okPrice-product text-info font-weight-bold">{{ number_format($product->price) }} VNĐ</div>
                            @endif
                            <div class="product__details__option">
                                <div class="radio-toolbar">
                                    <span>Kích cỡ:</span>
                                    @foreach($sizes as $size)
                                        <input type="radio" id="{{$size}}" name="sizes" value="{{$size}}" checked>
                                        <label for="{{$size}}">{{$size}}</label>
                                    @endforeach
                                </div>
                                <div class="radio-toolbar">
                                    <span>Màu sắc:</span>
                                    @foreach($colors as $color)
                                        <input type="radio" id="{{$color}}" name="colors" value="{{$color}}" checked>
                                        <label for="{{$color}}">{{$color}}</label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex form-add-to-cart" id="form-add-to-cart-details">
                                @if($product->Amounts > 0)
                                <div class="number me-3">
                                    <button type="button " class="decreaseButton text-dark" id="decreaseButton">-</button>
                                    <input name="quanity" class="quantity numberInput" type="number" inputmode="numeric" id="numberInput" value="0" min="0">
                                    <button type="button " class="increaseButton text-dark" id="increaseButton">+</button>
                                </div>
                                    <a href="" data-user-id="{{ Auth::id() }}" data-product-id="{{$product->id}}" data-quantity="{{$product->Amounts}}" class="btn ml-4 primary-btn rounded-2 add-to-cart call d-flex align-items-center px-3 py-2">
                                        <svg style="width: 24px; height: 24px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#e6e6e6" viewBox="0 0 256 256"><path d="M96,216a16,16,0,1,1-16-16A16,16,0,0,1,96,216Zm88-16a16,16,0,1,0,16,16A16,16,0,0,0,184,200ZM230.44,67.25A8,8,0,0,0,224,64H48.32L40.21,35.6A16.08,16.08,0,0,0,24.82,24H8A8,8,0,0,0,8,40H24.82L61,166.59A24.11,24.11,0,0,0,84.07,184h96.11a23.89,23.89,0,0,0,22.94-16.94l28.53-92.71A8,8,0,0,0,230.44,67.25Z"></path></svg>
                                        <span class="ms-2 fw-bold fs-6">Thêm vào giỏ</span>
                                    </a>
                                @else
                                    <h4 class="p-2 text-white bg-danger">Hết hàng!</h4>
                                @endif
                            </div>
                            <div class="product__details__btns__option mt-4">
                                <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                                <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                            </div>
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="/temp/assets/img//shop-details/details-payment.png" alt="">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Description</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        {!! $product->content !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Sản phẩm mới nhất</h3>
                </div>
            </div>
            <div class="row">
                @foreach($new_products as $product)
                    <div id="product-infor-list-{{$product->id}}" class="col-lg-3 col-md-6 col-sm-6 product-infor-main">
                        <input type="number" hidden class="quantity" value="1">
                        <div class="product__item">
                            <div class="product__item__pic set-bg position-relative" data-setbg="/temp/images/product/{{$product->thumb}}">
                                <img class="thumb-product d-none" src="/temp/images/product/{{$product->thumb}}" alt="{{$product->title}}">
                                <a href="{{ route('products.details', ['slug' =>$product->slug]) }}" class="detail-product-bg position-absolute" style="bottom: 0; top: 0; right: 0; left: 0"></a>
                                <a href="" class="badge badge-warning position-relative z-20">{{$product->Category->title}}</a>
                                <ul class="product__hover">
                                    <li><a href="{{ route('products.details', ['slug' =>$product->slug]) }}"><img src="/temp/assets/img//icon/search.png" alt=""><span>Chi tiết</span></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6 class="my-2 title-product">{{$product->Title}}</h6>
                                <a data-user-id="{{ Auth::id() }}" data-product-id="{{$product->id}}" data-quantity="{{ $product->Amounts }}" href="{{ route('products.details', ['slug' =>$product->slug]) }}"class="add-cart">Chi tiết sản phẩm</a>
                                <div class="border-top pt-2">
                                    @if($product->discount > 0)
                                        <div class="discount text-danger font-weight-bold" style="text-decoration: line-through; font-size:13px">{{ number_format($product->price) }} VNĐ</div>
                                        <div class="price okPrice-product text-info font-weight-bold">{{ number_format($product->discount) }} VNĐ</div>
                                    @else
                                        <div class="price okPrice-product text-info font-weight-bold">{{ number_format($product->price) }} VNĐ</div>
                                    @endif
                                </div>
                                <div class="product__color__select">
                                    <label for="pc-4">
                                        <input type="radio" id="pc-4">
                                    </label>
                                    <label class="active black" for="pc-5">
                                        <input type="radio" id="pc-5">
                                    </label>
                                    <label class="grey" for="pc-6">
                                        <input type="radio" id="pc-6">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Section End -->

@endsection
