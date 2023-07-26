<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManagerController extends Controller
{
    public function index(): View
    {
        return view('managers.index', [
            'managers' => Manager::paginate(10),
        ]);
    }

    public function view(int $id, string $slug): RedirectResponse|View
    {
        $manager = Manager::where('id', $id)->first();
        $team = Team::where('id', $id)->first();

        if(! $manager) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        if($manager->slug !== $slug) {
            return redirect()->route('managers.view', [
                'id' => $manager->id,
                'slug' => $manager->slug,
            ]);
        }

        $managerArray = $manager->toArray();
        $tableDataKeys = ['country_of_origin', 'date_of_birth', 'age', 'seasons'];

        foreach($tableDataKeys as $key) {
            $managerTableData[] = [
                [
                    'data' => $key,
                    'style' => 'uppercase'
                ],
                [
                    'data' => data_get($managerArray, $key),
                    'style' => 'text-right uppercase'
                ]
            ];
        }
    
        return view('managers.view', [
            'manager' => $manager,
            'team' => $team,
            'teams' => Team::all()->take(5),
            'managerTableData' => $managerTableData,
        ]);
    }
}
