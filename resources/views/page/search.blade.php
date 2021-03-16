@extends('master')
@section('content')
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Tìm kiếm</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">tìm thấy {{count($product)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($product as $n_p)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            @if($n_p->promotion_price == 0)
                                            @else
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="chi-tiet-san-pham/{{$n_p->id}}"><img src="source/image/product/{{$n_p->image}}" alt="" height="250px"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$n_p->name}}</p>
                                                @if($n_p->promotion_price == 0)
                                                    <p class="single-item-price">
                                                        <span class="flash-sale">{{$n_p->unit_price}}</span>
                                                    </p>
                                                @else
                                                    <p class="single-item-price">
                                                        <span class="flash-del">{{$n_p->unit_price}}</span>
                                                        <span class="flash-sale">{{$n_p->promotion_price}}</span>
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="add-to-cart/{{$n_p->id}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="chi-tiet-san-pham/{{$n_p->id}}">chi tiết <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{--<div class="row">{{$product->links()}}</div>--}}
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
    @endsection