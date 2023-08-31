@extends('layouts.admin')
@section('title','client Oredrs')
@section('content')

<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="mb-4"> My Oredr </h4>
                    <hr>

                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <label>filter by date</label>
                                <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>filter by status</label>
                                <select name="status" class="form-select">
                                    <option value="">select all status</option>
                                    <option value="in progress {{ Request::get('status') == 'in progress' ? 'selected':'' }}">in progress</option>
                                    <option value="compeleted {{ Request::get('status') == 'compeleted' ? 'selected':''}}">compeleted</option>
                                    <option value="pending {{ Request::get('status') == 'pending' ? 'selected':''}}">pending</option>
                                    <option value="concelled {{ Request::get('status') == 'concelled' ? 'selected':''}}">concelled</option>
                                    <option value="out for delvirey {{ Request::get('status') == 'out for delvirey' ? 'selected':''}}">out for delvirey</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <br/>
                                <button type="submit" class="btn btn-primary">filter</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                                <tr>
                                    <td>Order ID</td>
                                    <td>Traking No</td>
                                    <td>Username</td>
                                    <td>Payment mode</td>
                                    <td>Ordered Date</td>
                                    <td>Status Message</td>
                                    <td>Action</td>
                                </tr>
                                @forelse ($orders as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->traking_no }}</td>
                                        <td>{{ $item->fullname }}</td>
                                        <td>{{ $item->payment_mode }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->status_message }}</td>
                                        <td><a href="{{ url('admin/order/'.$item->id) }}">view</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td clspan="7">
                                            you dont have any order
                                        </td>
                                    </tr>
                                    <h4>no data to show</h4>
                                @endforelse
                        </table>
                    <div>{{ $orders->links('vendor.pagination.bootstrap-5') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
