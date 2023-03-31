@extends('master')
@section('content')
    <main class="container d-flex justify-content-center custom-login">
        <form action="/login" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                {{--                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
        <a href="/google/redirect" style="text-underline: none; margin-left: 40px">
            <label class="form-label">Sign up with Third party</label>
            <br>
            <button type="button" class="btn btn-light" > Google</button>
        </a>
    </main>
@endsection
