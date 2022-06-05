<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()){
            return response()->json($validator->messages())->setStatusCode(422);
        }
        $validated = $validator->validate();
        User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);
        return response()->json([
            'messages' => 'Input Success!'
        ])->setStatusCode(201);
    }

    public function show(){
        $users = User::all();
        return response()->json($users)->setStatusCode(200);
    }

    public function detail($id){
        $users = User::find($id);

        if ($users){
            return response()->json($users)->setStatusCode(200);
        }

        return response()->json([
            'messages' => "User Not Found!"
        ])->setStatusCode(404);
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[

            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $validated = $validator->validate();

        $checkUser = User::find($id);
            if($checkUser){
                User::where('id',$id)->update([
                    'username'=>$validated['username'],
                    'email' => $validated['email'],
                    'password' => $validated['password']
                ]);

                return response()->json([
                    'messages' => 'Update User Success!'
                ])->setStatusCode(200);
            }
            return response()->json([
                'messages' => 'Update User Failed!'
            ])->setStatusCode(404);
    }

    public function delete($id){
        $checkUser = User::find($id);
        if($checkUser){
            User::destroy($id);
            return response()->json([
                'messages' => 'Delete User Success!'
            ])->setStatusCode(200);
        }

        return response()->json([
            'messages' => 'Delete User Failed!, User not found'
        ])->setStatusCode(404);
    }
}
