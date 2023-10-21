<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Color, Product, Qcs};

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        Product::where('expire_date','<=',date('Y-m-d'))->update(['discount_price' => 0]);
        return view('index',compact('products','categories'));
    }

    public function detail($id)
    {
        $available_products = Qcs::where('product_id',$id)->where('quantity','!=',0)->get();
        $product = Product::find($id);
        $categories = Category::all();
        $products = Product::all();
        $qcs = Qcs::all();
        return view('detail',compact('product','qcs','available_products','categories','products'));
    }

    public function productForm()
    {
        $categories = Category::all();
        return view('admin.product',compact('categories'));
    }

    public function addProduct(Request $request)
    {
        $pp_name = "";
        foreach($request->product_photos as $product_photo)
        {
            $p_photo = uniqid()."_".$product_photo->getClientOriginalName();
            $product_photo->storeAs('images',$p_photo);
            $pp_name .= $p_photo.",";
        }
        // return substr($pp_name,0,-1);

        $product = new Product;
        $product->name = $request->product_name;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->category_id = $request->category_id;
        $product->expire_date = $request->expire_date;
        $product->description = $request->description;
        $product->user_id = auth()->user()->id;
        $product->product_photo = substr($pp_name,0,-1);
        $product->save();

        return back();
    }

    public function qcsForm()
    {
        $products = Product::all();
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.qcs',compact('categories','colors','products'));
    }

    public function addQcs(Request $request)
    {
        $qcs = new Qcs;
        $qcs->product_id = $request->product_id;
        $qcs->color_id = $request->color_id;
        $qcs->storage = $request->storage;
        $qcs->quantity = $request->quantity;
        $qcs->user_id = auth()->user()->id;
        $qcs->save();
        return back();
    }
}
