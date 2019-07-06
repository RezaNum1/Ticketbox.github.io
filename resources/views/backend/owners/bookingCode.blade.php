@extends('backend.base_owner')
@section('content')
    <div class="row justify-content-center" style="background-color: #d1d8e0">
        <div class="bil" style="position: relative; top:300px; width: 600px;height: 550px;margin-bottom: 400px;">
            <div class="row justify-content-center">
                @if(Session::has('alert-success'))
                    <div class="alert alert-success mt-3">
                        {{ Session::get('alert-success') }}
                    </div>
                @endif
                <form action="{{route('owners.findCode')}}" method="GET" class="menu_search_form" style="margin-top: 20px;">
                    <label style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;" class="row justify-content-center">Find Booking Code</label>
                    <div class="form-group-group">
                        <input type="text" name="findCode"  class="search_input" placeholder="Enter Booking Code...." required="required" value="{{ old('findCode') }}" style="width: 20cm;">
                    </div>
                    <div class="form-group">
                        <button class="button" style="width: 40px; height: 40px;"><img src="{{asset('assets/images/search.png')}}" alt=""></button>
                    </div>
                </form>

                @if(isset($books))

                    <div class="row products_row products_container grid">

                        <!-- Product -->
                        @forelse($books as $book)
                            <form action="#" method="">
                                <div class="col-sm-12 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-2 mb-3">
                                                    <img src="{{ url('uploads/file/'.$book->eventOwners->file) }}" class="img-fluid" style="width: 200px; height: 150px;">
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="col-form-label">Event Name:</div>
                                                            <small style="color: #485460; font-size: 15px;">{{ $book->eventOwners->name}}</small>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="col-form-label">Quantity:</div>
                                                            <small style="color: #485460; font-size: 15px;">{{ $book->quantity }}</small>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="col-form-label">Name:</div>
                                                            <small style="color: #485460; font-size: 15px;">{{ $book->users->name }}</small>
                                                        </div>
                                                        <div class="col-6 mt-2">
                                                            <div class="col-form-label">Request Created At:</div>
                                                            <small style="color: #485460; font-size: 15px;">{{ $book->created_at}}</small>
                                                        </div>
                                                        <div class="row justify-content-center">
                                                            <a class="btn btn-success submit-btn btn-block" style="color: white;position: relative; left:30px; top: 10px;" href="{{route('owners.statChange', $book->id)}}">Get-In</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <div class="col-sm-12 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h5>Tidak ada merk ditemukan.</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        @endforelse
                        @endif
                    </div>
            </div>
        </div>
    </div>
    </div>
@endsection