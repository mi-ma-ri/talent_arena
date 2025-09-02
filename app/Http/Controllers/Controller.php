<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  const MAX_SNIPPETS_COUNT = 50;
  const DEFAULT_ORDER_TYPE = 'viewCount';
  use AuthorizesRequests, ValidatesRequests;
}
