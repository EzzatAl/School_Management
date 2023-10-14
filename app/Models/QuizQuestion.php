<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;
    public $table='quiz_questions';
    protected $fillable=[
        'quizze_id',
        'Questions',
        'Mark',
        'Type'
    ];
    public function quizze()
    {
        return $this->belongsTo(Quizze::class);
    }
    public function StudentQuizAnswers()
    {
        return $this->hasMany(StudentQuizAnswer::class,'quiz_questions_id');
    }
    public function QuizQuestionAnswers()
    {
        return $this->hasMany(QuizQuestionAnswer::class,'quiz_question_id');
    }
}
