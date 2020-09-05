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

        ////below for local testing(hard coding) example...
        // $url = 'http://openmarket.test/showErrorLogsForAdmin';
        // return Redirect::to($url);

        $url = env('APP_URL_MAIN').'/showErrorLogsForAdmin';
        return Redirect::to($url);

        ////below for admin domain's log file
        // $selectedDate = new Carbon($request->get('selectedDate',today()));

        // $filePath = storage_path("logs/laravel-{$selectedDate->format('Y-m-d')}.log");

        ////for one log file
        // // $filePath = storage_path("logs/laravel.log");

        // $data = [];

        // if (File::exists($filePath)){
        //     $data = [
        //         'lastModified' => new Carbon(File::lastModified($filePath)),
        //         'size' => File::size($filePath),
        //         'file' => File::get($filePath),
        //     ];
        // }

        // //return $data;
        // return view('admin.logs.logs', compact('selectedDate','data'));
    }
}
