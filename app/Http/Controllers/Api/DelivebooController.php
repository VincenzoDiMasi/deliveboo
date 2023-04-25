<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmed;
use App\Mail\RestaurantMail;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DelivebooController extends Controller
{
    public function sendRestaurantTypes()
    {
        $types = Type::orderBy('name')->get();

        foreach ($types as $type) {
            if ($type->image) $type->image = url('storage/' . $type->image);
        }

        return response()->json(compact('types'));
    }

    public function sendFilteredRestaurants(Request $request)
    {
        $types_names = gettype($request->query('types')) == 'array' ? $request->query('types') : [$request->query('types')];
        $types_id = Type::select('id')->whereIn('name', $types_names)->pluck('id')->toArray();

        $restaurants_collection =  DB::table('types')
            ->join('restaurant_type', 'types.id', '=', 'restaurant_type.type_id')
            ->join('restaurants', 'restaurants.id', '=', 'restaurant_type.restaurant_id')
            ->select('restaurants.*')
            ->whereIn('restaurant_type.type_id', $types_id)
            ->groupBy('restaurants.name')
            ->get();

        $restaurants_models = [];

        foreach ($restaurants_collection as $restaurant) {
            $restaurants_models[] = Restaurant::find($restaurant->id);
        }

        $restaurants = [];

        foreach ($restaurants_models as $restaurant) {

            $restaurant_types_id = $restaurant->types->pluck('id')->toArray();

            if ($this->my_in_array($types_id, $restaurant_types_id)) {

                if ($restaurant['image']) {
                    $restaurant['image'] = url('storage/' . $restaurant['image']);
                } else {
                    foreach ($restaurant->types as $type) {
                        $type->image = url('storage/' . $type->image);
                    }
                }
                $restaurants[] = $restaurant;
            }
        }

        return response()->json(compact('restaurants'));
    }

    public function sendRestaurantDishes($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();

        $dishes = Dish::where('restaurant_id', $restaurant->id)
            ->where('availability', 1)
            ->get(['id', 'name', 'description', 'price', 'availability', 'image', 'restaurant_id']);

        foreach ($dishes as $dish) {
            if ($dish->image) $dish->image = url('storage/' . $dish->image);
        }

        return response()->json(compact('dishes', 'restaurant'));
    }

    public function createNewOrder(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'firstname' => ['bail', 'required', 'string', 'max:100'],
            'lastname' => ['bail', 'required', 'string', 'max:100'],
            'address' => ['bail', 'required', 'string', 'max:255'],
            'phone' => ['bail', 'required', 'string', 'max:20'],
            'email' => ['bail', 'required', 'email', 'max:255'],
            'delivery_time' => ['bail', 'required', 'date_format:H:i'],
            'total_price' => ['bail', 'required', 'decimal:2'],
        ], [
            'firstname.required' => 'Il nome è obbligatorio.',
            'firstname.string' => 'Il nome inserito non è valido.',
            'firstname.max' => 'Il nome può avere massimo :max caratteri.',
            'lastname.required' => 'Il cognome è obbligatorio.',
            'lastname.string' => 'Il cognome inserito non è valido.',
            'lastname.max' => 'Il cognome può avere massimo :max caratteri.',
            'address.required' => 'L\'indirizzo è obbligatorio.',
            'address.string' => 'L\'indirizzo inserito non è valido.',
            'address.max' => 'L\'indirizzo può avere massimo :max caratteri.',
            'phone.required' => 'Il numero di telefono è obbligatorio.',
            'phone.string' => 'Il numero di telefono inserito non è valido.',
            'phone.max' => 'Il numero di telefono può avere massimo :max caratteri.',
            'email.required' => 'L\'email è obbligatoria.',
            'email.email' => 'L\'email inserita non è valida.',
            'email.max' => 'L\'email può avere massimo :max caratteri.',
            'delivery_time.required' => 'L\'orario di consegna è obbligatorio.',
            'delivery_time.date' => 'L\'orario di consegna inserito non è valido.',
            'total_price.required' => 'Il prezzo è obbligatorio.',
            'total_price.decimal' => 'Il prezzo inserito non è valido.',
        ]);

        // if ($validation->fails()) return response()->json(['errors' => $validation->errors()], 403);

        $data = $request->all();
        $order = new Order();
        $order->first_name = $data['firstname'];
        $order->last_name = $data['lastname'];
        $order->email = $data['email'];
        $order->address = $data['address'];
        $order->phone = $data['phone'];
        $order->payment_status = $data['payment_status'];
        $order->total_price = $data['total_price'];
        $order->delivery_time = $data['delivery_time'];
        $order->save();

        $dishes = $data['dishes'];
        foreach ($dishes as $dish) {
            $order->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
        };



        $restaurant = Restaurant::where('id', $dishes[0]['restaurant_id'])->first();
        Mail::to($restaurant->user->email)->send(new RestaurantMail($restaurant, $order));

        Mail::to($order->email)->send(new OrderConfirmed($order, $dishes));

        return response()->json('success', 200);
    }

    private function my_in_array($search, $source)
    {
        return (count(array_intersect($search, $source)) == count($search));
    }
}
