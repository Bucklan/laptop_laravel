<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class LaptopController extends Controller
{
    //korzina
//    public function cart(Laptop $laptop)
//    {
//        $laptopCart = null;
//        if (Auth::check()) {
//            $laptopCart = Auth::user()->laptopsCart()->where('in_cart', true)->get();
//        }
//
//        return view('laptops.cart', ['laptopCart' => $laptopCart, 'laptop' => $laptop]);
//    }

    //noyt salady
//    public function addcart(Request $request, Laptop $laptop)
//    {
//        $request->validate([
//            'quantity' => 'required|numeric',
//            'ram' => 'required|numeric',
//            'memory' => 'required|numeric',
//        ]);
//        Auth::user()->laptopsCart()->attach($laptop->id, ['quantity' => $request->input('quantity'), 'ram' => $request->input('ram'), 'memory' => $request->input('memory')]);
//        return back()->with('message', 'laptop added to cart successfully');
//    }

    //udalit
//    public function uncart(Laptop $laptop)
//    {
//        $laptopCart = Auth::user()->laptopsCart()->where('laptop_id', $laptop->id)->first();
//        if ($laptopCart != null) {
//            Auth::user()->laptopsCart()->detach($laptop->id);
//            $laptop->usersCart()->detach();
//        }
//        return back()->with('message', 'laptop deleted from cart successfully');
//    }


    public function laptopsByCategory(Category $category)
    {
        $laptops = $category->laptops;
        return view('laptops.index', ['allLaptops' => $laptops, 'categories' => Category::all()]);
    }

    public function index()
    {
        $allLaptops = Laptop::all();
        return view('laptops.index', ['allLaptops' => $allLaptops, 'categories' => Category::all()]);
    }

    public function create()
    {
        $this->authorize('create', Laptop::class);
        return view('laptops.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $balance = 3000;
        $this->authorize('create', Laptop::class);
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'ram' => 'required',
            'memory' => 'required',
            'cpu' => 'required',
            'image' => 'required|image|max:2048',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);

        $fileName = time() . $request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('laptops', $fileName, 'public');
        $validated['image'] = 'storage/' . $image_path;
        $balance += 3000;
        Auth::user()->update(['my_balance' => $balance]);
        Laptop::create($validated);
        return redirect()->route('laptops.index')->with('message', __('messages.sv'));
    }

    public function show(Laptop $laptop)
    {
        $laptop->load('comments.user');
        $myRating = 0;
        if (Auth::check()) {
            $laptopRated = Auth::user()->laptopsRated()->where('laptop_id', $laptop->id)->first();
            if ($laptopRated) {
                $myRating = $laptopRated->pivot->rating;
            }
        }
        $avgRating = 0;
        $sum = 0;

        $ratedUsers = $laptop->usersRated()->get();
        foreach ($ratedUsers as $ru) {
            $sum += $ru->pivot->rating;
        }

        if (count($ratedUsers) > 0) {
            $avgRating = $sum / count($ratedUsers);
        }
        if ($avgRating % 1 != 0) {
            $avgRating = $avgRating - $avgRating % 1;;
        }
        return view('laptops.show', ['laptop' => $laptop,
            'categories' => Category::all(),
            'myRating' => $myRating,
            'avg' => $avgRating]);
    }


    public function edit(Laptop $laptop)
    {
        $this->authorize('update', $laptop);
        return view('laptops.edit', ['laptop' => $laptop, 'categories' => Category::all()]);
    }

    public function update(Request $request, Laptop $laptop)
    {
        $laptop->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'ram' => $request->input('ram'),
            'memory' => $request->input('memory'),
            'cpu' => $request->input('cpu'),
            'image' => $request->input('image'),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('laptops.index');
    }

    public function destroy(Laptop $laptop)
    {
        $this->authorize('delete', $laptop);
        $laptop->delete();
        return redirect()->route('laptops.index');
    }

    public function buy()
    {
        $bool = false;
        $price = 0;
        $qwert = Auth::user()->laptopsWithStatus('in_cart')->get();
        foreach ($qwert as $q) {
            if ($q->pivot->quantity != 0 && $q->pivot->quantity * $q->price < Auth::user()->my_balance) {
                $bool = true;
$price = $q->pivot->quantity * $q->price;
            }
        }
//        dd($price);
        if ($bool) {
            $ids = Auth::user()->laptopsWithStatus('in_cart')->allRelatedIds();
            foreach ($ids as $id) {
                Auth::user()->laptopsWithStatus('in_cart')->updateExistingPivot($id, ['status' => 'ordered']);
            }
            Auth::user()->update(['my_balance' => Auth::user()-> my_balance - $price]);
            return back()->with('message', 'Zhaqsy otti');

        }
        return back()->withErrors('NOT BALANCE');

    }

    public function rate(Request $request, Laptop $laptop)
    {
//        dd($request);
        $validate = $request->validate([
            'rating' => 'required|min:1|max:5'
        ]);
        $laptopRated = Auth::user()->laptopsRated()->where('laptop_id', $laptop->id)->first();
        if ($laptopRated) {
            Auth::user()->laptopsRated()->updateExistingPivot($laptop->id, $validate);
        } else {
            Auth::user()->laptopsRated()->attach($laptop->id, $validate);
//            return back()->with('message', 'Your rating successfully sended');
        }
        return back()->with('message', 'Your rating successfully sended');
    }

    public
    function unrate(Laptop $laptop)
    {

        $laptopRated = Auth::user()->laptopsRated()->where('laptop_id', $laptop->id)->first();

        if ($laptopRated) {
            Auth::user()->laptopsRated()->detach($laptop->id);
        }
        return back();
    }

}
