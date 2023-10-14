<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Http\Requests\StoreFeeRequest;
use App\Http\Requests\UpdateFeeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeeController extends Controller
{
    public function Fee(Request $request)
    {
            $courses =Fee::query()->where('Type','like','courses')->get();
            $trips=Fee::query()->where('Type','like','trips')->get();
            if($courses && $trips)
            {
                return view('welcome',compact('courses','trips'));
            }
            elseif ($courses && !$trips)
            {
                return view('welcome',compact('courses'));
            }
            elseif (!$courses && $trips)
            {
                return view('welcome',compact('trips'));
            }
            else
            {
                return view('welcome');
            }
        }
}
