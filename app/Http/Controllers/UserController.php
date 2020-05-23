<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->generateApiToken();
        return $user;
    }

    public function show(User $user)
    {
        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }

    public function update(User $user, Request $request)
    {
        $user->update($request->all());
        return $user;
    }
}
