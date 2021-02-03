<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\items;

class ItemsController extends Controller
{
    public function menu()
    {
    	 $items = items::all();
 
        return view('pages.menu',compact('items'));
    }
    public function cart()
    {
    	return view ('pages.cart');
    }
    public function addToCart($id)
    {
    	$item = items::find($id);
 
        if(!$item) {
 
            abort(404);
 
        }
 
        $cart = session()->get('cart');
 
        
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "name" => $item->name,
                        "quantity" => 1,
                        "price" => $item->price,
                        "photo" => $item->photo
                    ]
            ];
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
 
        
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']++;
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
 
        }
 
      
        $cart[$id] = [
            "name" => $item->name,
            "quantity" => 1,
            "price" => $item->price,
            "photo" => $item->photo
        ];
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
 
            session()->flash('success', 'Cart updated successfully');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Item removed successfully');
        }
    }
 }
