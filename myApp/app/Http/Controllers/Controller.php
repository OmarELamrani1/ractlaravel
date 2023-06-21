<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function users(){
        $users = User::get(['id','firstname','lastname','age','email']);
        return response()->json($users);
    }

    public function addUser(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'nullable',
            'lastname' => 'nullable',
            'age' => 'nullable',
            'email' => 'nullable|email|unique:users',
        ]);

        $user = User::create($validatedData);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }

    public function updateUser(Request $request){
        $validatedData = $request->validate([
            'firstname' => 'nullable',
            'lastname' => 'nullable',
            'age' => 'nullable',
            'email' => 'nullable|email',
        ]);

        $user = User::where('id', $request->id)->update($validatedData);

        return response()->json($user);
    }

    public function deleteUser($id){
        $user = User::findOrFail($id)->delete();
        return response()->json($user);
    }

    public function showUser($id)
    {
        $user = User::find($id);

        return response()->json($user);

    }
}
