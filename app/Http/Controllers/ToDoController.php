<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
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
        /* Create Role */

        // $role = Role::create(['name' => 'super_admin']);
        // $role = Role::create(['name' => 'employee_admin']);
        // $role = Role::create(['name' => 'users']);

        /* Create Permission */

        // $permission = Permission::create(['name' => 'view_todo']);
        // $permission = Permission::create(['name' => 'create_todo']);
        // $permission = Permission::create(['name' => 'edit_todo']);
        // $permission = Permission::create(['name' => 'delete_todo']);
        // $permission = Permission::create(['name' => 'status_change_todo']);

        /* List all users groups */

        // $super_admin = User::find(3); // has all permissions
        // $employee_admin = User::find(4); // has create,delete,view,edit
        // $users = User::find(5); //has only view permissions

        // /* Assing users to Roles */

        // $super_admin->assignRole('super_admin');
        // $employee_admin->assignRole('employee_admin');
        // $users->assignRole('users');

        /*Assign A Permission To A Role */

        $role_supper_admin = Role::where('name', 'super_admin')->first();
        $role_employee_admin = Role::where('name', 'employee_admin')->first();
        $role_users = Role::where('name', 'users')->first();

        $role_supper_admin->givePermissionTo('view_todo');
        $role_supper_admin->givePermissionTo('create_todo');
        $role_supper_admin->givePermissionTo('edit_todo');
        $role_supper_admin->givePermissionTo('delete_todo');
        $role_supper_admin->givePermissionTo('status_change_todo');

        $role_employee_admin->givePermissionTo('view_todo');
        $role_employee_admin->givePermissionTo('create_todo');
        $role_employee_admin->givePermissionTo('edit_todo');
        $role_employee_admin->givePermissionTo('delete_todo');

        $role_users->givePermissionTo('view_todo');

        // $super_admin->givePermissionTo('view_todo');
        // $super_admin->givePermissionTo('create_todo');
        // $super_admin->givePermissionTo('edit_todo');
        // $super_admin->givePermissionTo('delete_todo');
        // $super_admin->givePermissionTo('status_change_todo');

        // $employee_admin->givePermissionTo('view_todo');
        // $employee_admin->givePermissionTo('create_todo');
        // $employee_admin->givePermissionTo('edit_todo');
        // $employee_admin->givePermissionTo('delete_todo');

        // $users->givePermissionTo('view_todo');


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
