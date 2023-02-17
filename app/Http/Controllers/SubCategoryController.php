<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('admin.pages.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the incoming request data
        $request->validate([
            'name' => 'required|max:255',
            'thumbnail' => 'image|max:1024', // maximum file size of 1024 KB (1 MB)
            'parent_id' => 'required|exists:categories,id',
            'order' => 'nullable|integer|min:0',
        ]);

        // create a new subCategory instance
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->parent_id = $request->parent_id;
        $subCategory->order = $request->order;

        if ($request->hasFile('thumbnail')) {
            // Delete the old thumbnail if it exists
            if (File::exists(public_path('subCategory/' . $subCategory->thumbnail))) {
                File::delete(public_path('subCategory/' . $subCategory->thumbnail));
            }

            // Store the new thumbnail in public/category folder with optimized size
            $image = $request->file('thumbnail');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('subCategory/' . $filename);

            Image::make($image)
                ->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg', 80)
                ->save($imagePath);
            // Update the thumbnail filename in the database
            $subCategory->thumbnail = $filename;
        }

        // save the subCategory to the database
        $subCategory->save();

        // redirect back to the subCategory index page with a success message
        return redirect()->route('subcategory.index')->with('success', 'Subcategory created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {

        $categories = Category::all();
        return view('admin.pages.subcategory.edit', compact('categories', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory  $subCategory)
    {


        $this->validate($request, [
            'name' => 'required',
            'thumbnail' => 'nullable|image|max:1024', // max size of 1024 KB
            'parent_id' => 'required|exists:categories,id',
        ]);

        $subCategory->name = $request->input('name');
        $subCategory->parent_id = $request->input('parent_id');

        // Handle thumbnail upload and optimization
        if ($request->hasFile('thumbnail')) {
            // Delete the old thumbnail if it exists
            if (File::exists(public_path('subcategory/' . $subCategory->thumbnail))) {
                File::delete(public_path('subcategory/' . $subCategory->thumbnail));
            }

            // Store the new thumbnail in public/subcategory folder with optimized size
            $image = $request->file('thumbnail');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('subcategory/' . $filename);

            Image::make($image)
                ->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg', 80)
                ->save($imagePath);
            // Update the thumbnail filename in the database
            $subCategory->thumbnail = $filename;
        }


        $subCategory->save();

        return redirect()->route('subcategory.index')
            ->with('success', 'Sub-category updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        // dd($subCategory);
        // Delete the thumbnail from storage
        File::delete(public_path('subcategory/' . $subCategory->thumbnail));

        // Delete the subCategory
        $subCategory->delete();

        return redirect()->route('subcategory.index')->with('success', 'Subcategory deleted successfully');
    }
}
