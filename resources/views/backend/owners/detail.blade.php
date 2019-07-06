@extends('backend.base_owner')
@section('content')
    <div class="row justify-content-center">
        <div class="bil" style="position: relative; top:150px; width: 600px;height: auto;margin-bottom: 400px;">
            <div class="text-center" style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;">Detail
                <label style="color: black;">Room</label>&nbsp<label style="color: tomato;">Page</label>
            </div>
            @foreach($events as $event)
                <form enctype="multipart/form-data" autocomplete="off" class="checkout_form" method="post">
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

                            <label name="name" style="font-size: 30px;">{{$event->name}}</label>
                            <br>
                        <div class="imgs" style="position: relative; bottom: 12px;">
                            <img src="{{asset('assets/images/location-point.png')}}" style="width: 20px; height: 20px;"><label name="city" >{{$event->address}}, {{$event->city}}, Indonesia</label>
                        </div>

                    <div class="form-group">
                        <br>
                        <img src="{{ url('uploads/file/'.$event->file) }}" style="width: 100%; height: 300px; margin-bottom: 5px;">
                    </div>
                    <div class="form-group">
                        <label class="label" for="descripton" style="font-size: 20px;">Description:</label>
                        <div class="input-group">
                            <textarea style="background-color: white; font-size: 20px;" class="form-control" readonly>{{$event->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="price" style="font-size: 20px;">Price:</label>
                        <div class="input-group">
                            <a style="font-size: 30px;color: #fa8231;font-weight: bolder">Rp. {{$event->price}}</a>
                        </div>
                    </div>
                        <div class="form-group">
                            <label class="label" for="price" style="font-size: 20px;">Stock:</label>
                            <div class="input-group">
                                <a style="font-size: 30px;color: #fa8231;font-weight: bolder">{{$event->stock}} Ticket</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label" for="price" style="font-size: 20px;">Date:</label>
                            <div class="input-group">
                                <a style="font-size: 30px;color: #fa8231;font-weight: bolder">{{$event->date}}</a>
                            </div>
                            <label class="label" for="price" style="font-size: 20px;">Time:</label>
                            <div class="input-group">
                                <a style="font-size: 30px;color: #fa8231;font-weight: bolder">{{$event->time}}</a>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-form-lg">
                            <div class="col-form-label" style="color: black; font-weight: bold; font-size: 20px;">Status:</div>
                            @if($event->status == "1")
                                <small><span class="badge badge-success" style="font-size: 25px;">Available</span></small>
                            @elseif($event->status == "0")
                                <small><span class="badge badge-danger" style="font-size: 25px;">Full</span></small>
                            @else
                                <small><span class="badge badge-warning" style="font-size: 25px;">Maintenance</span></small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <a class="btn btn-danger submit-btn btn-block" href="{{route('owners.index')}}">Cancle</a>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection