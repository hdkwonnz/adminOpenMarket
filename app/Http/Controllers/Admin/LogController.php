<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

// https://dzone.com/articles/5-minute-solution-for-viewing-logs-in-a-laravel-ap

class LogController extends Controller
{
    public function show(Request $request)
    {
        //return $request->all();

        $url = 'http://openmarket.test/showErrorLogsForAdmin';
        return Redirect::to($url);


        // $date = new Carbon($request->get('date',today()));

        // ////old version of laravel below => do not delete...
        // // $filePath = storage_path("logs/laravel-{$date->format('Y-m-d')}.log");

        // $filePath = storage_path("logs/laravel.log");
        // $data = [];

        // if (File::exists($filePath)){
        //     $data = [
        //         'lastModified' => new Carbon(File::lastModified($filePath)),
        //         'size' => File::size($filePath),
        //         'file' => File::get($filePath),
        //     ];
        // }

        // //return $data;
        // return view('admin.logs.logs', compact('date','data'));
    }
}
