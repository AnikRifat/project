<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('order')->get();
        return view('admin.pages.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the input fields
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
            'order' => 'nullable|integer|min:0'
        ]);

        // Store the image in public/category folder with optimized size
        $image = $request->file('thumbnail');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('category/' . $filename);

        Image::make($image)
            ->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->encode('jpg', 80)
            ->save($imagePath);

        // Create and store the category
        $category = new Category();
        $category->name = $validatedData['name'];
        $category->thumbnail = $filename;
        $category->order = $validatedData['order'];
        $category->save();

        // Redirect to the category list page with success message
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.pages.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category  $category)
    {
        // Find the category to update


        // Validate the input fields
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
            'order' => 'nullable|integer|min:0'
        ]);

        // Update the category
        $category->name = $validatedData['name'];
        $category->order = $validatedData['order'];

        if ($request->hasFile('thumbnail')) {
            // Delete the old thumbnail if it exists
            if (File::exists(public_path('category/' . $category->thumbnail))) {
                File::delete(public_path('category/' . $category->thumbnail));
            }

            // Store the new thumbnail in public/category folder with optimized size
            $image = $request->file('thumbnail');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('category/' . $filename);

            Image::make($image)
                ->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg', 80)
                ->save($imagePath);
            // Update the thumbnail filename in the database
            $category->thumbnail = $filename;
        }

        $category->save();

        // Redirect to the category list page with success message
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // delete the category's thumbnail if it exists

        $subcategories = SubCategory::where('parent_id', $category->id)->get();
        foreach ($subcategories as $subcategory) {
            File::delete(public_path('subcategory/' . $subcategory->thumbnail));
            $subcategory->delete();
        }
        // delete the category and its subcategories
        File::delete(public_path('category/' . $category->thumbnail));
        $category->delete();

        // redirect back to the category index page with a success message
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
