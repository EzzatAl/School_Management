<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQuizAnswer extends Model
{
    use HasFactory;
    public $table ='student_quiz_answers';
    protected $fillable=[
        'student_id',
        'quiz_questions_id',
        'quizzes_question_answer_id',
        'mark',
    ];
    public function student()
    {
        return $this->belongsTo(User::class);
    }
    public function quiz_questions()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
    public function QuizzesQuestionAnswer()
    {
        return $this->belongsTo(QuizQuestionAnswer::class);
    }
}
