<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ContactUs;
use App\Models\BlogCategory;
use App\Models\BlogDetail;
use App\Models\ServiceDetail;
use App\Models\PortfolioDetail;
use App\Models\PortfolioCategory;
use App\Models\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $service = Service::all();
        $blogs_details = BlogDetail::latest()->get();
        $contactus = ContactUs::all();
    $portfolio_details = PortfolioDetail::latest()->take(6)->get();
    $clients = Client::latest()->get(); 
        
        // $data['service'] = Service::all();
        // dd($service);
        return view('index', compact('service', 'blogs_details', 'contactus', 'portfolio_details' , 'clients'));
    }

    //for blog list and detail
    public function blogList()
    {
        $blogs = BlogDetail::latest()->paginate(10);
        return view('blog.index', compact('blogs'));
    }

    public function blogDetail($id = null) {
    if ($id) {
        $blog = BlogDetail::findOrFail($id);
    } else {
        $blog = BlogDetail::latest()->first();
    }

    $recent_blogs = BlogDetail::latest()->take(5)->get();
    $all_categories = BlogCategory::all(); 

    return view('blog_detail.index', compact('blog', 'recent_blogs', 'all_categories'));
}

    //for portfolio list

public function portfolioList(Request $request)
{
    // $query = PortfolioDetail::query();

    // Filter by category
    // if ($request->has('category') && $request->category != '') {
    //     $query->where('category_id', $request->category);
    // }

    $portfolio_details = PortfolioDetail::latest()->get();

    // Load categories for filter dropdown
    // $categories = PortfolioCategory::all();

    return view('portfolios.index', compact('portfolio_details'));
}


public function portfolioDetail(PortfolioDetail $portfolio_detail)
{
    return view('portfolio_detail.index', compact('portfolio_detail'));
}

public function serviceDetail(Service $service)
{
    $service->load(['details', 'serviceCategories']);

    $serviceDetails = ServiceDetail::where('service_id', $service->id)
            ->orderBy('order')
            ->get();

    return view('service_detail.index', compact('service', 'serviceDetails'));
}
    
}
