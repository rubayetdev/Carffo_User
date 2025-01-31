<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $product_id)
    {
        $products = \App\Models\Products::findOrFail($product_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $request->input('quantity', 1);
        }
        else
            $cart[$product_id] = [
                'product_id' => $products->id,
                'price' => $products->price,
                'quantity' => $request->input('quantity'),
                'size'=>$request->input('size'),
                'color'=>$request->input('color'),
            ];
        session(['cart' => $cart]);

        //return response()->json($cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
