<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Http\Resources\CartResource;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function view(Request $request, Product $product)
    {
        $user = $request->user();

        if ($user) {
            $cartItems = CartItem::where('user_id', $user->id)->get();
            $userAddress = UserAddress::where('user_id', $user->id)->where('isMain', 1)->first();


                return Inertia::render(
                    'User/CartList',
                    [
                        'cartItems' => $cartItems,
                        'userAddress' => $userAddress,
                    ]
                );


        }else{
            // dd('1');
            $cartItems = Cart::getCookieCartItems();

                $cartItems= new CartResource(Cart::getProductsAndCartItems());
                return Inertia::render(
                    'User/CartList',
                    [
                        'cartItems' => $cartItems,
                        ]
                    );

        }
    }

    public function store(Request $request, Product $product)
    {
        $quantity = $request->post('quantity', 1);
        $user = $request->user();

        if ($user) {
            $cartItem = CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->first();
            if ($cartItem) {
                $cartItem->increment('quantity', $quantity);
            } else {
                CartItem::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ]);
            }
        } else {
            $cartItems = Cart::getCookieCartItems();
            $isProductExist = false;

            foreach ($cartItems as &$item) {
                if ($item['product_id'] == $product->id) {
                    $item['quantity'] += $quantity;
                    $isProductExist = true;
                    break;
                }
            }

            if (!$isProductExist) {
                $cartItems[] = [
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ];
            }

            Cart::setCookieCartItems($cartItems);
        }

        return redirect()->back()->with(
            'success',
            'Product added to cart'
        );
    }


    public function update(Request $request, Product $product)
    {
        $quantity = $request->integer('quantity');
        $user = $request->user();

        if ($quantity < 1) {
            // If the quantity is less than 1, remove the item from the cart
            if ($user) {
                // If user is logged in, remove the item from the database
                CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->delete();
            } else {
                // If user is not logged in, remove the item from the cookie
                $cartItems = Cart::getCookieCartItems();
                $cartItems = array_filter($cartItems, fn($item) => $item['product_id'] != $product->id);
                Cart::setCookieCartItems($cartItems);
            }
        } else {
            // If quantity is 1 or more, update the cart item
            if ($user) {
                // If user is logged in, update the quantity in the database
                CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->update(['quantity' => $quantity]);
            } else {
                // If user is not logged in, update the quantity in the cookie
                $cartItems = Cart::getCookieCartItems();
                foreach ($cartItems as &$item) {
                    if ($item['product_id'] == $product->id) {
                        $item['quantity'] = $quantity;
                    }
                }
                Cart::setCookieCartItems($cartItems);
            }
        }

        // Redirect back after updating or removing the cart item
        return redirect()->back();
    }


    public function delete(Request $request, Product $product)
    {
        $user = $request->user();

        if ($user) {
            // If user is logged in, remove the cart item from the database
            CartItem::query()->where(['user_id' => $user->id, 'product_id' => $product->id])->first()?->delete();

            // Check if the cart is empty and redirect to home if it is, otherwise back to cart
            if (CartItem::count() <= 0) {
                return redirect()->route('user.home')->with('info', 'Your cart is empty');
            } else {
                return redirect()->back()->with('success', 'Item removed successfully');
            }
        } else {
            // If user is not logged in, remove the item from the cookie cart
            $cartItems = Cart::getCookieCartItems();
            foreach ($cartItems as $i => $item) {
                if ($item['product_id'] == $product->id) {
                    array_splice($cartItems, $i, 1);
                    break;
                }
            }
            // Save the updated cart items back to the cookie
            Cart::setCookieCartItems($cartItems);

                return redirect()->back()->with('success', 'Item removed successfully');
        }
    }
}
