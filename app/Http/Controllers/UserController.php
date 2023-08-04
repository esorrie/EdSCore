<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Illuminate\View\View;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        $users = User::all();

        return view('users.list', [
            'users' => $users,
        ]);
    }

    public function login(): View 
    {        

        return view('users.login', [
        ]);
    }
    
}
