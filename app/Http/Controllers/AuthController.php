<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerUser(Request $request){
        $data_user = new User();
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'Proses Validasi Gagal',
                'data'=>$validator->errors()
            ], 401);
        }

        $data_user->name = $request->name;
        $data_user->email = $request->email;
        $data_user->password = Hash::make($request->password);
        $data_user->save();

        return response()->json([
            'status'=>true,
            'message'=>'Berhasil Memasukkan Data'
        ],200);
    }

    public function loginUser(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'Proses Login Gagal',
                'data'=>$validator->errors()
            ], 401);
        }

        if(!Auth::attempt($request->only(['email','password']))){
            return response()->json([
                'status'=>false,
                'message'=>'Email dan Password Yang Dimaksudkan Tidak Sesuai'
            ]);
        }

        $data_user_valid = User::where('email', $request->email)->first();
        return response()->json([
            'status'=>true,
            'message'=>'Proses Login Berhasil',
            'token'=>$data_user_valid->createToken('api-sensor')->plainTextToken
        ]);
    }

}
