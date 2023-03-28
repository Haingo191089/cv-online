<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function responseError ($msg = null) {
        return response()->json([
            'status' => false,
            'errorMessage' => $msg ?? __('errors.ERM1'),
            'data' => []
        ]);
    }

    protected function responseSuccess ($data) {
        return response()->json([
            'status' => true,
            'errorMessage' => '',
            'data' => $data
        ]);
    }
}
