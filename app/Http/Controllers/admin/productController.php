<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Color;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

// use Illuminate\Validation\Validator::validateRequired();
class productController extends Controller
{

    public function index()
    {
        $product=product::paginate(8);
        return view('admin.products.index',compact('product'));
    }


    public function create()
    {
        $categories = Category::all();
        $brands = Brands::all();
        $color = Color::where('status','on')->get();
        return view('admin.products.create',compact('categories','brands','color'));
    }

    public function store(productRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::findOrfail($validatedData['category_id']);
        $product=$category->products()->create([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'slug'=>$request->slug,
            'brand'=>$request->brand,
            'smallDescription'=>$request->smallDescription,
            'description'=>$request->description,
            'originalPrice'=>$request->originalPrice,
            'sellingPrice'=>$request->sellingPrice,
            'quantity'=>$request->quantity,
            'trending'=>$request->trending,
            'status'=>$request->status,
            'metaTitle'=>$request->metaTitle,
            'metaKeywords'=>$request->metaKeywords,
            'metaDescription'=>$request->metaDescription,
        ]);


        if($request->hasfile('image')){
            $uploadPath = 'image/products/';

            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $fileName = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$fileName);
                $finalImagePathName = $uploadPath.$fileName;

                $product->productImage()->create([
                    'image' => $finalImagePathName,
                ]);
            }
        }

        if($request->colors)
        {
            foreach($request->colors as $key => $color)
            {
                $product->productColor()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->Colorquantity[$key] ?? 0
                ]);
            }
        }


        session()->flash('create','add PRODUCT was successfully');
        return back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $categories = Category::all();
        $brands = Brands::all();
        $product=product::findOrfail($id);
        $product_color = $product->productColor->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id',$product_color)->get();
        return view('admin.products.edit',compact('categories','brands','product','colors'));
    }

    public function update(productRequest $request, string $id)
    {


        // product::findOrfail($id)->update([
        //     'name'=>$request->name,
        //     'slug'=>$request->slug,
        //     'brand'=>$request->brand,
        //     'smallDescription'=>$request->smallDescription,
        //     'description'=>$request->description,
        //     'originalPrice'=>$request->originalPrice,
        //     'sellingPrice'=>$request->sellingPrice,
        //     'quantity'=>$request->quantity,
        //     'trending'=>$request->trending,
        //     'status'=>$request->status,
        //     'metaTitle'=>$request->metaTitle,
        //     'metaKeywords'=>$request->metaKeywords,
        //     'metaDescription'=>$request->metaDescription,

        // ]);
        // session()->flash('update','update PRODUCT was successfully');
        // return redirect()->route('products.index');
        $validatedData = $request->validated();

        $product = Category::findOrfail($validatedData['category_id'])
                        ->products()->where('id',$id)->first();
        if($product)
        {
            $product->update([
                'category_id'=>$request->category_id,
                'name'=>$request->name,
                'slug'=>$request->slug,
                'brand'=>$request->brand,
                'smallDescription'=>$request->smallDescription,
                'description'=>$request->description,
                'originalPrice'=>$request->originalPrice,
                'sellingPrice'=>$request->sellingPrice,
                'quantity'=>$request->quantity,
                'trending'=>$request->trending,
                'status'=>$request->status,
                'metaTitle'=>$request->metaTitle,
                'metaKeywords'=>$request->metaKeywords,
                'metaDescription'=>$request->metaDescription,
            ]);

            if($request->hasfile('image')){
                $uploadPath = 'image/products/';

                $i = 1;
                foreach($request->file('image') as $imageFile){
                    $extention = $imageFile->getClientOriginalExtension();
                    $fileName = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$fileName);
                    $finalImagePathName = $uploadPath.$fileName;

                    $product->productImage()->create([
                        'image' => $finalImagePathName,
                    ]);
                }
            }

            if($request->colors)
            {
                foreach($request->colors as $key => $color)
                {
                    $product->productColor()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->Colorquantity[$key] ?? 0
                    ]);
                }
            }

            session()->flash('update','update PRODUCT was successfully');
            return redirect('admin/Products');

        }
        else
        {
            return redirect()->route('Products.index')->with('message','No Such Product ID Found');
        }
    }

    public function destroy(string $product_id)
    {
        $product = product::findOrfail($product_id);
        if($product->productImage()){
            foreach($product->productImage() as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('delete','product DELETED with all images successfully');
    }
}
