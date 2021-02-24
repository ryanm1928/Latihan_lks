<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function create_user(Request $request)
    {
        $data = new User;
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
       $data::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
       ]);

       return response()->json($data,200);
    }
    
    public function getToken($token)
    {
        return response()->json([
            'token' => $token,
                'exp' => auth()->factory()->getTTL()*60

        ],200);

    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $res = $request->only('email','password');

        if($token = auth('api')->attempt($res))
        {
            return $this->getToken($token);

        }else{
            return response()->json($token,401);
        }

    }

    public function logout()
    {
        if(!auth('api')->user()){
            return response()->json([
                'masssage' => 'You must login to logout'

            ],401);
        }else{
            auth()->logout();
            return response()->json([
                "massage" => 'succes for logout'

            ]);
        }
    }

    public function refresh()
    {
        if(!auth('api')->user())
        {
            return response()->json([
                'massage' => 'your not logged to refresh'
            ],401);
        }else{
           return $this->getToken(auth()->refresh());
        }
    }

    public function reset(Request $request,user $user)
    {
        
       if(!auth('api')->user())
       {
           return response()->json([

            "massage" => "your not logged to reset password"
           ],400);
       }else{
           $request->validate([
            'password' => 'required'
           ]);
        $user = User::where('id',$request->id)->update([
            'password' =>Hash::make( $request->password)
           
        ]);
        auth()->logout();
        return response()->json([
            "massage" => 'Password succes reset'
        ],200);
       }
       
        
        
    }

  
}
