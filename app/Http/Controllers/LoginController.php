<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Quizze;
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
                $students_id = User::query()->where('full_name', $request->input('full_name'))->first();
                $informations = StudentGrade::query()->select('grades.Name','divisions.name')
                    ->join('grades','grades.id','=','student_grades.grade_id')
                    ->join('divisions','divisions.id','=','grades.division_id')
                    ->join('users','users.id','=','student_grades.student_id')
                    ->where('full_name', $request->input('full_name'))->get();
                $quizzes=Quizze::query()->select('quizzes.Name','quizzes.Day','quizzes.Type',
                    'quizzes.Mark','student_marks.TotalMark')
                    ->join('student_marks','student_marks.subject_id','=','quizzes.subject_id')
                    ->where('student_marks.student_id','=',$students_id->id)->get();
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
