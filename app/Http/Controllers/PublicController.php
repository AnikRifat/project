<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Photo;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {

        return redirect()->route('login');
    }
}
