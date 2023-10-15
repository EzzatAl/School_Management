<?php

namespace App\Http\Controllers;

use App\Models\Quizze;
use App\Models\StudentMark;
use App\Models\StudentQuizAnswer;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentMarkController extends Controller
{
   public function student_subject_mark(Request $request)
   {
    $data=Validator::make($request->all(),[
        'subject'=>'required'
    ]);
       if($data->fails())
       {
           return response()->json(['error'=>$data->errors()]);
       }
       else {
           $subject = Subject::query()->where('name', '=', $request['subject'])->first();
           if (!$subject) {
               return response()->json(['message' => 'subject not found ']);
           }
           else
           {
               $mark = Quizze::query()
                   ->join('quiz_questions', 'quiz_questions.quizze_id', '=', 'quizzes.id')
                   ->join('quiz_question_answers', 'quiz_question_answers.quiz_question_id', '=', 'quiz_questions.id')
                   ->join('student_quiz_answers', 'student_quiz_answers.quizzes_question_answer_id', '=', 'quiz_question_answers.id')
                   ->where('quizzes.subject_id', '=', $subject->id)
                   ->where('student_quiz_answers.student_id', '=', Auth::user()->id)
                   ->sum('student_quiz_answers.mark');
           if ($student=StudentMark::query()->where('student_id','=',Auth::user()->id)
               ->where('subject_id','=',$subject->id)->first())
            {
                $student->update([
                    'TotalMark'=>$mark
                ]);
                return response()->json(['TotalMark'=>$student->TotalMark]);
            }
           else if(!$mark)
           {
               return response()->json(['message'=>'this subject dont have mark']);
           }
           else
           {
               $student_mark = StudentMark::query()->create([
                   'student_id' => Auth::user()->id,
                   'subject_id' => $subject->id,
                   'TotalMark' => $mark
               ]);
               return response()->json(['TotalMark'=>$student_mark->TotalMark]);
           }
           }
       }
   }
   public function average_mark ()
   {
       $average=StudentMark::query()
           ->where('student_id','=',Auth::user()->id)
           ->average('TotalMark');
       return response()->json(['average'=>$average]);
   }
}
//$mark=Quizze::query()
//    ->join('quiz_questions','quiz_questions.quizze_id','=','quizzes.id')
//    ->join('quiz_question_answers','quiz_question_answers.quiz_question_id','=','quiz_questions.id')
//    ->join('student_quiz_answers','student_quiz_answers.quiz_questions_id','=','quiz_question_answers.id')
//    ->where('student_quiz_answers.student_id','=',Auth::user()->id)
//    ->average('student_quiz_answers.mark');
//return $mark;
