<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\sliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        $slider=Slider::paginate(8);
        return view('admin.slider.index',compact('slider'));
    }

    public function create()
    {
        return view('admin.slider.create');

    }

    public function store(sliderRequest $request)
    {
        $file=$request->file('image');
        $image="";
        if(!empty($file)){
            $image=time().".".$file->getClientOriginalExtension();
            $file->move('image/slider',$image);
        }
        Slider::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$image,
            'status'=>$request->status,
        ]);
        session()->flash('message','create SLIDER was successfully');
        return back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $slider=Slider::findOrfail($id);
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(Request $request, string $id)
    {
        $file=$request->file('image');
        $image="";
        $imageDelete=Slider::findOrfail($id)->image;
        if (!empty($file)){
            if (file_exists('image/slider/'.$imageDelete)){
                unlink('image/slider/'.$imageDelete);
            }
            $image=time().".".$file->getClientOriginalExtension();
            $file->move('image/slider/',$image);
        }else{
            $image=$imageDelete;
        }
        Slider::findOrfail($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$image,
            'status'=>$request->status,

        ]);
        session()->flash('update','update was successfully');
        return redirect()->route('Sliders.index');
    }

    public function destroy(string $id)
    {
        $deleteImage=Slider::findOrfail($id)->image;
        if(file_exists('image/slider/'.$deleteImage)){
            unlink('image/slider/'.$deleteImage);
        }
        session()->flash('delete','delete SLIDER was successfully');
        Slider::destroy($id);
        return back();
    }
}
