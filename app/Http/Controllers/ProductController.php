<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('products.index',compact('products'));
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
       $request->validate([
        'name'=> 'required',
        'description'=> 'required',
        'image'=> 'required|mimes:jpeg,jpg,png,gif|max:10000'
    ]);
        // upload image
        // $imageName = time().'.'.$request->image->extention();
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('public/products'),$imageName);

        $products=new Product;
        $products->image=$imageName;
        $products->name=$request->name;
        $products->description=$request->description;

        $products->save();

        return back()->with('success', 'Product added successfully!');
    }
    public function show(string $id){
        return view('products.show');
    }


        public function edit($id){
        $product = Product::where('id',$id)->first();
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, $id){
        $this->validate($request, [
            'name'=> 'required',
            'description'=> 'required',
            'image'=> 'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        // Check if the product with the given ID exists
        $product = Product::find($id);
        if (!$product) {
            return back()->with('error', 'Product not found!');
        }

        if ($request->hasFile('image')){
            // Upload image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        return back()->with('success', 'Product updated successfully!');
    }
        public function destroy($id){
        $product = Product::where('id',$id)->first();
        $product->delete();

        return back()->with('success', 'Product deleted successfully!');
    }

}

