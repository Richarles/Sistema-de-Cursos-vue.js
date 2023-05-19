<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //  public function __construct()
    //  {
    //      $this->middleware('auth:api', ['except' => ['login']]);
    //  }
   /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $data = $request->all();
        
        $credentials = request(['email', 'password']);
        $user = User::where('email',$data['email'])->first();

        $token = auth('api')->attempt($credentials);



        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401); 
        }

        //if (Auth::attempt($credentials)) {
            //$request->session()->regenerate();
            //Auth::login($user);
            $fr = Auth::user();
            
            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
                'usuario' => $fr
            ]);
            //return redirect()->intended('api/curse');
        //}
        

        // if (Auth::attempt($credentials))
         //{
            //return redirect()->intended('dashboard');
            //  return response()->json([
            //      'access_token' => $token,
            //      'token_type' => 'bearer',
            //      'expires_in' => auth()->factory()->getTTL() * 60,
            //      'usuario' => $user
            //  ]);
        //}

        

    }

    public function store(Request $request){
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

        $user = User::create($data);

        $token = Auth::login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }
}