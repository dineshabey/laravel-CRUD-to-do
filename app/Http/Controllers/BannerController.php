<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\BannerFacade;

class BannerController extends ParentController
{
    public function index()
    {
        $response['tasks'] = BannerFacade::all();
        return view('pages.banner.banner')->with($response);
    }
    public function store(Request $request)
    {

        BannerFacade::store($request->all());
        return redirect()->back();
    }
    public function delete($banner_id)
    {
        BannerFacade::delete($banner_id);
        return redirect()->back();
    }
    public function statusUpdate($banner_id)
    {
        BannerFacade::statusUpdate($banner_id);
        return redirect()->back();
    }
    public function edit(Request $request)
    {
        $response['task']  = BannerFacade::get($request['banner_id']);
        // dd($request);
        return view('pages.todo.edit')->with($response);
    }
    public function update(Request $request, $banner_id)
    {

        BannerFacade::update($request->all(), $banner_id);
        return redirect()->back();
    }

    public function get($banner_id)
    {
        $response['task'] = BannerFacade::find($banner_id);
        return view('pages.todo.todoEdit')->with($response);
    }
}
