<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToDoController extends Controller
{
    function index()
    {

        return view('pages.todo.todo_index');
    }
}
