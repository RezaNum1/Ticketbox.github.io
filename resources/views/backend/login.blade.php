@extends('backend.base')
@section('content')
    <div class="row justify-content-center">
        <div class="bil" style="position: relative; top:150px; height: 550px;margin-bottom: 200px;">
            <div class="text-center" style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;">LOGIN</div>
            <form action="{{route('auth.loginProcess')}}" id="checkout_form" class="checkout_form" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <hr>
                    @if(Session::has('alert'))
                        <div class="alert alert-danger">
                            <div> {{Session::get('alert')}}</div>
                        </div>
                    @endif
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success">
                            <div>{{Session::get('alert-success')}}</div>
                        </div>
                    @endif
                    <label class="label" for="username">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="*********" name="password" id="password">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success submit-btn btn-block" type="submit">Login</button>
                </div>
                <hr>
                <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Have'nt an Account?</span>
                    <hr/>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{route('auth.register_takers')}}" class="text-black text-small btn btn-lg btn-outline-primary">Register As Takers</a>
                        </div>
                        <div class="col-md-12 mt-4">
                            <a href="{{route('auth.register_owner')}}" class="text-black text-small btn btn-lg btn-outline-dark">Register As Owner</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection