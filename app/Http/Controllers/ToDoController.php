<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use domain\Facades\TodoFacade;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ToDoController extends ParentController
{

    public function index()
    {
        $response['tasks'] = TodoFacade::all();
        return view('pages.todo.todoIndex')->with($response);
    }
    public function store(Request $request)
    {

        // $role = Role::create(['name' => 'super_admin']);
        // $role = Role::create(['name' => 'employee_admin']);
        // $role = Role::create(['name' => 'users']);

        $permission = Permission::create(['name' => 'view_todo']);
        $permission = Permission::create(['name' => 'create_todo']);
        $permission = Permission::create(['name' => 'edit_todo']);
        $permission = Permission::create(['name' => 'delete_todo']);
        $permission = Permission::create(['name' => 'status_change_todo']);

        // TodoFacade::store($request->all());
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
