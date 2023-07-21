<?php

namespace App\Http\Controllers;

use App\Models\Manager;
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

        if(! $manager) {
            abort(Response::HTTP_NOT_FOUND);
        }
    
        if($manager->slug !== $slug) {
            return redirect()->route('managers.view', [
                'id' => $manager->id,
                'slug' => $manager->slug,
            ]);
        }
    
        return view('managers.view', [
            'manager' => $manager
        ]);
    }
}
