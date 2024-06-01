<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamDetailsRequest;
use App\Http\Requests\TeamDetailsUpdateRequest;
use App\Models\TeamDetails;
use Illuminate\Support\Facades\Auth;


class TeamDetailsController extends Controller
{
    public function store(TeamDetailsRequest $request)
    {
        $scoutsTeam = Auth::guard('teams')->user();

        $validated = $request->validated();

        /*
		    新しいインスタンスを作成する
		*/
        $teamDetail = new TeamDetails();

        $teamDetail->scouts_team_id = $scoutsTeam->id;
        $teamDetail->ground_1 = $validated['ground'][0];
        $teamDetail->ground_2 = $validated['ground'][1] ?? null;
        $teamDetail->ground_3 = $validated['ground'][2] ?? null;
        $teamDetail->members = $validated['member'];
        $teamDetail->coach = $validated['staff'];
        $teamDetail->weekly_schedule = $validated['schedule'];
        $teamDetail->tr_time = $validated['time'];
        $teamDetail->pitch = $validated['environ'];
        $teamDetail->expenses = $validated['expense'];
        $teamDetail->dormitory = $validated['life'];
        $teamDetail->conditions = $validated['term'];
        $teamDetail->is_part_time_allowed = $validated['part_time'];

        /*
            Modelクラスのsaveメソッド
            新しいレコードがデータベースに挿入される
		*/
        $teamDetail->save();
        return redirect('/completion-details');
    }


    public function teamDetails()
    {
        return view('team_details');
    }

    public function detailsSuccess()
    {
        return view('completion_details');
    }

    public function teamDetailsEdit()
    {
        $scoutsTeam = Auth::guard('teams')->user();
        $teamDetails = TeamDetails::where('scouts_team_id', $scoutsTeam->id)->first();

        return view('team_detailsEdit', compact('teamDetails'));
    }

    public function teamDetailsUpdate(TeamDetailsUpdateRequest $request)
    {
        $scoutsTeam = Auth::guard('teams')->user();
        $teamDetails = TeamDetails::where('scouts_team_id', $scoutsTeam->id)->first();

        $validated = $request->validated();

        $teamDetails->ground_1 = $validated['ground_1'];
        $teamDetails->ground_2 = $validated['ground_2'];
        $teamDetails->ground_3 = $validated['ground_3'];
        $teamDetails->members = $validated['member'];
        $teamDetails->coach = $validated['staff'];
        $teamDetails->weekly_schedule = $validated['schedule'];
        $teamDetails->tr_time = $validated['time'];
        $teamDetails->pitch = $validated['environ'];
        $teamDetails->expenses = $validated['expense'];
        $teamDetails->dormitory = $validated['life'];
        $teamDetails->conditions = $validated['term'];
        $teamDetails->is_part_time_allowed = $validated['part_time'];

        $teamDetails->save();

        return redirect('/completion-details');
    }
}
