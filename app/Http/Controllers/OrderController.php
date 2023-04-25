<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $restaurant = Restaurant::where('user_id', $user_id)->first();
        $orders = DB::table('restaurants')
            ->join('dishes', 'restaurants.id', '=', 'dishes.restaurant_id')
            ->join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
            ->join('orders', 'orders.id', '=', 'dish_order.order_id')
            ->select('orders.*')
            ->where('dishes.restaurant_id', $restaurant->id)
            ->groupBy('orders.id')
            ->orderBy('created_at', 'DESC')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        $total_order = [];
        foreach ($orders as $order) {
            $order_id = Order::find($order->id);
            $order_sum = 0;
            foreach ($order_id->dishes as $dish) {
                $order_sum += $dish->pivot->quantity;
            }
            $total_order[] = $order_sum;
        }
        return view('auth.orders.index', compact('orders', 'total_order'));
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
    public function show(Order $order)
    {
        $user = Auth::user();
        $restaurant_id = $user->restaurant->id;
        if ($order->dishes[0]->restaurant_id !== $restaurant_id) return to_route('admin.orders.index')->with('type', 'danger')->with('msg', 'Operazione non autorizzata.');
        return view('auth.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
