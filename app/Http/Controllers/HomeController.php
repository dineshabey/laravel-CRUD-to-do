<?php

namespace App\Http\Controllers;

use domain\Facades\BannerFacade;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $response['banners'] = BannerFacade::allActive();;
        return view('pages.home.index')->with($response);
    }
}
