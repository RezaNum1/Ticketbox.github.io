@extends('backend.base_owner')
@section('content')
    <div class="super_container_inner">
        <div class="products">
            <div class="container">

                    @if(Session::has('alert-success'))
                        <div class="alert alert-success mt-3">
                            {{ Session::get('alert-success') }}
                        </div>
                    @endif
                <!-- Product -->
                    @forelse($events as $event)
                        @if($event->status == '4' || $event->status == '3')
                                <div class="row products_row products_container grid">
                        <div class="col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2 mb-3">
                                            <img src="{{ url('uploads/file/'.$event->eventOwners->file) }}" class="img-fluid" style="width: 200px; height: 150px;">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="col-form-label">Name</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $event->eventOwners->name}}</small>
                                                </div>
                                                <div class="col-6">
                                                    <div class="col-form-label">Total Price:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $event->total_price }}</small>
                                                </div>
                                                <div class="col-6">
                                                    <div class="col-form-label">Quantity:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $event->quantity }}</small>
                                                </div>
                                                <div class="col-6 mt-2">
                                                    <div class="col-form-label">Request Created At:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $event->created_at}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @empty
                                <div class="col-sm-12 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5>Tidak ada Booking ditemukan.</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                </div>
            </div>
        </div>
    </div>
    @endsection