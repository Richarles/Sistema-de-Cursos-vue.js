<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $list = User::where('type',$request->search)->get()->toArray();
        }else{
            $list = User::get()->toArray();
        }
        
        return array_reverse($list);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $showUser = User::find($id);

        return response()->json($showUser,200);
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
        $data = [
            'name' => $request->name,
            'last_name' => $request->last_name,
            'state' => $request->state,
            'city' => $request->city,
            'road' => $request->road,
            'district' => $request->district,
            'number' => $request->number,
            'date_birth' => $request->date_birth,
            'fone' => $request->fone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type
        ];

        $user = User::find($id);
        $user->update($data);

        return response()->json('User updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json('User deleted!');
    }
}
