@extends('master')
@section('content')
    <main class="container custom-product">
        <section class="col-sm-6">
            <table class="table table-hover">

                <tbody>
                <tr>
                    <td><h6>Price</h6></td>
                    <td>${{$total}}</td>
                </tr>
                <tr>
                    <td><h6>GST</h6></td>
                    <td>0</td>
                </tr>
                <tr>
                    <td><h6>Delivery Charge</h6></td>
                    <td>$10</td>
                </tr>
                <tr>
                    <td><h6>Total Amount</h6></td>
                    <td>${{$total+10}}</td>
                </tr>
                </tbody>
            </table>
            <form action="/orderplace" method="post">
                @csrf
                <div class="mb-3 mt-3">
                    <textarea class="form-control" name="address" placeholder="Enter your Address" rows="5" id="comment" name="text"></textarea>
                </div>
                <div class="mb-3">
                    <label for="payment">Payment Method</label>
                    <p><input type="radio" value="cash" placeholder="Payment" name="payment"/>
                        <span>Google pay</span>
                    </p>
                    <p><input type="radio" value="cash" placeholder="Payment" name="payment"/>
                        <span>Paypal</span>
                    </p>
                    <p><input type="radio" value="cash" placeholder="Payment" name="payment"/>
                        <span>Direct bank</span>
                    </p>
                </div>
                <button type="submit" class="btn btn-primary">Order now</button>
            </form>
        </section>
    </main>
@endsection
