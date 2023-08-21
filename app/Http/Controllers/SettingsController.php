<?php

namespace App\Http\Controllers;

use App\Models\PlayingPosition;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $player = $user->player;
        $staff = $user->staff;

        if (is_null($user->player)) {
            $player['jersey_number'] = 'null';
            $player['position_id'] = 'null';
            $player['stick_hand'] = 'null';

            $player = (object) $player;
        }

        if (is_null($user->staff)) {
            $staff['managerCheck'] = false;
            $staff['coachCheck'] = false;

            $staff = (object) $staff;
        }

        $positions = PlayingPosition::all();

        return view('categories.users.settings', compact('user', 'player', 'staff', 'positions'));
    }

    public function store()
    {

    }
}
