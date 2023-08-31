<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        // $todayDate = Carbon::now();
        // $orders = Order::whereDate('created_at',$todayDate)->paginate(20);

        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function($q) use($request) {
                            return $q->whereDate('created_at',$request->date);
                        }, function($q) use($todayDate) {
                            $q->whereDate('created_at',$todayDate);
                        })
                        ->when($request->status != null, function($q) use($request) {
                            return $q->where('status_message',$request->status);
                        })

                        ->paginate(20);

        return view('admin.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $orderId)
    {
        $order = Order::where('id',$orderId)->first();
        if($order)
        {
            return view('admin.orders.show',compact('order'));
        }
        else
        {
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
