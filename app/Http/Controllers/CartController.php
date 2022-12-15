<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function buy()
    {
        $ids = Auth::user()->laptopsWithStatus('in_cart')->allRelatedIds();
        foreach ($ids as $id) {
            Auth::user()->laptopsWithStatus('in_cart')->updateExistingPivot($id, ['status' => 'ordered']);
        }
        return back();

    }

    public function index()
    {
        $laptopsInCart = Auth::user()->laptopsWithStatus('in_cart')->where('quantity', '>', 0)->get();
        $laptopsIsNull = Auth::user()->laptopsWithStatus('in_cart')->where('quantity', '<=', 0)->get();
        for ($i = 0; $i < count($laptopsIsNull); $i++) {
            if ($laptopsIsNull[$i]->pivot->quantity <= 0 && $laptopsIsNull[$i] != null) {
                $this->deleteFromCart($laptopsIsNull[$i]);
                return back();
            }
        }
        for ($i = 0; $i < count($laptopsInCart); $i++) {
            if ($laptopsInCart[$i]) {
                return view('cart.index', ['laptopsInCart' => $laptopsInCart]);
            }
        }
        return view('cart.index', ['laptopsInNull' => true]);
    }

    public function putToCart(Request $request, Laptop $laptop)
    {
        $validate = $request->validate([
            'quantity' => 'required|numeric|min:1',
            'ram' => 'required|numeric',
            'memory' => 'required|numeric',

        ]);
        $laptopsInCart = Auth::user()->laptopsWithStatus('in_cart')->where('laptop_id', $laptop->id)->first();
        if ($laptopsInCart != null)
            Auth::user()->laptopsWithStatus('in_cart')
                ->updateExistingPivot($laptop->id,
                    ['quantity' => $laptopsInCart->pivot->quantity + $request->input('quantity'),
                        'ram' => $request->input('ram'),
                        'memory' => $request->input('memory')]);
        else
            Auth::user()->laptopsWithStatus('in_cart')
                ->attach($laptop->id, ['quantity' =>  $request->input('quantity'),
                    'ram' => $request->input('ram'),
                    'memory' => $request->input('memory')]);

        return redirect()->route('cart.index')->with('message', __('session.cart to successfully added'));
    }
    public function addcart(Laptop $laptop)
    {
        $laptopsInCart = Auth::user()->laptopsWithStatus('in_cart')->where('laptop_id', $laptop->id)->first();
        if ($laptopsInCart != null)
            Auth::user()->laptopsWithStatus('in_cart')
                ->updateExistingPivot($laptop->id,
                    ['quantity' => $laptopsInCart->pivot->quantity + 1]);
        else
            Auth::user()->laptopsWithStatus('in_cart')
                ->attach($laptop->id, ['quantity' =>  1]);

        return redirect()->route('cart.index')->with('message', __('session.cart to successfully added'));
    }

    public function removecart(Laptop $laptop)
    {
        $laptopsInCart = Auth::user()->laptopsWithStatus('in_cart')->where('laptop_id', $laptop->id)->first();
        if ($laptopsInCart != null)
            Auth::user()->laptopsWithStatus('in_cart')->updateExistingPivot($laptop->id,
                ['quantity' => $laptopsInCart->pivot->quantity - 1]);
        else
            Auth::user()->laptopsWithStatus('in_cart')->attach($laptop->id,
                ['quantity' => 1]);

        return redirect()->route('cart.index')->with('message', __('session.cart to successfully deleted'));
    }

    public function deleteFromCart(Laptop $laptop)
    {
        $laptopsBought = Auth::user()->laptopsWithStatus('in_cart')
            ->where('laptop_id', $laptop->id)->first();
        if ($laptopsBought != null)
            Auth::user()->laptopsWithStatus('in_cart')->detach($laptop->id);
        return back()->with('message', __('session.cart to successfully deleted'));
    }

    public function deleteallcart()
    {
        $laptopsBought = Auth::user()->laptopsWithStatus('in_cart')->get();
        if ($laptopsBought != null)
            Auth::user()->laptopsWithStatus('in_cart')->detach();
        return redirect()->route('cart.index')->with('message', 'session.cart to successfully deleted');
    }

}
