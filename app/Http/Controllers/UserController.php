<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userList = $this->userService->listUser($request);
        
        return array_reverse($userList);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->userService->createUser($request);

        return response()->json('User created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $editUser = $this->userService->editUser($id);

        //return $editCurse;
        //$showUser = User::find($id);

        return response()->json($editUser,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->userService->updateUser($request,$id);

        return response()->json('User updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->deleteUser($id);

        return response()->json('User deleted!');
    }
}
