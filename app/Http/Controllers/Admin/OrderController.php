<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index(Request $request)


    {


        $orders = Order::with(['user', 'userAddress', 'orderItems.product', 'payments'])
            ->filtered($request)
            ->paginate(10);
            // dd($orders);

        return Inertia::render('Admin/Orders/Index', [
            'orders' => $orders,
        ]);
    }
    public function show($id)
    {
        $order = Order::with([
            'user',
            'orderItems:order_id,product_id,product_color_id,quantity,unit_price',
            'orderItems.product:id,title,price',
            'orderItems.product.product_images:id,product_id,image',
            'orderItems.productColor.color',
            'payments',
            'userAddress'
        ])
        ->findOrFail($id);
        $order->created_at_formatted = $order->created_at->format('jS F Y \a\t h:i A');

        return Inertia::render('Admin/Orders/OrderView', [
            'order' => $order,
        ]);
    }


    public function printInvoice($id)
    {
        $order = Order::with([
            'user',
            'orderItems:order_id,product_id,product_color_id,quantity,unit_price',
            'orderItems.product:id,title,price', // Make sure to include the product price
            'orderItems.product.product_images:id,product_id,image',
            'orderItems.productColor.color',
            'payments',
            'userAddress'
        ])
        ->findOrFail($id);

        $order->created_at_formatted = $order->created_at->format('jS F Y \a\t h:i A');
        $order->subtotal = $order->orderItems->sum(fn($item) => $item->quantity * $item->product->price); // Use product price
        $order->tax = $order->subtotal * 0.1; // Assuming 10% tax rate
        $order->total_price = $order->subtotal + $order->tax - ($order->subtotal * $order->discount_percentage / 100);

        $pdf = Pdf::loadView('invoices.Invoice', ['order' => $order]);

        return $pdf->stream('invoice-' . $id . '.pdf');
    }

}
