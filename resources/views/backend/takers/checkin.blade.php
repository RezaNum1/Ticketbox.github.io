@extends('backend.base_takers')
@section('content')
    <div class="row justify-content-center" style="width: 100%">
    <div class="bil" style="position: relative; top:150px; width: 600px;height: auto;margin-bottom: 400px;">
        @foreach($events as $event)
            <div class="text-center" style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;">
                <label style="color: black;">Buy</label>&nbsp<label style="color: tomato;">Ticket</label>
            </div>
            <form enctype="multipart/form-data" autocomplete="off" class="checkout_form" method="post" >
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
                        <hr>
                    </div>

                    <!-- Image Form -->
                    <br>
                    <img src="{{ url('uploads/file/'.$event->file) }}" id="myImg" style="position: relative;width: 100%; height: 450px; margin-bottom: 5px;" onclick="ShowDialog1()">

                    <!-- The Modal -->
                    <div id="myModal" class="modal" style="width: 100%;">
                        <span class="close" style="color: white; position: relative;right: 50px;" >&times;</span>
                        <img class="modal-content" id="img01" style="max-width: 100%; height: 650px;">
                        <div id="caption"></div>
                    </div>

                </div>

                <div class="form-group">
                    <label class="label" for="descripton" style="font-size: 20px;">Description:</label>
                    <div class="input-group">
                        <textarea style="background-color: white; font-size: 20px;" class="form-control" readonly>{{$event->description}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="price" style="font-size: 20px;">Date & Time:</label>
                    <div class="input-group">
                        <a style="font-size: 30px;color: #fa8231;font-weight: bolder">{{$event->date}} | {{$event->time}}</a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="price" style="font-size: 20px;">Price:</label>
                    <div class="input-group">
                        <a style="font-size: 30px;color: #fa8231;font-weight: bolder">Rp. {{$event->price}}</a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="label" for="stock" style="font-size: 20px;">Ticket Stock:</label>
                    <div class="input-group">
                        <small><span class="badge badge-success" style="font-size: 25px;">{{$event->stock}}</span></small>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <button type="button" class="btn btn-success submit-btn btn-block" data-toggle="modal" data-target="#Modal" >Check-In</button>
                    <a class="btn btn-danger submit-btn btn-block" href="{{route('Base.index_home')}}">Cancle</a>
                </div>
            </form>

        <!-- Modal Form For Booking -->

                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <label class="modal-title" id="exampleModalLabel" style="color: tomato;font-family: 'Ultra', serif;font-size: 30px; margin: 0 auto;">| Book<label style="color: black;font-family: 'Ultra', serif;font-size: 30px;">Ing</label> |</label>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @foreach($users as $user)
                                <form method="post" action="{{route('takers.ticketPro')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label" style="color: tomato;font-family: 'Ultra', serif;font-size: 20px;">{{$event->name}}</label><br>
                                        <label for="recipient-name" class="col-form-label"  style="color: #2f3542;font-size: 15px; position:relative;bottom: 20px;">{{$event->address, $event->city}}, Indonesia</label>
                                        <img src="{{ url('uploads/file/'.$event->file) }}" id="myImg" style="position: relative;width: 100%; height: 200px; bottom: 15px;">
                                        <div class="checks">
                                            <input type="checkbox" name="vehicle" style="position: relative; top: 25px;" required><label style="text-align: center">Terms and conditions apply, please give a check if you<label style="text-align: center"> have read the conditions</label></label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="customer_id" value="{{$user->id}}" hidden>
                                        <input type="text" class="form-control"  name="owner_id" value="{{$event->owner_id}}" hidden>
                                        <input type="text" class="form-control" name="event_id" value="{{$event->id}}" hidden>
                                        <input type="text" class="form-control" name="price" value="{{$event->price}}" hidden>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label" style="color: black">Quantity</label>
                                        <select name="quantity" class="form-control" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success submit-btn btn-block">Booking</button>
                                    </div>

                                </form>
                                    @endforeach
                            </div>

                        </div>
                    </div>
                </div>
        @endforeach
    </div>
    </div>

    <!-- Script For Image-->
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
    <script type="text/javascript">

    </script>
@endsection
