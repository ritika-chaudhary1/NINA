<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\BlogDetails;

class BlogDetailController extends Controller
{
    public function index()
    {
        // dd('hii');
        $blogs = BlogDetails::latest()->paginate(10);
        return view('blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = BlogDetails::findOrFail($id);
        return view('blogs_details.show', compact('blog'));
    }
}
