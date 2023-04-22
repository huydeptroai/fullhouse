<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AjaxCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cates = Category::all();
        return view('admin.category.list', compact('cates')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        $image_path = public_path('assets/img/upload/category');
        if (!file_exists($image_path)) {
            mkdir($image_path, 0777, true);
        }

        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $ext = $file->getClientOriginalExtension();
            // if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
            //     return redirect('/club/create');
            // }
            $imageFile = $file->getClientOriginalName();
            $file->move($image_path, $imageFile);
        } else {
            $imageFile = null;
        }

        $id = $request->category_id;
        $category   =   Category::updateOrCreate(
            ['category_id' => $id],
            [
                'category_name_1' => $request->category_name_1,
                'category_name_1' => $request->category_name_1,
                'category_slug' => $request->category_slug,
                'category_image' => $imageFile,
                'category_intro' => $request->category_intro
            ]
        );

        // return Response::json($post);
        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
       
        $category  = Category::where('category_id', 'like', $category->id)->first();
        return response()->json($category);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = Category::find($category->category_id);
        $path = 'assets/img/upload/category/' . $category->category_image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        return response()->json($category);
    }
}
