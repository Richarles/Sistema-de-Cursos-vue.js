<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //dd($request->all());
        
        //if ($request->check == 'studant') {
            $createStudent=Student::create([
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
                'password' => Hash::make($request->password)
            ]);

            // if($createStudent){
            //     $credentials = $request->validate([
            //         'email' => ['required', 'email'],
            //         'password' => ['required'],
            //     ]);
        
            //    if (Auth::attempt($credentials)) {
            //         $request->session()->regenerate();
        
            //         return redirect()->intended('eleitor/cadastro');
            //    }
            // }
        //}
       // $createStudent = Student::created($request->all());
        return response()->json($createStudent);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
