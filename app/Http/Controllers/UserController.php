<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\MakeUserRequest;

class UserController extends Controller
{
    /*
        Create user
    */
    public function store(MakeUserRequest $request){

        $user = User::create($request->all());

        return response()->json([
            'status' => true,
            'user' => $user
        ],201);
    }

    /*
      Credit the user's balance by user_id
    */
    public function credit_ballance(int $user_id){

        $user = User::find($user_id);
        $user->transactions()->create(['amount' => 50, 'type' => 'credit']);

        return response()->json([
            'status' => true,
            'data' => $user->transactions
        ],200);

    }

    /*
      Debit the user's balance by user_id
    */
    public function debit_ballance(int $user_id){

        $user = User::find($user_id);

        return response()->json([
            'status' => true,
            'data' => $user->transactions
        ],200);
    }
    
}
