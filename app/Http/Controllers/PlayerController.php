<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlayerController extends Controller
{
    
    public function index(): View 
    {
        return view('players.index', [
            'players' => Player::paginate(10),
        ]);
    }

    public function view(int $id, string $slug): RedirectResponse|View
    {
        $player = Player::where('id', $id)->first();

        if(! $player) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        if($player->slug !== $slug) {
            return redirect()->route('players.view', [
                'id' => $player->id,
                'slug' => $player->slug,
            ]);
        }
    
        return view('players.view', [
            'player' => $player
        ]);
    }

}