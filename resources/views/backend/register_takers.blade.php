@extends('backend.base')
@section('content')
    <div class="row justify-content-center">
        <div class="bil" style="position: relative; top:150px; width: 600px;height: 550px;margin-bottom: 400px;">
            <div class="text-center" style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;">Register
                <label>Take-</label><label style="color: black;">In</label>
            </div>
            <form action="{{route('auth.register_takersPro')}}" autocomplete="off" class="checkout_form" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <hr>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label class="label" for="username">Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Name" name="name" id="name"  value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="username">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username"  value="{{old('username')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="*********" name="password" id="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="confirmation">Confirmation Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="*********" name="confirmation" id="confirmation" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="email">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{old('email')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="phone">Phone Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Phone Number" name="phone" id="phone" value="{{old('phone')}}">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success submit-btn btn-block" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection