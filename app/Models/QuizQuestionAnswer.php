<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestionAnswer extends Model
{
    use HasFactory;
    public $table='quiz_question_answers';
    protected $fillable=[
        'quiz_question_id',
        'Answer',
        'IsRightAnswer',
    ];
    public function QuizQuestion()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
    public function StudentQuizAnswers()
    {
        return $this->hasMany(StudentQuizAnswer::class,'quizzes_question_answer_id');
    }


}
