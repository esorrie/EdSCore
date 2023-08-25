<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Manager;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ManagerController extends Controller
{
    // Display a paginated list of managers
    public function index(): View
    {
        $search = request()->query('name');

        if ($search) {
            $manager = Manager::where('name', 'LIKE', "%{$search}%")->simplePaginate('2000')->sortBy('team_id');

        } else {
            $manager = Manager::all()->sortBy('team_id');
        }

        return view('managers.index', [
            'managers' => $manager,
        ]);
    }

    public function view(int $id, string $slug): RedirectResponse|View
    {
        // Find the manager with the given ID in the 'Manager' table
        $manager = Manager::where('id', $id)->first();
        // Find the team with the given ID in the 'Team' table
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
        
        // Prepare table data for displaying manager information in the view
        $managerArray = $manager->toArray();
        $tableDataKeys = ['country', 'date_of_birth', 'contract_start', 'contract_end'];

        // Loop through the keys of the table data and format it for display
        foreach($tableDataKeys as $key) {
            $managerTableData[] = [
                Str::replace('_', ' ',[
                    'data' => $key,
                    'style' => 'uppercase'
                ]),
                [
                    'data' => data_get($managerArray, $key),
                    'style' => 'text-right uppercase'
                ]
            ];
        }
    
        // Pass the manager and team details to the 'managers.view' view
        return view('managers.view', [
            'manager' => $manager,
            'team' => $team,
            'managerTableData' => $managerTableData,
        ]);
    }
}
