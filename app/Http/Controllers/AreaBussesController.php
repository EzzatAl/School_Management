<?php

namespace App\Http\Controllers;

use App\Models\AreaBuss;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaBussesController extends Controller
{
    public function Time_Busses(Request $request)
    {
        $user = User::query()->find(Auth::user()->id);
        if ($user->type == 'teacher') {
            return response()->json(['message' => 'you cant access']);
        }
        else {
            $time_busses = AreaBuss::query()->select('areas.name', 'area_busses.TimeMorningArrived'
                , 'area_busses.TimeAfterNoonArrived', 'area_busses.Type')
                ->join('areas', 'areas.id', '=', 'area_busses.area_id')
                ->get();
            if (!$time_busses->isEmpty()) {
                foreach ($time_busses as $time) {
                    $response =
                        [
                            'Area_Name' => $time['name'],
                            'Time_Morning_Arrived' => $time['TimeMorningArrived'],
                            'Time_After_Noon_Arrived' => $time['TimeAfterNoonArrived'],
                            'Type' => $time['Type']
                        ];
                    $array[] = $response;
                }
                return $array;
            }
            else
            {
                return response()->json(['message'=>'there is no Time busses']);
            }
        }

    }

}
