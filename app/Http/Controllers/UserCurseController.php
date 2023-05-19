<?php

namespace App\Http\Controllers;

use App\Models\User_Curse;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCurseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(Auth::user());
        return response()->json(auth()->user());
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
    public function show(User_Curse $user_Curse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User_Curse $user_Curse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User_Curse $user_Curse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User_Curse $user_Curse)
    {
        //
    }
}
