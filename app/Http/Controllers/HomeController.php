<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Blog;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $service = Service::all();
        $blogs = Blog::latest()->get();
        $contactus = ContactUs::all();
        // $data['service'] = Service::all();
        // dd($service);
        return view('index', compact('service', 'blogs', 'contactus'));

    //     $blogs = Blog::latest()->get();
    // return view('index', compact('blogs'));
    }

    
}
