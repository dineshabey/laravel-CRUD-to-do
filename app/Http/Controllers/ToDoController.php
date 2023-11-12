<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use domain\Facades\TodoFacade;
use Illuminate\Http\Request;

class ToDoController extends Controller
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
    public function delete($id)
    {
        TodoFacade::delete($id);
        return redirect()->back();
    }
    public function statusUpdate($id)
    {
        TodoFacade::statusUpdate($id);
        return redirect()->back();
    }
    public function edit(Request $request)
    {
        // $request['task']  =ToDOFacde::get($request->task_id)
        dd($request);
        // return view('admin)->with('a');
    }
    public function update($id)
    {


        return redirect()->back();
    }
}
