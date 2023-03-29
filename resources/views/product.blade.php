@extends('master')
@section('content')
    <main class="container custom-product">
        <!-- Carousel -->
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                        class="active"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                @foreach($products as $item)
                    <div class="carousel-item {{$item['id']==1?'active':''}} ">
                        <a href="/detail/{{$item['id']}}">
                            <div class="d-flex justify-content-center">
                                <img class="slider-img" src="{{$item['gallery']}}" alt="chania"/>
                            </div>
                            <div class="carousel-caption slider-text" style="color: white">
                                <h3>{{$item['name']}}</h3>
                                <p>{{$item['description']}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" style=""></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" style=""></span>
            </button>

        </div>
        <div class="trending-wrapper">
            <h3>Trending products</h3>
            @foreach($products as $item)
                <a href="/detail/{{$item['id']}}">
                    <div class="trending-item">
                        <img class="trending-img" src="{{$item['gallery']}}" alt="chania"/>
                        <div class="">
                            <h3>{{$item['name']}}</h3>
                        </div>
                    </div>
                    <a href="/detail/{{$item['id']}}">

            @endforeach
        </div>
    </main>
@endsection
