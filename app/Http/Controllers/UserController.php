<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store()
    {
        User::create($this->validateData());
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(User $user)
    {
        $user->update($this->validateData());
    }
    
    public function destroy(User $user)
    {
        $user->delete();
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
    }
}
