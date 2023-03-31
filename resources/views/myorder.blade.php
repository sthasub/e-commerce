@extends('master')
@section('content')
    <main class="container custom-product">
        <section class="">
            <div class="trending-wrapper">
                <h3>Basket List</h3>
{{--                <a class="btn btn-success" href="/ordernow">Order Now</a>--}}
                <br/>
                <br/>
                @foreach($orders as $order)
                    <div class="row search-item basket-list-divider">
                        <div class="col-sm-3">
                            <a href="/detail/{{$order->id}}">
                                <img class="trending-img" src="{{$order->product->gallery}}" alt="chania"/>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <div class="">
                                <h2>{{$order->name}}</h2>
                                <h6>Delivery Status: {{$order->status}}</h6>
                                <h6>Payment Status: {{$order->payment_status}}</h6>
                                <h6>Payment Method: {{$order->payment_method}}</h6>
                                <h6>Delivery Address: {{$order->address}}</h6>
                            </div>
                        </div>
                        <div class="col-sm-3">
{{--                            <a href="/removebasket/{{$order->basket_id}}" class="btn btn-warning">Remove from basket</a>--}}
                        </div>
                    </div>
                @endforeach
{{--                <a class="btn btn-success" href="/ordernow">Order Now</a>--}}
            </div>
        </section>

    </main>
@endsection
