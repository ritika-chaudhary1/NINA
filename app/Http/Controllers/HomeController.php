<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $service = Service::all();
        $blogs = Blog::latest()->get();
        // $data['service'] = Service::all();
        // dd($service);
        return view('index', compact('service', 'blogs'));

    //     $blogs = Blog::latest()->get();
    // return view('index', compact('blogs'));
    }

    
}
