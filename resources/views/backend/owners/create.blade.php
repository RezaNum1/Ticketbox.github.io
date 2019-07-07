@extends('backend.base_owner')
@section('content')
    <div class="row justify-content-center">
        <div class="bil" style="position: relative; top:150px; width: 600px;height: auto;margin-bottom: 400px;">
            <div class="text-center" style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;">Create
                <label style="color: black;">Event</label>&nbsp<label style="color: tomato;">Page</label>
            </div>
            <form enctype="multipart/form-data" action="{{route('owners.store')}}" autocomplete="off" class="checkout_form" method="post">
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
                    <label class="label" for="username">Event Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Name" name="name" id="name"  value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="file">Image</label>
                        <input type="file" class="form-control" name="file" id="file">
                </div>
                <div class="form-group">
                    <label class="label" for="event_categories">Event Categories</label>
                    <div class="input-group">
                       <select name="event_categories" class="form-control">
                           @foreach($datas as $data)
                           <option value="{{$data->name}}">{{$data->name}}</option>
                               @endforeach
                       </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="description">Description</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Input Description..." name="description" id="description">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="price">Price</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Input Price..." name="price" id="price" value="{{old('price')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="stock">Ticket Stock</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Input Stock..." name="stock" id="stock" value="{{old('stock')}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="address">Address</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Input Address..." name="address" id="address">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="city">City</label>
                    <div class="input-group">
                        <select name="city" class="form-control">
                            @foreach($citys as $city)
                                <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div class="form-group">
                        <label class="label" for="address">Date</label>
                        <div class="input-group">
                            <input type="date" class="form-control"  name="date" id="date" required>
                            <input type="time" class="form-control" name="time" id="time" required>
                        </div>
                    </div>
                <div class="form-group">
                    <button class="btn btn-success submit-btn btn-block" type="submit">Insert</button>
                    <a class="btn btn-danger submit-btn btn-block" href="{{route('owners.index')}}">Cancle</a>
                </div>
            </form>
        </div>
    </div>
    @endsection