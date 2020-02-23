<?php

use Carbon\Carbon;

function presentPrice($price)
{
    return number_format($price, 2);
}

function productSubtotal($price, $qty)
{
    return number_format($price * $qty, 2);
}

function presentDate($date)
{
    return Carbon::parse($date)->format('M d, Y');
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}

function productImages($path)
{
    $images = json_decode($path);
    $count = count($images);

    if ($count == 3) {
        return collect([
            'image0' => $images[0],
            'image1' => $images[1],
            'image2' => $images[2],
        ]);
    } else if ($count == 2) {
        return collect([
            'image0' => $images[0],
            'image1' => $images[1],
        ]);
    } else if ($count == 2) {
        return collect([
            'image0' => $images[0],
        ]);
    } else {
        return collect([
            
        ]);
    }
    
}

function getNumbers()
{
    $tax = config('cart.tax') / 100;
    // $discount = session()->get('coupon')['discount'] ?? 0;
    // $code = session()->get('coupon')['name'] ?? null;
    // $newSubtotal = (Cart::subtotal() - $discount);
    $newSubtotal = Cart::subtotal();
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax);

    return collect([
        'tax' => $tax,
        // 'discount' => $discount,
        // 'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}

function getStockLevel($quantity)
{
    if ($quantity > 1) {
        $stockLevel = '<div class="badge badge-success">In Stock</div>';
    } else {
        $stockLevel = '<div class="badge badge-danger">Not available</div>';
    }

    return $stockLevel;
}

function getCategories($cats) {
    $category = '';
    if (is_null($cats)) {
        $category = '<div class="badge badge-info">Uncategorized</div>';
    } else {
        foreach ($cats as $cat) {
            $category .= '<div class="badge badge-info">'. $cat->name .'</div>';
        } 
    }
    
    return $category;
}

function getDetails()
{
    $user = Auth::user();
    $orders = $user->orders;
    $pendingOrders = $orders->where('status', '!=', 'completed')->count();
    $deliveredOrders = $orders->where('status', '=', 'completed');
    // dd($orders->count());
    $spent = 0;

    foreach ($deliveredOrders as $order) {
        $spent += $order->billing_total;
    }
    return collect([
        'user' => $user,
        'orders' => $orders->count(),
        'pendingOrders' => $pendingOrders,
        'spent' => $spent,
    ]);
}

function listCategories() 
{
    $categories = App\Category::all();
    return $categories;
}