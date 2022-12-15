<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function categories(){
        return view('laptops.categories',['categories'=>Category::all()]);
    }
    public function index(Request $request){
        $this->authorize('viewAny', Category::class);
        $categories=null;
        if($request->search){
            $categories = Category::where('name', 'LIKE', '%'.$request->search.'%')->get();
        }else{
            $categories = Category::get();
        }

        return view('adm.categories',['categories'=>$categories]);
    }

    public function create()
    {
        $this->authorize('create', Category::class);
        return view('adm.createcategory');
    }

    public function store(Request $request){

        $this->authorize('create', Category::class);
        $validated = $request->validate([
            'name_kz' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'name_en' => 'required|max:255',
            'image' => 'required|image|max:2048',
        ]);
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('categories', $fileName, 'public');
        $validated['image'] = 'storage/' . $image_path;
        Category::create($validated);
        return redirect()->route('adm.categories.index')->with('message', 'Category created successfully!');
    }

    public function edit(Category $category){
        $this->authorize('update', $category);
        return view('adm.editcategory',['category'=>$category]);
    }

    public function update(Request $request,Category $category){
        $category->update([
            'name_'.app()->getLocale() =>$request->input('name_'.app()->getLocale()),
        ]);

        return redirect()->route('adm.categories.index')->with('message', 'Category edited succcessfully!');
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);
        $category->delete();
        return redirect()->route('adm.categories.index')->with('message', 'Category deleted successfully!');
    }
}
