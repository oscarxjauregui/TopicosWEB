@extends('layouts.e-comerce')

@section('content')

    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($products as $p)
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">{{$p -> name}}</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="/product-detail/{{$p->id}}">
                                            @foreach (json_decode($p->images) as $img )
                                                @if ($loop->first)
                                                    <img src="{{ asset('img') }}/{{ $img }}" alt="Product Image">
                                                    @break
                                                @endif
                                            @endforeach
                                            
                                        </a>
                                        <div class="product-action">
                                            <a href="/product-detail/{{$p->id}}"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>{{$p -> price}}</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>           
            </div>
        </div>
    </div>
    <!-- Product List End -->  

@endsection