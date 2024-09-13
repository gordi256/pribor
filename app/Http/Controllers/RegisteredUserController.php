<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validate();

        $user = User::create($validated);

        // Отправка события Registered
        event(new Registered($user));

         Auth::login($user);

        return redirect('/email/verify');
    }
}
