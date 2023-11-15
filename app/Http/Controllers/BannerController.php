<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\TodoFacade;

class BannerController extends ParentController
{
    public function index()
    {
        $response['tasks'] = TodoFacade::all();
        return view('pages.todo.todoIndex')->with($response);
    }
    public function store(Request $request)
    {

        TodoFacade::store($request->all());
        return redirect()->back();
    }
    public function delete($banner_id)
    {
        TodoFacade::delete($banner_id);
        return redirect()->back();
    }
    public function statusUpdate($banner_id)
    {
        TodoFacade::statusUpdate($banner_id);
        return redirect()->back();
    }
    public function edit(Request $request)
    {
        $response['task']  = TodoFacade::get($request['banner_id']);
        // dd($request);
        return view('pages.todo.edit')->with($response);
    }
    public function update(Request $request, $banner_id)
    {

        TodoFacade::update($request->all(), $banner_id);
        return redirect()->back();
    }

    public function get($banner_id)
    {
        $response['task'] = TodoFacade::find($banner_id);
        return view('pages.todo.todoEdit')->with($response);
    }
}
