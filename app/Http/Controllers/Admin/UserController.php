<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.user.index');
    }

    public function getUsers()
    {
        $users = User:: where('role','=','')
                    ->orWhere('role','=','seller')
                    ->orderBy('updated_at','desc')
                    ->get();

        return response()->json([
            'users' => $users,
        ]);
    }

    public function editUser(Request $request)
    {
        //return $request->all();

        //check validation
        $request->validate([
            'userId' => 'required|numeric',
            'userRole' => 'required',
            // 'isChecked' => 'required',
            // 'verifiedAt' => 'required',
        ]);

        $user = User::Find($request->userId);
        if ($user->role == 'user'){
            return response()->json([
                'modalError' => 'user role cannot be changed to seller.',
            ]);
        }

        if (($request->userRole == 'seller') || ($request->userRole == 'clearRole')){
            // continue
        }else{
            return response()->json([
                'modalError' => 'Input value Wrong.',
            ]);
        }

        if ($request->userRole == 'clearRole'){
            $user->role = '';
        }elseif ($request->userRole == 'seller'){
            $user->role = $request->userRole;
        }

        $user->save();

        return response()->json([
            'modalMessage' => 'completed to edit user.',
        ]);
    }
}
