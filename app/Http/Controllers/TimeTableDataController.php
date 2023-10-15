<?php

namespace App\Http\Controllers;

use App\Models\StudentGrade;
use App\Models\TimeTableData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TimeTableDataController extends Controller
{
    public function Time_Table (Request $request)
    {
        $data =Validator::make($request->all(),[
            'day'=>'required'
        ]);
        if ($data->fails())
        {
            return response()->json(['message'=>$data->errors()]);
        }
        $user = User::query()->find(Auth::user()->id);
        if ($user->type == 'teacher') {
            return response()->json(['message' => 'you cant access']);
        }
        elseif (!$day=TimeTableData::query()->where('day','=',$request['day'])->exists())
        {
            return response()->json([]);
        }
        else
        {
            $grade_id=StudentGrade::query()->select('grades.id')
                ->join('grades','grades.id','=','student_grades.grade_id')
                ->where('student_id','=',Auth::user()->id)
                ->first();
            $time_data=TimeTableData::query()->select('subjects.name','users.first_name','users.last_name',
                'time_table_data.StartFrom','time_table_data.EndIn')
                ->join('subjects','subjects.id','=','time_table_data.subject_id')
                ->join('users','users.id','=','time_table_data.teacher_id')
                ->join('time_tables','time_tables.id','=','time_table_data.timetables_id')
                ->where('time_tables.grade_id','=',$grade_id->id)
                ->where('time_table_data.day','=',$request['day'])
                ->get();
            foreach ($time_data as $time) {
                $response =
                    [
                        'Subject_Name' => $time['name'],
                        'Teacher_Name' => $time['first_name'] . ' ' . $time['last_name'],
                        'Time' => $time['StartFrom'] . '  To  ' . $time['EndIn'],
                    ];
                $array[]=$response;
            }
            return  $array;
        }
    }

}
