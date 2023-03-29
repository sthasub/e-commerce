@extends('master')
@section('content')
    <main class="container custom-product">
        <section class="row">
            <section class="col-sm-4">
                <a href="#">Filter</a>
            </section>
            <section class="col-sm-4">
                <div class="trending-wrapper">
                    <h3>Result for products</h3>
                    @foreach($products as $item)
                        <div class="search-item">
                            <a href="/detail/{{$item['id']}}">
                                <img class="trending-img" src="{{$item['gallery']}}" alt="chania"/>
                                <div class="">
                                    <h2>{{$item['name']}}</h2>
                                    <h5>{{$item['description']}}</h5>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        </section>
    </main>
@endsection
