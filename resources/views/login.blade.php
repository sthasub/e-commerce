@extends('master')
@section('content')
    <main class="container d-flex justify-content-center custom-login">
        <section>
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
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
            <br>
            <div>------------------or--------------------</div>
            <label class="form-label" style="margin-left: 20%">Sign up with Third party</label>
            <br>
            <br>
            <a href="/google/redirect" style="text-underline: none; margin-left: 40px">
                <button title="Login with Google" type="button" class="btn btn-danger" > <i class="fa-brands fa-google"></i>oogle</button>
            </a>
            <a href="/facebook/redirect" style="text-underline: none; margin-left: 40px">
                <button type="button" title="Login with Facebook" class="btn btn-primary" ><i class="fa-brands fa-facebook-f"></i>acebook</button>
            </a>
        </section>

    </main>
@endsection
