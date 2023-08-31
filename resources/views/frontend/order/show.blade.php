    @extends('layouts.app')
    @section('title','My Oredrs Details')
    @section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class=""></i>my order details
                            <a href="{{ route('Order') }}" class="btn btn-warning btn-sm float-end">return back</a>
                        </h4>
                        <hr>
                        <div class="row">
                            <div calss="col-md-6">
                                <h5>oredr Details</h5>
                                <hr>
                                <h6>order id: {{ $order->id }}</h6>
                                <h6>tracking id/no: {{ $order->traking_no }}</h6>
                                <h6>order created date: {{ $order->created_at }}</h6>
                                <h6>payment mode: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    order status message: <span class="rext-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>user Details</h5>
                                <hr>
                                <h6>fullname: {{ $order->fullname }}</h6>
                                <h6>email: {{ $order->email }}</h6>
                                <h6>phone: {{ $order->phone }}</h6>
                                <h6>pincode: {{ $order->pincode }}</h6>
                                <h6>address: {{ $order->address }}</h6>
                            </div>
                            <br/>
                                <h5>order items</h5>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                            <tr>
                                                <td>item ID</td>
                                                <td>product</td>
                                                <td>price</td>
                                                <td>quantity</td>
                                                <td>total</td>
                                            </tr>
                                            @php
                                                $totalPrice = 0;
                                            @endphp
                                            @forelse ($order->orderItem as $item)
                                                <tr>
                                                    <td width="10%">{{ $item->id }}</td>
                                                    <td>{{ $item->product->name }}</td>
                                                    <td width="10%">{{ $item->price }}</td>
                                                    <td width="10%">{{ $item->quantity }}</td>
                                                    <td width="10%">{{ $item->quantity * $item->price }}</td>
                                                </tr>
                                                @php
                                                $totalPrice += $item->quantity * $item->price;
                                                @endphp
                                            @empty
                                                <tr>
                                                    <td clspan="7">
                                                        you dont have any order
                                                    </td>
                                                </tr>
                                                <h4>no data to show</h4>
                                            @endforelse
                                            <tr>
                                                <td colspan="4" class="fw-bold">total amount:</td>
                                                <td colspan="1">${{ $totalPrice }}</td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
