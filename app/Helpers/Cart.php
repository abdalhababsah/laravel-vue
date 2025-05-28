<?php

namespace App\Helpers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class Cart
{
    // Get the total count of items in the user's cart
    public static function getCount()
    {
        if ($user = Auth::user()) {
            // Sum up the quantities of all items in the cart for the logged-in user
            return CartItem::whereUserId($user->id)->count();
        } else {
            return array_reduce(self::getCookieCartItems(), fn($carry) => $carry + 1, 0);
        }
    }

    // Get all items in the user's cart
    public static function getCartItems()
    {
        if ($user = Auth::user()) {
            // Retrieve and map the user's cart items, returning an array of product IDs and their quantities
            return CartItem::whereUserId($user->id)->get()->map(fn(CartItem $item) => [
                'product_id' => $item->product_id,
                'quantity' => $item->quantity
            ]);
        } else {
            return self::getCookieCartItems();
        }
    }

    // Get cart items from the cookies for guests
    public static function getCookieCartItems()
    {
        // Retrieve the cart items stored in a cookie, returning an empty array if none exist
        return json_decode(request()->cookie('cart_items', '[]'), true);
    }

    // Set cart items in a cookie (for guests)
    public static function setCookieCartItems(array $cartItems)
    {
        Cookie::queue('cart_items', json_encode($cartItems), 60 * 24 * 7);
    }

    // Save cookie cart items into the database when a user logs in
    public static function seveCookieCartItems()
    {
        $user = Auth::user();
        // Get the user's cart items from the database, indexed by product ID
        $userCartItem = CartItem::where(['user_id' => $user->id])->get()->keyBy('product_id');
        $savedCartItems = [];

        foreach (self::getCookieCartItems() as $cartItem) {
            if (isset($userCartItem[$cartItem['product_id']])) {
                // If the item already exists in the database, update its quantity
                $userCartItem[$cartItem['product_id']]->update(['quantity' => $cartItem['quantity']]);
            } else {
                // Otherwise, prepare it to be inserted as a new item
                $savedCartItems[] = [
                    'user_id' => $user->id,
                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity'],
                ];
            }
        }

        // Insert the new cart items into the database if there are any
        if (!empty($savedCartItems)) {
            CartItem::insert($savedCartItems);
        }
    }

    // Move cart items from cookies to the database when the user logs in
    public static function moveCartItemsIntoDb()
    {
        $request = request();
        $cartItems = self::getCookieCartItems();
        $newCartItems = [];

        foreach ($cartItems as $cartItem) {
            // Check if the item already exists in the user's cart in the database
            $existingCartItem = CartItem::where([
                'user_id' => $request->user()->id,
                'product_id' => $cartItem['product_id'],
            ])->first();

            // If the item doesn't exist, prepare it to be inserted as a new item
            if (!$existingCartItem) {
                $newCartItems[] = [
                    'user_id' => $request->user()->id,
                    'product_id' => $cartItem['product_id'],
                    'quantity' => $cartItem['quantity'],
                ];
            }
        }

        // Insert new cart items into the database if there are any
        if (!empty($newCartItems)) {
            CartItem::insert($newCartItems);
        }
    }
    public static function getProductsAndCartItems()
    {
        if ($user = Auth::user()) {
            $cartItems = CartItem::where('user_id', $user->id)
                ->with('productColor')
                ->get()
                ->map(fn($item) => [
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'product_color_id' => $item->product_color_id ?? 1 // Default to first color if none selected
                ])
                ->toArray();
        } else {
            $cartItems = self::getCookieCartItems();
            // Add default color for cookie items
            $cartItems = array_map(function($item) {
                $item['product_color_id'] = $item['product_color_id'] ?? 1; // Default to first color if none selected
                return $item;
            }, $cartItems);
        }

        $ids = Arr::pluck($cartItems, 'product_id');
        $products = Product::whereIn('id', $ids)->with('product_images')->get();
        $cartItems = collect($cartItems)->keyBy('product_id')->toArray();

        return [$products, $cartItems];
    }


}
