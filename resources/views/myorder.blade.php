@extends('master')
@section('content')
    <main class="container custom-product">
        <section class="">
            <div class="trending-wrapper">
                <h3>Basket List</h3>
{{--                <a class="btn btn-success" href="/ordernow">Order Now</a>--}}
                <br/>
                <br/>
                @foreach($orders as $item)
                    <div class="row search-item basket-list-divider">
                        <div class="col-sm-3">
                            <a href="/detail/{{$item->id}}">
                                <img class="trending-img" src="{{$item->gallery}}" alt="chania"/>
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <div class="">
                                <h2>{{$item->name}}</h2>
                                <h6>Delivery Status: {{$item->status}}</h6>
                                <h6>Payment Status: {{$item->payment_status}}</h6>
                                <h6>Payment Method: {{$item->payment_method}}</h6>
                                <h6>Delivery Address: {{$item->address}}</h6>
                            </div>
                        </div>
                        <div class="col-sm-3">
{{--                            <a href="/removebasket/{{$item->basket_id}}" class="btn btn-warning">Remove from basket</a>--}}
                        </div>
                    </div>
                @endforeach
{{--                <a class="btn btn-success" href="/ordernow">Order Now</a>--}}
            </div>
        </section>

    </main>
@endsection
