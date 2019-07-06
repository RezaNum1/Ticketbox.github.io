@extends('backend.base')
@section('content')
    <div class="row justify-content-center" style="width: 100%">
        <div class="bil" style="position: relative; top:150px; width: 600px;height: auto;margin-bottom: 400px;">
            @foreach($builds as $build)
                <div class="text-center" style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;">Check
                    <label style="color: black;">Room</label>&nbsp<label style="color: tomato;">Page</label>
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
                        <label name="name" style="font-size: 30px;">{{$build->name}}</label>
                        <br>
                        <div class="imgs" style="position: relative; bottom: 12px;">
                            <img src="{{asset('assets/images/location-point.png')}}" style="width: 20px; height: 20px;"><label name="city" >{{$build->address}}, {{$build->city}}, Indonesia</label>
                        <hr>
                        </div>

                    <!-- Image Form -->
                        <br>
                        <img src="{{ url('uploads/file/'.$build->file) }}" id="myImg" style="position: relative;width: 100%; height: 450px; margin-bottom: 5px;" onclick="ShowDialog1()">

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
                            <textarea style="background-color: white; font-size: 20px;" class="form-control" readonly>{{$build->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="price" style="font-size: 20px;">Price:</label>
                        <div class="input-group">
                            <a style="font-size: 30px;color: #fa8231;font-weight: bolder">Rp. {{$build->price}}</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-form-lg">
                            <div class="col-form-label" style="color: black; font-weight: bold">Status:</div>
                            @if($build->status == "1")
                                <small><span class="badge badge-success" style="font-size: 25px;">Available</span></small>
                            @elseif($build->status == "0")
                                <small><span class="badge badge-danger" style="font-size: 25px;">Full</span></small>
                            @else
                                <small><span class="badge badge-warning" style="font-size: 25px;">Maintenance</span></small>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <a class="btn btn-success submit-btn btn-block" href="{{route('auth.login')}}">Login</a>
                        <a class="btn btn-danger submit-btn btn-block" href="{{route('Base.index_home')}}">Cancle</a>
                    </div>
                </form>
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

@endsection