<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;

class Ad_CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cates = Category::orderByDesc('created_at')->get();
        return view('admin.category.category-list', compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.category-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = $request->all();

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

        $item['category_slug'] = changeTitle($item['category_name_1']);
        $item['category_image'] = $imageFile;
        Category::create($item); //can co map assignment o Model

        return redirect()->route("admin.category.index")->with('success', "Added category : {$item['category_name_2']} / ID : {$item['category_id']} Successfully");
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
        // dd($category);
        return view('admin.category.category-edit', compact('category'));
        // return view('admin.category.category-create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        // dd($category);
        // $validatedData = $request->validate([
        //     'category_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        // ]);

        $item = $request->all();

        $image_path = 'assets/img/upload/category';
        if (!file_exists($image_path)) {
            mkdir($image_path, 0777, true);
        }
        $path = 'assets/img/upload/category/' . $category->category_image;
        if ($request->hasFile('category_image')) {
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('category_image');
            $ext = $file->getClientOriginalExtension();
            // if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
            //     return redirect('/club/create');
            // }
            $imageFile = trim($file->getClientOriginalName());
            $file->move($image_path, $imageFile);
            $item['category_image'] = $imageFile;
        }

        $item['category_slug'] = changeTitle($item['category_name_1']);

        $category->update($item);

        return redirect()->route('admin.category.index')->with('success', 'Category Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //1. check isCategory
        if ($category->products()->count('*') > 0) {
            return redirect()->route('admin.category.index')->with('deleted', 'Category Cannot Delete Because Has Product');
        }

        //2. Delete Category
        $category = Category::find($category->category_id);
        $path = 'assets/img/upload/category/' . $category->category_image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        return redirect()->route('admin.category.index')->with('deleted', 'Category Deleted');
    }
}
