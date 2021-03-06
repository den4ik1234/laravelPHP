<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Category;
use Intervention\Image\ImageManagerStatic as Image;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \App\Category::all();

        return view('viewcategories', ['allCategories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//        $imageName = time().'.'.$request->image->extension();
//        //$imageName =uniqid().".jpg";
////        $image = $request->file('image');
////        $request->image->resize(120, 120, function ($constraint) {
////            $constraint->aspectRatio();
////        });
//
//
//
//        $request->image->move(public_path('images'), $imageName);
        $image       = $request->file('image');
        $imageName = time().'.'.$request->image->extension();
        $image_resize = Image::make($image->getRealPath());;
        $image_resize->resize(200, 200);
        $image_resize->save(public_path('images/' .$imageName));



        \App\Category::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'image' => $imageName,
        ]);

        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
