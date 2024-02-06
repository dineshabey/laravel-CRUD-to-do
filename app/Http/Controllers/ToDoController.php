<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use domain\Facades\TodoFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;




class ToDoController extends ParentController
{
    protected $user; // Declare a property to store the authenticated user.
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user(); // Retrieve and store the authenticated user.

            return $next($request);
        });
    }

    public function index()
    {

        // $permissionNames = $user->getPermissionNames(); // collection of name strings
        // $permissions = $user->permissions; // collection of permission objects

        // // get all permissions for the user, either directly, or from roles, or from both
        // $permissions = $user->getDirectPermissions();
        // $permissions = $user->getPermissionsViaRoles();
        // $permissions = $user->getAllPermissions();

        // get the names of the user's roles
        // $roles = $user->getRoleNames(); // Returns a collection

        // dd($user->getPermissionsViaRoles());

        /*Checking permission using role base*/

        // if ($user->hasRole('super_admin')) {
        // } else {
        //     dd('You dont have permission to access' . $user->get);
        // }

        /*Checking permission using permission base*/

        if ($this->user->hasPermissionTo('view_todo')) {
            $response['tasks'] = TodoFacade::all();
            return view('pages.todo.todoIndex')->with($response);
        } else {
            dd('You don\'t have permission to view this page');
        }
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

        // $role_supper_admin = Role::where('name', 'super_admin')->first();
        // $role_employee_admin = Role::where('name', 'employee_admin')->first();
        // $role_users = Role::where('name', 'users')->first();

        // $role_supper_admin->givePermissionTo('view_todo');
        // $role_supper_admin->givePermissionTo('create_todo');
        // $role_supper_admin->givePermissionTo('edit_todo');
        // $role_supper_admin->givePermissionTo('delete_todo');
        // $role_supper_admin->givePermissionTo('status_change_todo');

        // $role_employee_admin->givePermissionTo('view_todo');
        // $role_employee_admin->givePermissionTo('create_todo');
        // $role_employee_admin->givePermissionTo('edit_todo');
        // $role_employee_admin->givePermissionTo('delete_todo');

        // $role_users->givePermissionTo('view_todo');

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


        if ($this->user->hasPermissionTo('create_todo')) {
            TodoFacade::store($request->all());
            return redirect()->back();
        } else {
            dd('You don\'t have permission to create a todo');
        }
    }
    public function delete($id)
    {
        if ($this->user->hasPermissionTo('delete_todo')) {
            TodoFacade::delete($id);
            return redirect()->back();
        } else {
            dd('You don\'t have permission to delete this item');
        }
    }
    public function statusUpdate($id)
    {
        if ($this->user->hasPermissionTo('status_change_todo')) {
            TodoFacade::statusUpdate($id);
            return redirect()->back();
        } else {
            dd('You don\'t have permission to status update this item');
        }
    }
    public function edit(Request $request)
    {

        if ($this->user->hasPermissionTo('edit_todo')) {
            $response['task']  = TodoFacade::get($request['task_id']);
            return view('pages.todo.edit')->with($response);
        } else {
            dd('You don\'t have permission to edit this item');
        }
    }
    public function update(Request $request, $task_id)
    {
        if ($this->user->hasPermissionTo('edit_todo')) {
            TodoFacade::update($request->all(), $task_id);
            return redirect()->back();
        } else {
            dd('You don\'t have permission to edit this item');
        }
    }

    public function get($task_id)
    {

        $response['task'] = TodoFacade::find($task_id);
        return view('pages.todo.todoEdit')->with($response);
    }
}
