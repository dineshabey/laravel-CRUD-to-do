<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use domain\Facades\TodoFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = TodoFacade::all();
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = TodoFacade::storeAPI($request);
        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = TodoFacade::get($id);
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Convert JSON string to associative array
        // $a = json_decode($request);

        // return($a);


        $response = TodoFacade::updateAPI($request, $id);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = TodoFacade::delete($id);
        return $delete;
    }
}
