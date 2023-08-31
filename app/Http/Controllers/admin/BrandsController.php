<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brandrequest;
use App\Models\Brands;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public $categoryID;

    public function index()
    {
        $brand=Brands::paginate(8);
        return view('admin.brands.index',compact('brand'));
    }

    public function create()
    {
        $category=Category::where('status', 'on')->get();
        return view('admin.brands.create',compact('category'));
    }

    public function store(Brandrequest $request)
    {
        Brands::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'status'=>$request->status,
            'categoryID' =>$request->categoryID,
        ]);
        session()->flash('create','add BRAND was successfully');
        return back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $category=Category::where('status', 'on')->get();
        $brand=Brands::findOrfail($id);
        return view('admin.brands.edit',compact('brand','category'));
    }

    public function update(Request $request, string $id)
    {
        Brands::findOrfail($id)->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'status'=>$request->status,
            'categoryID' =>$request->categoryID,

        ]);
        session()->flash('update','update was successfully');
        return redirect()->route('Brands.index');
    }

    public function destroy(string $id)
    {
        session()->flash('delete','delete BRAND was successfully');
        Brands::destroy($id);
        return back();

    }
}
