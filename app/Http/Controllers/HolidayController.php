<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HolidayController extends Controller
{
    public function Holiday(Request $request)
    {
        $user = User::query()->find(Auth::user()->id);
        if ($user->type == 'teacher') {
            return response()->json(['message' => 'you cant access']);
        }
        else
        {
            $holiday =Holiday::all(['name','HolidayDate','year','IsGeneral']);
            return $holiday;
        }

    }

}
