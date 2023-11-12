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
        $response['task']  = TodoFacade::get($request['task_id']);
        // dd($request);
        return view('pages.todo.edit')->with($response);
    }
    public function update(Request $request, $task_id)
    {

        TodoFacade::update($request->all(), $task_id);
        return redirect()->back();
    }

    public function get($task_id)
    {
        $response['task'] = TodoFacade::find($task_id);
        return view('pages.todo.todoEdit')->with($response);
    }
}
