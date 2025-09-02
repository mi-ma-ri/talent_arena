<?php

namespace App\Http\Controllers;

use App\Services\IndexService;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function getIndex(request $request, IndexService $index_service)
    {
        try {
            // $member_status = $index_service->getMemberStatus($request); @todo: 後実装
            return view('top/index');
        } catch (\Exception $e) {
            // Handle the exception if needed
        }
    }
}
