@extends('master')
@section('content')
    <main class="container">
        <section class="row">
            <div class="col-sm-6">
                <img class="detail-img" src="{{$products['gallery']}}" alt="chaina">
            </div>
            <div class="col-sm-6">
                <a href="/">Go Back</a>
                <h2>{{$products['name']}}</h2>
                <h4>Price : ${{$products['price']}}</h4>
                <h6>Category : {{$products['category']}}</h6>
                <h6>Description : {{$products['description']}}</h6>
                <br><br>
                <form action="/add_to_basket" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$products['id']}}"/>
                    <button class="btn btn-success">Add to basket</button>
                </form>
                <br><br>
                <button class="btn btn-primary">Buy Now</button>
                <br><br>
            </div>

        </section>
    </main>
@endsection
