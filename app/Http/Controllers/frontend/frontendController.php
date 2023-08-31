<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use App\Models\Slider;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function thankyou()
    {
        return view('frontend.thankyou');
    }
    public function index(){
        $slider = Slider::where('status','on')->get();
        $product=product::orderBy('created_at','desc')->take(6)->skip(0)->get();

        return view('frontend.index',compact('slider','product'));
    }
    public function categories(){
        $categories = Category::where('status','on')->get();
        return view('frontend.collection.category.index',compact('categories'));
    }
    public function products($category_name){
        $category = Category::where('name',$category_name)->first();
        if($category){
            return view('frontend.collection.products.index',compact('category'));
        }else{
            return redirect()->back();
        }
    }
    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug',$category_slug)->first();
        if($category){

            $product = $category->products()->where('slug',$product_slug)->where('status','on')->first();
            if($product)
            {
                return view('frontend.collection.products.view',compact('category','product'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }

    }
}
