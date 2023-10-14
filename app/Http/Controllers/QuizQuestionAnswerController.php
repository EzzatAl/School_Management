<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestion;
use App\Models\QuizQuestionAnswer;
use App\Models\Quizze;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuizQuestionAnswerController extends Controller
{
    public function QuizQuestion(Request $request)
    {
        $data = Validator::make($request->all(), [
            'Quiz_Name' => 'required'
        ]);

        if ($data->fails()) {
            return response()->json(['error' => $data->errors()]);
        }

        $user = User::query()->find(Auth::user()->id);

        if ($user->type == 'teacher') {
            return response()->json(['message' => 'You cannot access this']);
        } else {
            $quiz = Quizze::query()->where('Name', '=', $request['Quiz_Name'])->first();

            if (!$quiz) {
                return response()->json(['message' => 'Quiz not found']);
            }

            $quizQuestions = QuizQuestion::query()
                ->where('quizze_id', '=', $quiz->id)
                ->get();

            $array = [];

            foreach ($quizQuestions as $quizQuestion) {
                $quizQuestionAnswers = QuizQuestionAnswer::query()
                    ->where('quiz_question_id', '=', $quizQuestion->id)
                    ->get(['Answer']);

                $response = [
                    'Question' => $quizQuestion->Questions,
                    'Answers' => $quizQuestionAnswers
                ];

                $array[] = $response;
            }

            return $array;
        }
    }
}
