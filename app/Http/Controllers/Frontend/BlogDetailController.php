<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\BlogDetail;

class BlogDetailController extends Controller
{
    public function index()
    {
        $blogs = BlogDetail::latest()->paginate(10);
        return view('blogs_details.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = BlogDetail::findOrFail($id);
        return view('blogs_details.show', compact('blog'));
    }
}
