<?php

namespace App\Http\Controllers;

use App\Models\Quizze;
use App\Models\StudentGrade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizzesController extends Controller
{
 public function Quizzes(Request $request)
 {
     $user = User::query()->find(Auth::user()->id);
     if ($user->type == 'teacher') {
         return response()->json(['message' => 'you can not access']);
     } else {
         $grade_id = StudentGrade::query()->select('grades.id')
             ->join('grades', 'grades.id', '=', 'student_grades.grade_id')
             ->where('student_id', '=', Auth::user()->id)
             ->first();
         $quizzes=Quizze::query()->select('subjects.name','users.first_name',
             'users.last_name','quizzes.Name','quizzes.Day','quizzes.Type','quizzes.TotalMark')
             ->join('subjects','subjects.id','=','quizzes.subject_id')
             ->join('users','users.id','=','quizzes.teacher_id')
             ->where('quizzes.grade_id','=',$grade_id->id)
             ->get();
         if(!$quizzes->isEmpty()) {
         foreach ($quizzes as $quiz) {
             $response =
                 [
                     'Subject_Name' => $quiz['name'],
                     'Teacher_Name' => $quiz['first_name'] . ' ' . $quiz['last_name'],
                     'Quiz_Name' => $quiz['Name'],
                     'Quiz_Day'=>$quiz['Day'],
                     'Quiz_Type'=>$quiz['Type'],
                     'Quiz_Total Mark'=>$quiz['TotalMark'],
                 ];
             $array[]=$response;
         }
             return $array;
         }
         else
         {
             return response()->json(['message'=>'there is no Quizzes']);
         }
     }
 }
}
