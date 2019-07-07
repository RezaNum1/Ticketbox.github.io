@extends('backend.base_takers')
@section('content')

    <div class="super_container_inner">
        <div class="products">
            <div class="container">
                <div class="row products_row products_container grid">

                    <div class="caption">
                        <form action="{{route('takers.searchSeminar')}}" method="GET" class="menu_search_form" style="margin:0 auto;position: relative;left: 150px;margin-bottom: 100px;">
                            <label style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;" class="row justify-content-center">Find Your Concert</label>
                            <input type="text" name="builds"  class="search_input" placeholder="Find Your Event By Name or Location" required="required" value="{{ old('builds') }}" style="width: 20cm;margin: 0 auto">
                            <button class="button" style="width: 40px; height: 40px;"><img src="{{asset('assets/images/search.png')}}" alt=""></button>
                        </form>
                    </div>
                    <!-- Product -->
                    @foreach($events as $event)
                        @if($event->status == "1" || $event->status == "0")
                            <div class="col-xl-4 col-md-6 grid-item sale">
                                <div class="product">
                                    <div class="product_image"><img src="{{ url('uploads/file/'.$event->file) }}" alt="" style="height: 300px;">
                                        <div class="product_content">
                                            <div class="product_info d-flex flex-row align-items-start justify-content-start" style="height: auto">
                                                <div style="position: relative;">
                                                    <div class="product" ><a style="font-size: 30px;color: #fa8231;font-weight: bolder">{{$event->name}}</a><br>
                                                        <img src="{{asset('assets/images/location-point.png')}}" style="margin-right: 2px;"><a style="color: #7f8c8d;">{{$event->address}}, {{$event->city}}</a></div>
                                                    <a style="font-size: 20px;font-weight: bolder">
                                                        <div><a style="color: #7f8c8d;">Event: {{$event->event_categories}}</a></div>
                                                        <img src="{{asset('assets/images/date.png')}}" style="width: 15px; height: 15px;margin-bottom: 5px;margin-right: 5px;">{{ $event->date}}
                                                        <div> <img src="{{asset('assets/images/clock.png')}}" style="width: 15px; height: 15px;margin-bottom: 5px;margin-right: 5px;">{{$event->time}}</a></div></div>
                                        </div>
                                    </div>


                                    <div class="product_buttons">
                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                            @if($event->status == "0")
                                                <button class="btn btn-danger submit-btn btn-block" style="height: 60px;font-weight: bolder; font-size: 30px;" disabled="disabled">Sold Out</button>
                                            @else
                                                <a href="{{route('takers.checkin', $event->id)}}" class="btn btn-warning submit-btn btn-block" style="height: 60px;font-weight: bolder; font-size: 30px;">Rp.{{$event->price}}/Ticket </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection