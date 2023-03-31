@extends('master')
@section('content')
    <main class="container d-flex justify-content-center custom-login">
        <form action="/register" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">User Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                {{--                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
            </div>
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
            <button type="submit" class="btn btn-primary" >Register</button>
            @if(isset($regis))
                <br/>
                <h5 style="background-color: yellow">{{$regis}}</h5>
            @else
{{--                <div class="modal" id="myModal">--}}
{{--                    <div class="modal-dialog">--}}
{{--                        <div class="modal-content">--}}

{{--                            <!-- Modal Header -->--}}
{{--                            <div class="modal-header">--}}
{{--                                <h4 class="modal-title">Modal Heading</h4>--}}
{{--                                --}}{{--                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>--}}
{{--                            </div>--}}

{{--                            <!-- Modal body -->--}}
{{--                            <div class="modal-body">--}}
{{--                                Registered--}}
{{--                            </div>--}}

{{--                            <!-- Modal footer -->--}}
{{--                            <div class="modal-footer">--}}
{{--                                <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Close</button>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            @endif
        </form>
    </main>
@endsection
