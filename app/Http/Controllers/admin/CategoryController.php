<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categoryrequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category=Category::paginate(8);
        return view('admin.category.index',compact('category'));
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Categoryrequest $request)
    {
        $file=$request->file('image');
        $image="";
        if(!empty($file)){
            $image=time().".".$file->getClientOriginalExtension();
            $file->move('image/category',$image);
        }
        Category::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'image'=>$image,
            'status'=>$request->status,
            'metaTitle'=>$request->metaTitle,
            'metaKeywords'=>$request->metaKeywords,
            'metaDescription'=>$request->metaDescription,
        ]);
        session()->flash('message','create category was successfully');
        return back();
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $category=Category::findOrfail($id);
        return view('admin.category.edit',compact('category'));
    }


    public function update(Request $request, string $id)
    {
        $file=$request->file('image');
        $image="";
        $imageDelete=Category::findOrfail($id)->image;
        if (!empty($file)){
            if (file_exists('image/category/'.$imageDelete)){
                unlink('image/category/'.$imageDelete);
            }
            $image=time().".".$file->getClientOriginalExtension();
            $file->move('image/category/',$image);
        }else{
            $image=$imageDelete;
        }
        Category::findOrfail($id)->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'image'=>$image,
            'status'=>$request->status,
            'metaTitle'=>$request->metaTitle,
            'metaKeywords'=>$request->metaKeywords,
            'metaDescription'=>$request->metaDescription,

        ]);
        session()->flash('update','update was successfully');
        return redirect()->route('category.index');
    }


    public function destroy(string $id)
    {
        $deleteImage=Category::findOrfail($id)->image;
        if(file_exists('image/category/'.$deleteImage)){
            unlink('image/category/'.$deleteImage);
        }
        session()->flash('delete','delete category was successfully');
        Category::destroy($id);
        return back();
    }
}
