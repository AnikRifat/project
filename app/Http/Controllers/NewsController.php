<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->can('Review News')) {
            $categories = Category::all();
            $subcategories = Subcategory::all();
            $tags = Tag::all();

            $selectedCategory = $request->input('category');
            $selectedSubcategory = $request->input('subcategory');
            $selectedTag = $request->input('tag');

            $newsQuery = News::query();

            if ($selectedCategory) {
                $newsQuery->where('category_id', $selectedCategory);
            }

            if ($selectedSubcategory) {
                $newsQuery->where('sub_category_id', $selectedSubcategory);
            }

            if ($selectedTag) {
                $newsQuery->where('tag_id', $selectedTag);
            }

            $news = $newsQuery->paginate(10);

            return view('admin.pages.news.index', compact('news', 'categories', 'subcategories', 'tags', 'selectedCategory', 'selectedSubcategory', 'selectedTag'));
        } else {
            return view('admin.pages.errors.403-no-permission');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('Add News')) {
            $categories = Category::all();
            $subCategories = SubCategory::all();
            $tags = Tag::all();

            return view('admin.pages.news.create', compact('categories', 'subCategories', 'tags'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('Add News')) {
            // Validate request
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'summary' => 'required|max:255',
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'nullable|exists:sub_categories,id',
                'tag_id' => 'required|exists:tags,id',
                'source_url' => 'nullable|url',
                'thumbnail' => 'required|image|max:1024', // Maximum 1MB image file size
            ]);

            // Store thumbnail
            // Store the image in public/category folder with optimized size
            $image = $request->file('thumbnail');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('news/' . $filename);

            Image::make($image)
                ->resize(1200, 800, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode('jpg', 80)
                ->save($imagePath);


            // Create news
            $news = new News();
            $news->title = $validatedData['title'];
            $news->content = $validatedData['content'];
            $news->summary = $validatedData['summary'];
            $news->category_id = $validatedData['category_id'];
            $news->sub_category_id = $validatedData['sub_category_id'];
            $news->tag_id = $validatedData['tag_id'];
            $news->source_url = $validatedData['source_url'];
            $news->creator_id = auth()->id();
            $news->thumbnail = $imagePath;
            $news->status = 'drafted'; // Set default status as drafted
            $news->save();

            return redirect()->route('news.index')->with('success', 'News created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        if (Auth::user()->can('Edit News')) {
            $categories = Category::all();
            $subCategories = SubCategory::all();
            $tags = Tag::all();

            return view('admin.pages.news.edit', compact('news', 'categories', 'subCategories', 'tags'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {

        if (Auth::user()->can('Edit News')) {
            // validate request data
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required',
                'summary' => 'required|max:255',
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'nullable|exists:sub_categories,id',
                'tag_id' => 'nullable|exists:tags,id',
                'source_url' => 'nullable|url',
                'thumbnail' => 'nullable|image|max:1024', // max size 1MB
            ]);

            // set news data
            $news->title = $validatedData['title'];
            $news->content = $validatedData['content'];
            $news->summary = $validatedData['summary'];
            $news->category_id = $validatedData['category_id'];
            $news->sub_category_id = $validatedData['sub_category_id'];
            $news->tag_id = $validatedData['tag_id'];
            $news->source_url = $validatedData['source_url'];

            // process thumbnail
            if ($request->hasFile('thumbnail')) {
                if (File::exists(public_path('news/' . $news->thumbnail))) {
                    File::delete(public_path('news/' . $news->thumbnail));
                }
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
                $thumbnailPath = public_path('news/' . $thumbnailName);
                Image::make($thumbnail->getRealPath())->resize(1200, 800, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($thumbnailPath);
                $news->thumbnail = $thumbnailName;
            }

            // save news
            $news->save();

            return redirect()->route('news.index')->with('success', 'News has been updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if (Auth::user()->can('Delete News')) {
            if ($news->thumbnail) {
                File::delete(public_path('news/' . $news->thumbnail));
            }

            // Delete the news
            $news->delete();

            return redirect()->route('news.index')->with('success', 'News deleted successfully.');
        }
    }
}
