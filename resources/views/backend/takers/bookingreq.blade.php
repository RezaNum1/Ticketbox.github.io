@extends('backend.base_takers')
@section('content')
    <div class="super_container_inner">
        <div class="products">
            <div class="row justify-content-center">
                @if(Session::has('alert-success'))
                    <div class="alert alert-success mt-3">
                        {{ Session::get('alert-success') }}
                    </div>
                @endif
            </div>

            <div class="container">
                <div class="row products_row products_container grid">

                    <!-- Product -->
                    @forelse($books as $book)
                        @if($book->status == '3' || $book->status == '4')
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
                                                    <div class="col-form-label">Date:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $book->eventOwners->date}} | </small>
                                                    <small style="color: #485460; font-size: 15px;">{{ $book->eventOwners->time}}</small>
                                                </div>
                                                <div class="col-6">
                                                    <div class="col-form-label">Date:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $book->eventOwners->name}}</small>
                                                </div>
                                                <div class="col-6">
                                                    <div class="col-form-label">Quantity:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $book->quantity }}</small>
                                                </div>
                                                <div class="col-6 mt-2">
                                                    <div class="col-form-label">Request Created At:</div>
                                                    <small style="color: #485460; font-size: 15px;">{{ $book->created_at}}</small>
                                                </div>
                                                <div class="col-6 mt-2">
                                                    @if($book->status == "3")
                                                        <label class="btn btn-outline-danger">Waiting For Payment</label>
                                                        @elseif($book->status == "4")
                                                            <div class="col-form-label" >Ticket Code:</div>
                                                            <label class="btn btn-warning submit-btn btn-block" style="color: white;position: relative; font-size: 25px;font-weight: bolder;width: 700px;" >{{$book->ticket_code}}</label>
                                                    @endif
                                                </div>
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
                                            <h5>Tidak ada merk ditemukan.</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection