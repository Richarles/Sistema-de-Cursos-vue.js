<?php

namespace App\Http\Controllers;

use App\Models\Curse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class CurseController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(Auth::user());
        return response()->json(auth()->user());
        //return view('admin.ListStudent');
        //return response()->json($dd);
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
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'field' =>$request->field
        ];

        $createUser = Curse::create($data);

        return response()->json($createUser);
    }

    /**
     * Display the specified resource.
     */
    public function show(Curse $curse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curse $curse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curse $curse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curse $curse)
    {
        //
    }
}
