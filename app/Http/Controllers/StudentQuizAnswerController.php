<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestion;
use App\Models\QuizQuestionAnswer;
use App\Models\StudentQuizAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentQuizAnswerController extends Controller
{
    public function student_question_answer(Request $request)
    {
        $data = Validator::make($request->all(), [
            'Question' => 'required',
            'Answer' => 'required'
        ]);

        if ($data->fails()) {
            return response()->json(['error' => $data->errors()]);
        }

        $question = QuizQuestion::where('Questions', $request['Question'])->first();

        if (!$question) {
            return response()->json(['error' => 'Question not found']);
        }

        $question_answer = QuizQuestionAnswer::select('IsRightAnswer','quiz_question_answers.id')
            ->join('quiz_questions', 'quiz_questions.id', '=', 'quiz_question_answers.quiz_question_id')
            ->where('quiz_question_answers.Answer', $request['Answer'])
            ->where('quiz_questions.id', $question->id)
            ->first();

        if (!$question_answer) {
            return response()->json(['error' => 'Answer not found']);
        }
        elseif (StudentQuizAnswer::query()->where('student_id','=',Auth::user()->id)
        ->where('quiz_questions_id','=',$question->id)
        ->where('quizzes_question_answer_id','=',$question_answer->id)->exists())
        {
            return response()->json(['message'=>'this question already answered']);
        }
        if($question_answer->IsRightAnswer == 1) {
            $student_quiz_answers = StudentQuizAnswer::create([
                'student_id' => Auth::user()->id,
                'quiz_questions_id' => $question->id,
                'quizzes_question_answer_id' => $question_answer->id,
                'mark' =>$question->Mark
            ]);
            return 1;
        }
        else
        {
            $student_quiz_answers = StudentQuizAnswer::create([
                'student_id' => Auth::user()->id,
                'quiz_questions_id' => $question->id,
                'quizzes_question_answer_id' => $question_answer->id,
                'mark' => 0
            ]);
            return 0;
        }
    }
}
