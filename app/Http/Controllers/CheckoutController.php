<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Checkout');
    }

    public function process(Request $request)
    {
        try {
            $validated = $request->validate([
                'delivery_details' => 'required|array',
                'delivery_details.name' => 'required|string|max:255',
                'delivery_details.email' => 'required|email|max:255',
                'delivery_details.phone' => 'required',
                'delivery_details.address1' => 'required|string|max:255',
                'delivery_details.city' => 'required|string|max:255',
                'delivery_details.zipcode' => 'required|string|max:20',
                'payment_method' => 'required|in:pay_on_delivery',
                'total_amount' => 'required|numeric|min:0'
            ], [
                'delivery_details.phone.regex' => 'Phone number must start with 77, 78, or 79 and be 9 digits long',
                'delivery_details.*.required' => 'The :attribute field is required',
                'delivery_details.email.email' => 'Please enter a valid email address'
            ]);

            DB::beginTransaction();

            // Create or update user address
            $userAddress = UserAddress::updateOrCreate(
                ['user_id' => auth()->id(), 'isMain' => true],
                [
                    'address1' => $request->delivery_details['address1'],
                    'address2' => $request->delivery_details['address2'] ?? null,
                    'city' => $request->delivery_details['city'],
                    'zipcode' => $request->delivery_details['zipcode'],
                    'phone' => $request->delivery_details['phone'],
                    'country_code' => '962',
                ]
            );

            // Check if there are items in cart
            [$products, $cartItems] = Cart::getProductsAndCartItems();
            if (empty($cartItems)) {
                throw new \Exception('Your cart is empty');
            }

            // Create order
            $order = Order::create([
                'user_address_id' => $userAddress->id,
                'total_price' => $request->total_amount,
                'status' => 'pending',
                'created_by' => auth()->id(),
                'user_id' => auth()->id(),
                'session_id' => session()->getId(),
            ]);

            // Create order items
            foreach ($products as $product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $cartItems[$product->id]['quantity'],
                    'unit_price' => $product->price,
                    'product_color_id' => $cartItems[$product->id]['product_color_id'] ?? 1,
                ]);
            }

            // Create payment record
            Payment::create([
                'order_id' => $order->id,
                'amount' => $request->total_amount,
                'status' => 'pending',
                'type' => 'pay_on_delivery',
                'created_by' => auth()->id(),
            ]);

            // Clear the cart
            if (auth()->check()) {
                DB::table('cart_items')->where('user_id', auth()->id())->delete();
            } else {
                Cart::setCookieCartItems([]);
            }

            DB::commit();

            return redirect()->route('user.orders.index')->with('success', 'Order placed successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage() ?: 'Failed to process order. Please try again.');
        }
    }
}
