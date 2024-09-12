<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Función que actúa como pantalla de inicio con menú de navegación
    public function index()
    {
        return view('e-comerce.index');
    }


    public function products($category_id = null)
    {
        $products = (is_null($category_id)) ?
            Product::paginate(12) :
            Product::where('category_id', $category_id)->paginate(9);
        $categories = Category::all();

        return view('e-comerce.products', compact('products', 'categories'));
    }

    public function product_detail($product_id)
    {
        $product = Product::find($product_id);
        $specifications = json_decode($product->specification, true);
        // para traer la ultima review
        $reviews = Reviews::where('product_id', $product_id)->latest()->first();
        return view('e-comerce.product-detail', compact('product', 'specifications', 'reviews'));
    }

    public function cart()
    {
        $products = Product::all();
        // dd($products);
        // return view('e-comerce.products', ['products'=>$products]);
        return view('e-comerce.cart', compact('products'));
    }

    public function checkout()
    {
        $products = Product::all();
        // dd($products);
        // return view('e-comerce.products', ['products'=>$products]);
        return view('e-comerce.checkout', compact('products'));
    }

    public function myaccount()
    {
        $products = Product::all();
        // dd($products);
        // return view('e-comerce.products', ['products'=>$products]);
        return view('e-comerce.my-account', compact('products'));
    }

    public function wishlist()
    {
        $products = Product::all();
        // dd($products);
        // return view('e-comerce.products', ['products'=>$products]);
        return view('e-comerce.wishlist', compact('products'));
    }

    public function login()
    {
        $products = Product::all();
        // dd($products);
        // return view('e-comerce.products', ['products'=>$products]);
        return view('e-comerce.login', compact('products'));
    }

    public function contact()
    {
        $products = Product::all();
        // dd($products);
        // return view('e-comerce.products', ['products'=>$products]);
        return view('e-comerce.contact', compact('products'));
    }

    public function productByCategory()
    {
        // $cat = Category::find(1);
        // $products = $cat->products;
        // $products = Category::find(1)->products;
        $categories = Category::all();
        return view('e-commerce.productsByCategories', compact('categories'));
    }
}
