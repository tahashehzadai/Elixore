<?php

namespace App\Http\Controllers\Default;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerImage;
use App\Models\Product;

class FrontendController extends Controller
{
   public function home() {
    $data = [
        'banners' => BannerImage::all(),
        'products' => Product::all(),
    ];

    return view('front.default.homepage')->with($data);
}

    public function blog(){
        return view('front.default.blog');
    }
    
}
