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
        return view('pages.todo.todo_index');
    }
    public function store(Request $request)
    {
        $this->task->create($request->all());
        // return redirect()->route('todo.index');
        return redirect()->back();
    }
}
