<?php
 
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
                'password' => Hash::make($request->password)
            ];

        if ($request->check == 'studant') {
            $createRegister = Student::create($data);
        }

        if ($request->check == 'teacher') {
            $createRegister = Teacher::create($data);
        }

        return response()->json($createRegister);
    }

        /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('login.create');;
    }
}