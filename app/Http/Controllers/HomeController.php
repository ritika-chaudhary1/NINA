<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $service = Service::all();
        
        // $data['service'] = Service::all();
        // dd($service);
        return view('index', compact('service'));
    }
}
