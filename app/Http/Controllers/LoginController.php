<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\StudentGrade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = Validator::make($request->all(), [
            'full_name' => 'required',
            'password' => 'required'
        ]);

        if ($data->fails()) {
            return redirect()->back()->withErrors($data->errors())->withInput();
        } else {
            if (!Auth::attempt($request->only('full_name', 'password'))) {
                return response()->json(['message' => 'Invalid credentials'], 401);
            } else {
                $students = User::query()->where('full_name', $request->input('full_name'))->get();
                $informations = StudentGrade::query()->select('grades.Name','divisions.name')
                    ->join('grades','grades.id','=','student_grades.grade_id')
                    ->join('divisions','divisions.id','=','grades.division_id')
                    ->join('users','users.id','=','student_grades.student_id')
                    ->where('full_name', $request->input('full_name'))->get();
                $quizzes=User::query()->select('quizzes.Name','quizzes.Day','quizzes.Type',
                    'quizzes.TotalMark','student_marks.mark')
                    ->join('quizzes','quizzes.subject_id','=','users.id')
                    ->join('student_marks','student_marks.student_id','=','users.id')
                    ->where('users.full_name','=', $request->input('full_name'))->get();
                $assignments=Assignment::query()->select('subjects.Name',
                    'assignments.name','assignments.date','assignments.description')
                    ->join('student_grades', 'student_grades.grade_id','=','assignments.grade_id')
                    ->join('subjects','subjects.id','=','assignments.subject_id')
                    ->join('users','users.id','=','student_grades.student_id')
                    ->where('full_name','=', $request->input('full_name'))->get();
                return view('student.profile-student',compact('students','informations','quizzes','assignments'));

            }
        }
    }
}
