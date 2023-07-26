<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // public function home(int $id): View
    // {
    //     $league = League::where('id', $id)->first();
    //     $team = $league->teams;

    //     return view('/', [
    //         'teams' => $team,
    //     ]);
    // }
}
