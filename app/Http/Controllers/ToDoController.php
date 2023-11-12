<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    protected $task;
    public function __construct()
    {
        $this->task = new Todo();
    }

    public function index()
    {
        $response['tasks'] = $this->task->all();
        return view('pages.todo.todoIndex', $response);
    }
    public function store(Request $request)
    {
        $this->task->create($request->all());
        // return redirect()->route('todo.index');
        return redirect()->back();
    }
    public function delete($id)
    {
        $this->task->find($id)->delete();
        return redirect()->back();
    }
    public function statusUpdate($id)
    {
        $task = $this->task->find($id);
        $task->done = 1;
        $task->update();
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
