<?php

namespace App\Http\Controllers\Admin;

use App\Categorya;
use App\Categoryb;
use App\Categoryc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Order;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/admin/index');
    }

    public function showDailyOrderSum()
    {
        return view('admin/admin/showDailyOrderSum');
    }

    public function getDailyOrderSum(Request $request)
    {
        $sixDaysAgo = date("Y-m-d", strtotime("-60 days")); ////need to change
        $toDate = date('Y-m-d');

        // https://stackoverflow.com/questions/30801873/laravel-group-by-and-sum-total-value-of-other-column
        $dailySums = DB::table('orders')
            ->whereDate('created_at', '>=', $sixDaysAgo)
            ->whereDate('created_at', '<=', $toDate)
            ->select(DB::raw('DATE(created_at) as daily'), DB::raw('sum(total_amount) as total'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('daily','desc')
            ->get();

            return response()->json([
                'dailySums' => $dailySums,
            ]);
    }

    public function showCategoryForm()
    {
        return view('admin.category.showCategoryForm');
    }

    public function getAllcategories(Request $request)
    {
        $categoryAs = Categorya::all();

        return response()->json([
            'categoryAs' => $categoryAs,
        ]);
    }

    public function getCategoryAbyId(Request $request)
    {
        $categoryA = Categorya::with('categorybs','categorycs')
                                ->where('id','=',$request->aId)
                                ->first();

        return response()->json([
            'categoryA' => $categoryA,
        ]);
    }

    public function getCategoryBbyId(Request $request)
    {
        $categoryB = Categoryb::with('categorya','categorycs')
                                ->where('id','=',$request->bId)
                                ->first();

        return response()->json([
            'categoryB' => $categoryB,
        ]);
    }

    public function getCategoryCbyId(Request $request)
    {
        $categoryC = Categoryc::with('categorya','categoryb')
                                ->where('id','=',$request->cId)
                                ->first();

        return response()->json([
            'categoryC' => $categoryC,
        ]);
    }
}
