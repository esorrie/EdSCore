<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;


class PlayerController extends Controller
{
    
    public function index(): View 
    {
        return view('players.index', [
            'players' => Player::paginate(25),
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

        $playerArray = $player->toArray();
        $tableDataKeys = ['country', 'date_of_birth', 'height', 'number', 'Est. market value', 'contract'];

        foreach($tableDataKeys as $key) {
            $playerTableData[] = [
                Str::replace('_', ' ',[
                    'data' => $key,
                    'style' => 'uppercase'
                ]),
                [
                    'data' => data_get($playerArray, $key),
                    'style' => 'text-right uppercase'
                ]
            ];
        }

        $statTableDataKeys = ['appearances', 'goals', 'assists'];

        foreach($statTableDataKeys as $key) {
            $statTableData[] = [
                [
                    'data' => $key,
                    'style' => 'uppercase'
                ],
                [
                    'data' => data_get($playerArray, $key),
                    'style' => 'text-right uppercase'
                ]
            ];
        }
    
        return view('players.view', [
            'player' => $player,
            'playerTableData' => $playerTableData,
            'statTableData' => $statTableData,
        ]);
    }

}