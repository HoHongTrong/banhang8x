@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$ten_sp->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="trang-chu">Home</a> / <span>Loại sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($loai as $l)
                        <li><a href="loai-san-pham/{{$l->id}}">{{$l->name}}</a></li>
                            @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>sảm phẩm {{$ten_sp->name}}</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($sp_theoloai as $loai)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($loai->promotion_price == 0)
                                    @else
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="chi-tiet-san-pham/{{$loai->id}}"><img src="source/image/product/{{$loai->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$loai->name}}</p>
                                        <p class="single-item-price">
                                        @if($loai->promotion_price == 0)
                                            <p class="single-item-price">
                                                <span class="flash-sale">{{$loai->unit_price}}</span>
                                            </p>
                                        @else
                                            <p class="single-item-price">
                                                <span class="flash-del">{{$loai->unit_price}}</span>
                                                <span class="flash-sale">{{$loai->promotion_price}}</span>
                                            </p>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="chi-tiet-san-pham/{{$loai->id}}">chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khác</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($sp_khac as $spk)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($spk->promotion_price == 0)
                                    @else
                                        <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="source/image/product/{{$spk->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$spk->name}}</p>
                                        <p class="single-item-price">
                                        @if($spk->promotion_price == 0)
                                            <p class="single-item-price">
                                                <span class="flash-sale">{{$spk->unit_price}}</span>
                                            </p>
                                        @else
                                            <p class="single-item-price">
                                                <span class="flash-del">{{$spk->unit_price}}</span>
                                                <span class="flash-sale">{{$spk->promotion_price}}</span>
                                            </p>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                        </div>
                        <div class="row">{{$sp_khac->links()}}</div>
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -
    @endsection