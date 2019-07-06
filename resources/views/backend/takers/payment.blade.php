@extends('backend.base_takers')
@section('content')
    <div class="super_container_inner">
        <div class="products">
            <div class="container" style="margin-top: 50px;">
                <div class="text-center" style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;">Payment
                </div>
                <div class="row products_row products_container grid">
                <!-- Product -->
                    @foreach($datas as $data)
                        <div class="row justify-content-center">
                                        <div style="position:relative; border: 1px solid; width:400px; left:150px;">
                                                <img src="{{ url('uploads/file/'.$data->eventOwners->file) }}" class="img-fluid" style="position:relative;width: auto; height: 200px;padding-left: 10px;padding-right: 10px;padding-top: 10px; ">
                                            <div class="product" style="padding-left: 10px;">
                                                <div class="col-form-label">Event Name:</div>
                                                <small style="color: orange; font-size: 20px;font-weight: bolder">{{ $data->eventOwners->name}}</small>
                                                <div class="col-form-label">Quantity:</div>
                                                <small style="color: orange; font-size: 20px;font-weight: bolder">{{ $data->quantity }} Ticket</small>
                                                <div class="col-form-label">Total Price:</div>
                                                <small style="color: orange; font-size: 20px;font-weight: bolder">Rp. {{$data->total_price }}</small>
                                            </div>
                                        </div>


                                <div class="row justify-content-center">
                                    <div class="bil" style="position: relative;left:200px; width: 400px;height: auto;border: 1px solid; padding: 10px 10px 10px 10px">
                                        <form action="{{route('takers.payment')}}" autocomplete="off" class="checkout_form" method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <input type="text" name="owner_id" hidden value="{{$data->owner_id}}">
                                                <input type="text" name="customer_id" hidden value="{{$data->customer_id}}">
                                                <input type="text" name="event_name" hidden value="{{$data->eventOwners->name}}">
                                                <input type="text" name="event_id" hidden value="{{$data->event_id}}">
                                                <input type="text" name="total_price" hidden value="{{$data->total_price }}">
                                                <input type="text" name="booking_id" hidden value="{{$data->id}}">
                                                <input type="text" name="quantity" hidden value="{{$data->quantity}}">

                                                @if($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label style="color: black">Card Number</label>
                                                <input type="text" name="card_number" class="form-control" style="color: black">
                                            </div>
                                            <div class="form-group">
                                                <label style="color: black">Validation Date</label>
                                                <br>
                                                <input type="text" name="month" style="color: black;width: 40px;"  placeholder="MM">
                                                <input type="text" name="year" style="color: black; width: 80px;" placeholder="YYYY">
                                            </div>
                                            <div class="form-group">
                                                <label style="color: black">Scurity Code</label>
                                                <input type="text" name="security_code" class="form-control" style="color: black; width: 80px;">
                                            </div>
                                            <div class="form-group">
                                                <label style="color: black">Name On Card</label>
                                                <input type="text" name="name_on_card" class="form-control" style="color: black">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success submit-btn btn-block" type="submit">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                            @endforeach
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection