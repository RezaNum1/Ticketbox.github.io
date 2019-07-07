@extends('backend.base_owner')
@section('content')
    <div class="owner" style="margin-top: 120px;">
        {{csrf_field()}}
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 col-sm-12 mb-3">
                    <div class="text-center" style="font-size: 40px;color: tomato; font-family: 'Ultra', serif;">
                        <label style="color: black;">Home</label>&nbsp<label style="color: tomato;">Page</label>
                    </div>
                    @if(Session::has('alert-success'))
                        <div class="alert alert-success mt-3">
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif
                </div>

                @forelse($events as $event)
                    <div class="col-sm-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2 mb-3">
                                        <img src="{{ url('uploads/file/'.$event->file) }}" class="img-fluid" style="width: 200px; height: 150px;">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="col-form-label">Nama:</div>
                                                <small style="color: #485460; font-size: 15px;">{{ $event->name }}</small>
                                            </div>
                                            <div class="col-6">
                                                <div class="col-form-label">Price:</div>
                                                <small style="color: #485460;font-size: 15px;">Rp. {{ $event->price }}</small>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="col-form-label">Stock</div>
                                                <small style="color: #485460;font-size: 15px;">{{ $event->stock }}</small>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="col-form-label">Status:</div>
                                                @if($event->status == "1")
                                                    <small><span class="badge badge-success" style="font-size: 15px;">Available</span></small>
                                                @elseif($event->status == "0")
                                                    <small><span class="badge badge-danger" style="font-size: 15px;">Sold Out</span></small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 mt-3">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Setting
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item" href="{{route('owners.detail', $event->id)}}"><img src="{{asset('assets/images/eye.png')}}"><i class="fa"></i> Detail</a>
                                                <a class="dropdown-item" href="{{route('owners.edit', $event->id)}}"><img src="{{asset('assets/images/update.png')}}"><i class="fa"></i> Update</a>
                                                <a class="dropdown-item" href="{{route('owners.status', $event->id)}}" style="position: relative; right: 4px;"><i class="fa"></i>
                                                    @if($event->status == "1")
                                                        <img src="{{asset('assets/images/flag.png')}}"> Set Sold Out
                                                    @elseif($event->status == "0")
                                                        <img src="{{asset('assets/images/rooms-available.png')}}" style="margin-bottom: 5px; margin-right: 5px;">Set Available
                                                    @endif
                                                </a>
                                                <a class="dropdown-item" href="{{route('owners.delete', $event->id)}}"><img src="{{asset('assets/images/rubbish-bin.png')}}"><i class="fa"></i> Delete</a>
                                                <div class="dropdown-divider"></div>
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
                @endforelse

            </div>
        </div>
    </div>

    @endsection