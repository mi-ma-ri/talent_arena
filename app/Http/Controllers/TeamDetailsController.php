<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\Http\Requests\TeamDetailsRequest;
use Illuminate\Http\Request;
use App\Models\TeamDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TeamDetailsController extends Controller
{
    public function store(Request $request)
    {
        Log::debug('1111111');
        // $validated = $request->validated();

        // // 認証済みユーザーに関連するScoutsTeamを取得
        // $scoutsTeam = Auth::user()->scoutsTeam;

        // 新しいTeamDetailsインスタンスを作成
        $teamDetail = new TeamDetails();

        // TeamDetailsインスタンスをScoutsTeamに関連付ける
        // $teamDetails->scoutsTeam()->associate($scoutsTeam);

        // $teamDetail->ground = $request->input('ground1');
        // Log::debug($teamDetail);

        $grounds = $request->input('ground', []); // デフォルト値として空の配列を使用
        $teamDetail->ground_1 = $grounds[0] ?? null;
        $teamDetail->ground_2 = $grounds[1] ?? null;
        $teamDetail->ground_3 = $grounds[2] ?? null;
        $teamDetail->members = $request->input('member');
        $teamDetail->coach = $request->input('staff');
        $teamDetail->weekly_schedule = $request->input('schedule');
        $teamDetail->tr_time = $request->input('time');
        $teamDetail->pitch = $request->input('environ');
        $teamDetail->expenses = $request->input('expense');
        $teamDetail->dormitory = $request->input('life');
        $teamDetail->conditions = $request->input('term');
        $teamDetail->is_part_time_allowed = $request->input('part_time');

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
}
