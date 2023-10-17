<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\AreaBuss;
use App\Models\Assignment;
use App\Models\Fee;
use App\Models\Holiday;
use App\Models\StudentGrade;
use App\Models\TimeTableData;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function importUsers(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new UsersImport, $file);

        // Optionally, you can perform additional actions after the import

        return redirect()->back()->with('success', 'Users imported successfully.');
    }
    public function login(Request $request)
    {
        $data = Validator::make($request->all(), [
            'full_name' => 'required',
            'password' => 'required'
        ]);

        if ($data->fails()) {
            return  response()->json(['message'=>$data->errors()]);
        } else {
            if (!Auth::attempt($request->only('full_name', 'password'))) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            } else {
                $user=User::query()->where('full_name','=',$request['full_name'])->first();
                $token = $user->createToken('authToken')->plainTextToken;
                return Response()->json(['token' => $token]);
            }
        }
    }
    public function Home(Request $request)
    {
        $user=User::query()->find(Auth::user()->id);
        if($user->type == 'teacher')
        {
            return response()->json(['message'=>'you can not access']);
        }
        else {
            $data = StudentGrade::query()->select('users.first_name','users.image', 'users.last_name'
                ,'divisions.name','grades.Name')
                ->join('grades', 'grades.id', '=', 'student_grades.grade_id')
                ->join('divisions', 'divisions.id', '=', 'grades.division_id')
                ->join('users', 'users.id', '=', 'student_grades.student_id')
                ->where('student_grades.student_id','=',$user->id)
                ->first()
                ->toArray();
            $response =
                [
                'Name' => $data['first_name'].' '.$data['last_name'],
                 'Image'=>asset('storage/'.$data['image']),
                'Division' => $data['name'],
                'Grade' => $data['Name']
                ];
            return  response()->json([$response]);
        }
    }
        public function Profile(Request $request)
{
        $user=User::query()->find(Auth::user()->id);
    if($user->type == 'teacher')
    {
        return response()->json(['message'=>'you can not access']);
    }
    else{
        $response =
            [
                'Name' => $user['first_name'].' '.$user['last_name'],
                'Father_Name' => $user['s_father'],
                'Mother_Name' => $user['s_mother'],
                'Gender'=>$user['gender'],
                'Phone_Number'=>$user['s_phone_number'],
                'Address' => $user['s_address']
            ];
        return  response()->json([$response]);
    }
}
}
