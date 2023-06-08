<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Models\TeamLogo;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $teams = Team::orderBy('name')->get();

        return view('categories.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('categories.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeamRequest $request
     * @return RedirectResponse
     */
    public function store(TeamRequest $request)
    {
        try {
            $path = $request->file('logo_file')->store('team_logos');

            $team_logo = TeamLogo::create([
                'path' => $path,
            ]);

            $team = Team::create([
                'name' => $request->name,
                'description' => $request->description,
                'owner_id' => Auth::id(),
                'logo_id' => $team_logo->id,
            ]);

            return redirect()->route('teams.show', [$team]);
        } catch (QueryException $exception) {
            return redirect()->route('teams.index')->withErrors(['error' => 'Не удалось создать команду']);
        } catch (Exception $exception) {
            return redirect()->route('teams.index')->withErrors(['error' => $exception->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param Team $team
     * @return Factory|View
     */
    public function show(Team $team)
    {
        return view('categories.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $team
     * @return Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Team $team
     * @return Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
