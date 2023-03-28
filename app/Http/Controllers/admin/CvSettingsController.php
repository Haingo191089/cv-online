<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CvSettingsController extends Controller
{
    //
    function viewCvSetting (Request $request) {
        return view('pages.admin.cv_setting.cv_setting');
    }

    function getListIcons () {
        try {
            $path = public_path('icons');
            $files = File::allFiles($path);

            $result = [];
            foreach ($files as $file) {
                $item = [];
                $item['url'] = asset('icons') . '/' . $file->getFilename();
                $item['fileName'] = $file->getFilename();
                $item['path'] =  'icons/' . $file->getFilename();
                $result[] = $item;
            }
            return $this->responseSuccess($result);
        } catch (\Throwable $e) {
            return $this->responseError();   
        }
    }
}
