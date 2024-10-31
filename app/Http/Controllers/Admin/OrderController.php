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
        // Initialize the query builder
        $query = Order::with(['user', 'userAddress', 'orderItems.product', 'payments']);

        // Apply filters
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        // Fetch paginated results with search applied
        $orders = $query->latest()->paginate(10)->withQueryString();

        // Return the Inertia view with orders and current filters
        return Inertia::render('Admin/Orders/Index', [
            'orders' => $orders,
            'filters' => $request->only('search'),
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
